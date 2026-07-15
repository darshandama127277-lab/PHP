<?php
if (isset($_POST['upload'])) {

    $folder = "uploads/";

    // Create uploads folder if it does not exist
    if (!file_exists($folder)) {
        mkdir($folder);
    }

    $filename = $_FILES["image"]["name"];
    $filesize = $_FILES["image"]["size"];
    $fileerror = $_FILES["image"]["error"];
    $target = $folder . basename($filename);

    if ($fileerror == 0) {

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {

            echo "<h3>Image Uploaded Successfully!</h3>";
            echo "File Name : " . $filename . "<br>";
            echo "File Size : " . round($filesize / 1024, 2) . " KB<br>";
            echo "Error Code : " . $fileerror . " (No Error)<br>";

        } else {

            echo "<h3>Image Upload Failed!</h3>";

        }

    } else {

        echo "<h3>Error While Uploading File!</h3>";
        echo "Error Code : " . $fileerror;

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>

<h2>Upload Image on Server</h2>

<form method="post" enctype="multipart/form-data">
    Select Image:
    <input type="file" name="image" required><br><br>

    <input type="submit" name="upload" value="Upload Image">
</form>

</body>
</html>