<?php
$conn = mysqli_connect("localhost", "root", "", "data");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username'] ?? '');
    $newPassword = mysqli_real_escape_string($conn, $_POST['new_password'] ?? '');

    if ($username != '' && $newPassword != '') {
        $sql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
        if (mysqli_query($conn, $sql)) {
            if (mysqli_affected_rows($conn) > 0) {
                $message = "Password updated successfully.";
            } else {
                $message = "Username not found.";
            }
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    } else {
        $message = "Please enter username and new password.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>

    <?php if ($message != ''): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>New Password:</label>
        <input type="password" name="new_password" required><br><br>

        <input type="submit" value="Reset Password">
    </form>

    <p><a href="Login.php">Back to Login</a></p>
</body>
</html>
