<?php
// Single-file CRUD for `data`.`users` (username + password only)
// Update DB credentials below if necessary
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'data';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_error) {
    die('DB connection error: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');

$action = $_REQUEST['action'] ?? '';
$msg = '';

// Handle POST actions: add, edit, delete-confirm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'add') {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        if ($username === '' || $password === '') {
            $msg = 'Username and password are required.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $mysqli->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
            $stmt->bind_param('ss', $username, $hash);
            if ($stmt->execute()) {
                $stmt->close();
                header('Location: users_crud.php?msg=added');
                exit;
            } else {
                $msg = 'Insert failed: ' . htmlspecialchars($stmt->error);
                $stmt->close();
            }
        }
    }

    if ($action === 'edit' && isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        if ($username === '') {
            $msg = 'Username cannot be empty.';
        } else {
            if ($password !== '') {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $mysqli->prepare('UPDATE users SET username = ?, password = ? WHERE id = ?');
                $stmt->bind_param('ssi', $username, $hash, $id);
            } else {
                $stmt = $mysqli->prepare('UPDATE users SET username = ? WHERE id = ?');
                $stmt->bind_param('si', $username, $id);
            }
            if ($stmt->execute()) {
                $stmt->close();
                header('Location: users_crud.php?msg=updated');
                exit;
            } else {
                $msg = 'Update failed: ' . htmlspecialchars($stmt->error);
                $stmt->close();
            }
        }
    }

    if ($action === 'delete' && isset($_POST['confirm']) && isset($_POST['id'])) {
        if ($_POST['confirm'] === 'yes') {
            $id = (int)$_POST['id'];
            $stmt = $mysqli->prepare('DELETE FROM users WHERE id = ?');
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {
                $stmt->close();
                header('Location: users_crud.php?msg=deleted');
                exit;
            } else {
                $msg = 'Delete failed: ' . htmlspecialchars($stmt->error);
                $stmt->close();
            }
        } else {
            header('Location: users_crud.php');
            exit;
        }
    }
}

// Show messages from redirects
if (isset($_GET['msg'])) {
    $q = $_GET['msg'];
    if ($q === 'added') $msg = 'User added.';
    if ($q === 'updated') $msg = 'User updated.';
    if ($q === 'deleted') $msg = 'User deleted.';
}

// Helper: fetch single user
function fetch_user($mysqli, $id) {
    $stmt = $mysqli->prepare('SELECT id, username FROM users WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();
    $stmt->close();
    return $user;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Users CRUD</title>
    <style>table{border-collapse:collapse;}td,th{border:1px solid #ddd;padding:6px;} .msg{color:green;} .err{color:red;}</style>
</head>
<body>
    <h1>Users - CRUD (single file)</h1>
    <?php if ($msg): ?>
        <p class="msg"><?php echo htmlspecialchars($msg); ?></p>
    <?php endif; ?>

    <?php if ($action === 'add'): ?>
        <h2>Add User</h2>
        <?php if (!empty($error)): ?><p class="err"><?php echo $error; ?></p><?php endif; ?>
        <form method="post" action="users_crud.php?action=add">
            <label>Username: <input type="text" name="username" required></label><br><br>
            <label>Password: <input type="password" name="password" required></label><br><br>
            <button type="submit">Add</button> <a href="users_crud.php">Cancel</a>
        </form>

    <?php elseif ($action === 'edit' && isset($_GET['id'])):
        $id = (int)$_GET['id'];
        $user = fetch_user($mysqli, $id);
        if (!$user) { echo '<p>User not found.</p><p><a href="users_crud.php">Back</a></p>'; exit; }
        ?>
        <h2>Edit User #<?php echo htmlspecialchars($user['id']); ?></h2>
        <?php if (!empty($error)): ?><p class="err"><?php echo $error; ?></p><?php endif; ?>
        <form method="post" action="users_crud.php?action=edit&id=<?php echo urlencode($user['id']); ?>">
            <label>Username: <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required></label><br><br>
            <label>New Password (leave blank to keep): <input type="password" name="password"></label><br><br>
            <button type="submit">Save</button> <a href="users_crud.php">Cancel</a>
        </form>

    <?php elseif ($action === 'delete' && isset($_GET['id'])):
        $id = (int)$_GET['id'];
        $user = fetch_user($mysqli, $id);
        if (!$user) { echo '<p>User not found.</p><p><a href="users_crud.php">Back</a></p>'; exit; }
        ?>
        <h2>Delete User #<?php echo htmlspecialchars($user['id']); ?></h2>
        <p>Are you sure you want to delete <strong><?php echo htmlspecialchars($user['username']); ?></strong>?</p>
        <form method="post" action="users_crud.php?action=delete">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
            <button type="submit" name="confirm" value="yes">Yes, delete</button>
            <button type="submit" name="confirm" value="no">No, cancel</button>
        </form>

    <?php else: // list users ?>
        <p><a href="users_crud.php?action=add">Add New User</a></p>
        <?php
        $res = $mysqli->query('SELECT id, username FROM users ORDER BY id ASC');
        if ($res && $res->num_rows > 0):
        ?>
            <table>
                <tr><th>ID</th><th>Username</th><th>Actions</th></tr>
                <?php while ($r = $res->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($r['id']); ?></td>
                        <td><?php echo htmlspecialchars($r['username']); ?></td>
                        <td>
                            <a href="users_crud.php?action=edit&id=<?php echo urlencode($r['id']); ?>">Edit</a> |
                            <a href="users_crud.php?action=delete&id=<?php echo urlencode($r['id']); ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No users found. <a href="users_crud.php?action=add">Add one</a>.</p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>
<?php $mysqli->close(); ?>