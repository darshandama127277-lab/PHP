<?php
// session_create.php
// This page starts a session and stores a username.
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    if ($username === '') {
        $username = 'Student';
    }
    $_SESSION['user_name'] = $username;
    $message = 'Session created. View it on session_read.php.';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Session</title>
</head>
<body>
    <h2>Create Session</h2>
    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form method="post">
        Name: <input type="text" name="username" placeholder="Enter name">
        <button type="submit">Create Session</button>
    </form>
    <p><a href="session_read.php">Read Session</a></p>
</body>
</html>
