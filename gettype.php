<?php

$value = "100";

echo "<h2>Type Casting using settype() and gettype()</h2>";

echo "Original Value : " . $value . "<br>";
echo "Original Data Type : " . gettype($value) . "<br><br>";

// Convert String to Integer
settype($value, "integer");

echo "After Type Casting<br>";
echo "Value : " . $value . "<br>";
echo "Data Type : " . gettype($value) . "<br><br>";

// Convert Integer to Float
settype($value, "float");

echo "After Converting to Float<br>";
echo "Value : " . $value . "<br>";
echo "Data Type : " . gettype($value) . "<br><br>";

// Convert Float to String
settype($value, "string");

echo "After Converting to String<br>";
echo "Value : " . $value . "<br>";
echo "Data Type : " . gettype($value) . "<br>";

?>