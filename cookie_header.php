<?php
if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    setcookie('user', $username, time() + 3600, '/');
    header('Location: cookie_read.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Cookie with Header</title>
</head>
<body>
    <h1>Create Cookie with Header Redirect</h1>
    <form method="post" action="cookie_header.php">
        <label for="username">Enter name:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Create and Redirect</button>
    </form>
    <p><a href="cookie_read.php">Read cookie</a></p>
</body>
</html>
