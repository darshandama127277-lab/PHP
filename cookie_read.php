<?php
$cookieValue = isset($_COOKIE['user']) ? $_COOKIE['user'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Read Cookie</title>
</head>
<body>
    <h1>Read Cookie</h1>
    <?php if ($cookieValue): ?>
        <p>Cookie value: <?php echo htmlspecialchars($cookieValue); ?></p>
    <?php else: ?>
        <p>No cookie found. Please create one first.</p>
    <?php endif; ?>
    <p><a href="cookie_create_form.php">Create cookie</a></p>
    <p><a href="cookie_header.php">Create cookie and use header redirect</a></p>
    <p><a href="delete_cookie.php">Delete cookie</a></p>
</body>
</html>
