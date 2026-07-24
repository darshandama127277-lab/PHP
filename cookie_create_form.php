<?php
$message = '';
if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    setcookie('user', $username, time() + 3600, '/');
    $message = 'Cookie created for user: ' . htmlspecialchars($username);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Cookie</title>
</head>
<body>
    <h1>Create Cookie</h1>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
        <p><a href="cookie_read.php">Read cookie</a></p>
    <?php endif; ?>
    <form method="post" action="cookie_create_form.php">
        <label for="username">Enter name:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Save Cookie</button>
    </form>
</body>
</html>
