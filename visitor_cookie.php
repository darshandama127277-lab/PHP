<?php
// Simple visitor cookie: new vs returning
if (isset($_COOKIE['visitor'])) {
    $count = (int)$_COOKIE['visitor'] + 1;
    setcookie('visitor', $count, time() + 30*24*3600, '/');
    $message = 'Welcome back! This is your visit number ' . $count . '.';
} else {
    setcookie('visitor', 1, time() + 30*24*3600, '/');
    $message = 'Welcome, new visitor!';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Visitor Cookie</title>
</head>
<body>
    <h1>Visitor Check</h1>
    <p><?php echo htmlspecialchars($message); ?></p>
    <p><a href="visitor_cookie.php">Refresh</a></p>
</body>
</html>