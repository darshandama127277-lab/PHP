<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "data");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $message = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST["username"] ?? "");
        $password = mysqli_real_escape_string($conn, $_POST["password"] ?? "");

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: homepage.php");
            exit();
        } else {
            $message = "Invalid username or password.";
        }
    }
    mysqli_close($conn);
    ?>

    <?php if ($message != ''): ?>
        <p style="color:red;"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Login"><br><br>
        <a href="forgot_password.php">Forgot Password?</a>
    </form>
</body>
</html>