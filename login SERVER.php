<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>
    <form method = "POST">
        <label for="username">Username:</label>
        <input type="text" name="username" ><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password"><br><br>
        
        <input type="submit" value="Login"> 
    
</body>
</html>

<?php

    include 'db.php'

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    
    $sql = "INSERT INTO user ("name",'password') VALUE ('$user','$pass')";
    mysqli_query($conn,$sql);

    }

?>