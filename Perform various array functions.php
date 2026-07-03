<?php
echo "<h3>1) array_change_key_case()</h3>";
$colors = array("ReD" => 1, "bLuE" => 2, "GrEeN" => 3);
echo "<b>CASE_UPPER:</b><br>";
echo "<pre>";
print_r(array_change_key_case($colors, CASE_UPPER));
echo "</pre>";
echo "<b>CASE_LOWER:</b><br>";
echo "<pre>";
print_r(array_change_key_case($colors, CASE_LOWER));
echo "</pre>";

echo "<h3>2) array_count_values()</h3>";
$letters = array("A", "B", "A", "C", "B", "A", "D");
echo "<pre>";
print_r(array_count_values($letters));
echo "</pre>";

echo "<h3>3) array_pop()</h3>";
$fruits_pop = array("Apple", "Banana", "Cherry", "Mango");
array_pop($fruits_pop);
echo "<pre>";
print_r($fruits_pop);
echo "</pre>";

echo "<h3>4) array_push()</h3>";
$fruits_push = array("Apple", "Banana");
array_push($fruits_push, "Cherry", "Mango");
echo "<pre>";
print_r($fruits_push);
echo "</pre>";

echo "<h3>5) sort()</h3>";
$numbers = array(45, 12, 78, 4, 89, 23);
sort($numbers);
echo "<pre>";
print_r($numbers);
echo "</pre>";
?>