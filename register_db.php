<?php
// Simple registration form + insert into `users` table.
// Update DB credentials below before using.
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'test';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_error) {
    die('DB connection error: ' . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name === '' || $email === '' || $username === '' || $password === '') {
        $error = 'Please fill all fields.';
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare('INSERT INTO users (name, email, username, password) VALUES (?, ?, ?, ?)');
        if ($stmt) {
            $stmt->bind_param('ssss', $name, $email, $username, $hash);
            if ($stmt->execute()) {
                $success = 'Registration successful. You can now login.';
            } else {
                $error = 'Insert failed: ' . htmlspecialchars($stmt->error);
            }
            $stmt->close();
        } else {
            $error = 'Prepare failed: ' . htmlspecialchars($mysqli->error);
        }
    }
}
$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register (DB)</title>
</head>
<body>
    <h1>Registration</h1>
    <?php if (!empty($error)): ?>
        <p style="color:red"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <p style="color:green"><?php echo $success; ?></p>
    <?php endif; ?>
    <form method="post" action="register_db.php">
        <label>Name: <input type="text" name="name" required></label><br><br>
        <label>Email: <input type="email" name="email" required></label><br><br>
        <label>Username: <input type="text" name="username" required></label><br><br>
        <label>Password: <input type="password" name="password" required></label><br><br>
        <button type="submit">Register</button>
    </form>
    <p>Note: Create table `users` before using. Example SQL:</p>
    <pre>CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100), email VARCHAR(100), username VARCHAR(50) UNIQUE, password VARCHAR(255));</pre>
</body>
</html>