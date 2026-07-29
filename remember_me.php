<?php
session_start();
$message = '';
$savedUser = $_COOKIE['rm_user'] ?? '';
$savedPass = $_COOKIE['rm_pass'] ?? '';

// Handle logout via query
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $_SESSION = array();
    session_destroy();
    header('Location: remember_me.php');
    exit;
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
    </head>
    <body>
        <h1>Hello, <?php echo htmlspecialchars($user); ?></h1>
        <p><a href="remember_me.php?action=logout">Logout</a></p>
    </body>
    </html>
    <?php
    exit;
}

// Process form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = isset($_POST['remember']);
    // Demo credentials
    if ($username === 'student' && $password === 'pass123') {
        $_SESSION['user'] = $username;
        if ($remember) {
            setcookie('rm_user', $username, time() + 7*24*3600, '/');
            setcookie('rm_pass', $password, time() + 7*24*3600, '/');
        } else {
            setcookie('rm_user', '', time() - 3600, '/');
            setcookie('rm_pass', '', time() - 3600, '/');
        }
        header('Location: remember_me.php');
        exit;
    } else {
        $message = 'Invalid login.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Remember Me Login</title>
</head>
<body>
    <h1>Login (Remember Me)</h1>
    <?php if ($message): ?>
        <p style="color:red"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form method="post" action="remember_me.php">
        <label>Username: <input type="text" name="username" value="<?php echo htmlspecialchars($savedUser); ?>" required></label><br><br>
        <label>Password: <input type="password" name="password" value="<?php echo htmlspecialchars($savedPass); ?>" required></label><br><br>
        <label><input type="checkbox" name="remember"> Remember me</label><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Demo: student / pass123</p>
</body>
</html>