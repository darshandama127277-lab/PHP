<?php
session_start();

// If logout requested, destroy session and redirect to login
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $_SESSION = array();
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'], $params['secure'], $params['httponly']
        );
    }
    session_destroy();
    header('Location: session_auth.php');
    exit;
}

// If already logged in, show protected home
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Home (Protected)</title>
    </head>
    <body>
        <h1>Welcome, <?php echo htmlspecialchars($user); ?></h1>
        <p>This is a protected page. You cannot open this page if you are logged out.</p>
        <p><a href="session_auth.php?action=logout">Logout</a></p>
    </body>
    </html>
    <?php
    exit;
}

// Handle login form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    // Simple hardcoded check for demo purposes
    if ($username === 'student' && $password === 'pass123') {
        $_SESSION['user'] = $username;
        header('Location: session_auth.php');
        exit;
    } else {
        $message = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login (Session)</title>
</head>
<body>
    <h1>Login (Session)</h1>
    <?php if ($message): ?>
        <p style="color:red"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form method="post" action="session_auth.php">
        <label>Username: <input type="text" name="username" required></label><br><br>
        <label>Password: <input type="password" name="password" required></label><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Demo credentials: <strong>student</strong> / <strong>pass123</strong></p>
</body>
</html>