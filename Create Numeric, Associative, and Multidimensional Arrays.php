<?php
$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

$months = array(
    "January" => 31,
    "February" => 28,
    "March" => 31,
    "April" => 30,
    "May" => 31,
    "June" => 30,
    "July" => 31,
    "August" => 31,
    "September" => 30,
    "October" => 31,
    "November" => 30,
    "December" => 31
);

$laptops = array(
    "Dell" => array(
        "Model" => "Inspiron 15",
        "Price" => "₹55,000"
    ),
    "HP" => array(
        "Model" => "Pavilion",
        "Price" => "₹60,000"
    )
);

echo "<h3>1. Numeric Array (Days):</h3>";
echo "<pre>";
print_r($days);
echo "</pre>";

echo "<h3>2. Associative Array (Months):</h3>";
echo "<pre>";
print_r($months);
echo "</pre>";

echo "<h3>3. Multidimensional Array (Laptops):</h3>";
echo "<pre>";
print_r($laptops);
echo "</pre>";
?>