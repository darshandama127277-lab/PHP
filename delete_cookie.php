<?php
if (isset($_COOKIE['user'])) {
    setcookie('user', '', time() - 3600, '/');
    $message = 'Cookie deleted.';
} else {
    $message = 'No cookie found to delete.';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Delete Cookie</title>
</head>
<body>
    <h1>Delete Cookie</h1>
    <p><?php echo $message; ?></p>
    <p><a href="cookie_read.php">Check cookie</a></p>
    <p><a href="cookie_create_form.php">Create cookie again</a></p>
</body>
</html>
