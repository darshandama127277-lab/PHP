<?php

echo "Using For Loop <br>";

for($i = 5; $i <= 10; $i++)
{
    echo $i . "<br>";
}

echo "<br>Using For Each Loop <br>";

$numbers = array(5, 6, 7, 8, 9, 10);

foreach($numbers as $num)
{
    echo $num . "<br>";
}

?>
