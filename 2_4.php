<?php

$str = "Hello World Welcome to PHP Programming";

echo "<h2>PHP String Functions</h2>";

echo "Original String: <b>$str</b><br><br>";

echo "1. strlen()<br>";
echo "Length of String: " . strlen($str);
echo "<br><br>";

echo "2. strpos()<br>";
echo "Position of 'PHP': " . strpos($str, "PHP");
echo "<br><br>";

echo "3. str_word_count()<br>";
echo "Total Words: " . str_word_count($str);
echo "<br><br>";

echo "4. strrev()<br>";
echo "Reversed String: " . strrev($str);
echo "<br><br>";

echo "5. strtolower()<br>";
echo strtolower($str);
echo "<br><br>";

echo "6. strtoupper()<br>";
echo strtoupper($str);

?>