<?php
$name = '';
$email = '';
$phone = '';
$userid = '';
$errors = [];
$submitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = trim($_POST['userid'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($userid === '') {
        $errors[] = 'User ID is required.';
    }
    if ($name === '') {
        $errors[] = 'Name is required.';
    }
    if ($email === '') {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is not valid.';
    }
    if ($phone === '') {
        $errors[] = 'Phone number is required.';
    }
    if ($password === '') {
        $errors[] = 'Password is required.';
    }

    if (empty($errors)) {
        $submitted = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Collection</title>
</head>
<body>
    <h2>Collect User Data</h2>

    <?php if (!empty($errors)): ?>
        <div>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <p>
            <label for="userid">User ID</label><br>
            <input type="text" id="userid" name="userid" value="<?php echo htmlspecialchars($userid); ?>" required>
        </p>
        <p>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
        </p>
        <p>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </p>
        <p>
            <label for="phone">Phone Number</label><br>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
        </p>
        <p>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required>
        </p>
        <p>
            <button type="submit">Submit</button>
        </p>
    </form>

    <?php if ($submitted): ?>
        <h3>Submitted Data</h3>
        <p>User ID: <?php echo htmlspecialchars($userid); ?></p>
        <p>Name: <?php echo htmlspecialchars($name); ?></p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <p>Phone: <?php echo htmlspecialchars($phone); ?></p>
        <p>Password: (received)</p>
    <?php endif; ?>
</body>
</html>