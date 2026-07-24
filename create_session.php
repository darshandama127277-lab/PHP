<?php
session_start();
$message = '';
if (isset($_POST['username'])) {
    $_SESSION['user'] = trim($_POST['username']);
    $message = 'Session created for user: ' . htmlspecialchars($_SESSION['user']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Session</title>
</head>
<body>
    <h1>Create Session</h1>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
        <p>Session value: <?php echo htmlspecialchars($_SESSION['user']); ?></p>
    <?php endif; ?>
    <form method="post" action="create_session.php">
        <label for="username">Enter name:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Start Session</button>
    </form>
    <p><a href="destroy_session.php">Destroy session</a></p>
</body>
</html>
