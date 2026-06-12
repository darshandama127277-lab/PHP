<?php
$a = 50;
$b = 20;
$c = 80;

if ($a > $b && $a > $c) {
    echo "Max: " . $a;
} elseif ($b > $a && $b > $c) {
    echo "Max: " . $b;
} else {
    echo "Max: " . $c;
}

if ($a < $b && $a < $c) {
    echo "<br>Min: " . $a;
} elseif ($b < $a && $b < $c) {
    echo "<br>Min: " . $b;
} else {
    echo "<br>Min: " . $c;
}
?>
