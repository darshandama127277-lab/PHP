<!DOCTYPE html>
<html>
<body>
    <h2>Sort Array Program</h2>
    <form method="POST">
        Enter numbers (separated by comma): <input type="text" name="user_numbers" required>
        <input type="submit" name="submit" value="Sort">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input = $_POST['user_numbers'];
        $arr = explode(",", $input);
        
        sort($arr);
        
        echo "<h3>Sorted Array:</h3>";
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
    ?>
</body>
</html>