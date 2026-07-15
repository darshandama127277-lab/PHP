<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirmPassword = $_POST["confirm_password"] ?? "";
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");

    if ($password !== $confirmPassword) {
        $message = "Passwords do not match. Please try again.";
    } else {
        $message = "Welcome, $username! Your student sign-in form has been submitted successfully.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign In</title>
</head>
<body>
    <div style="border: 1px solid #ccc; padding: 20px; width: 320px; margin: 30px auto;">
        <h2>Student Sign In</h2>

        <?php if ($message !== "") : ?>
            <p><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required><br><br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required><br><br>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required><br><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required><br><br>

            <button type="submit">Sign In</button>
        </form>
    </div>
</body>
</html>
