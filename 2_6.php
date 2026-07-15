<?php

date_default_timezone_set("Asia/Kolkata");

echo "Current Date & Time : " . date("d/m/Y h:i:s A");
echo "<br><br>";

echo "DAYOFWEEK : " . date("w") + 1;
echo "<br>";

echo "WEEKDAY : " . date("N") - 1;
echo "<br>";

echo "DAYOFMONTH : " . date("d");
echo "<br>";

echo "DAYOFYEAR : " . date("z") + 1;
echo "<br>";

echo "DAYNAME : " . date("l");

?>