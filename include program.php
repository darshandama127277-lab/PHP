<?php
echo "<h2>Testing Include and Require</h2>";

echo "<h3>Using Include:</h3>";
include 'menu.php'; 
echo "<p>If menu.php is missing, you will still see this message.</p>";

echo "<hr>";

echo "<h3>Using Require:</h3>";
require 'menu.php';
echo "<p>If menu.php is missing, the code stops. You will NOT see this message.</p>";
?>