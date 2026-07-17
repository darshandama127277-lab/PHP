<?php
$conn = mysqli_connect("localhost", "root", "", "data");
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['student_name'] ?? '');
    $roll = trim($_POST['student_roll'] ?? '');
    $class = trim($_POST['student_class'] ?? '');
    $age = intval($_POST['student_age'] ?? 0);
    $email = trim($_POST['student_email'] ?? '');

    if ($name === '' || $roll === '') {
        $error = 'Please provide at least Name and Roll.';
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO students (student_name, student_roll, student_class, student_age, student_email) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sssis', $name, $roll, $class, $age, $email);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header('Location: display_student.php');
            exit;
        } else {
            $error = 'Insert failed: ' . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Student</title>
</head>
<body>
    <h2>Add Student</h2>
    <?php if ($error): ?>
        <p style="color:red"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label>Name:<br><input type="text" name="student_name" required></label><br><br>
        <label>Roll:<br><input type="text" name="student_roll" required></label><br><br>
        <label>Class:<br><input type="text" name="student_class"></label><br><br>
        <label>Age:<br><input type="number" name="student_age" min="1"></label><br><br>
        <label>Email:<br><input type="email" name="student_email"></label><br><br>
        <button type="submit">Save Student</button>
    </form>

    <p><a href="display_student.php">View Students</a></p>
</body>
</html>

<?php mysqli_close($conn); ?>
