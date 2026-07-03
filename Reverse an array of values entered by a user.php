<!DOCTYPE html>
<html>
<body>
    <h2>Reverse Array Program</h2>
    <form method="POST">
        Enter values (separated by comma): <input type="text" name="user_input" required>
        <input type="submit" name="submit" value="Reverse">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input_string = $_POST['user_input'];
        $original_array = explode(",", $input_string);
        $reversed_array = array_reverse($original_array);
        
        echo "<h3>Original Array:</h3>";
        echo "<pre>";
        print_r($original_array);
        echo "</pre>";

        echo "<h3>Reversed Array:</h3>";
        echo "<pre>";
        print_r($reversed_array);
        echo "</pre>";
    }
    ?>
</body>
</html>