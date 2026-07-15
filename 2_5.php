<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>

<form method="post">
    First Number:
    <input type="number" name="a"><br><br>

    Second Number:
    <input type="number" name="b"><br><br>

    Operation:
    <select name="op">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br><br>

    <input type="submit" name="btn" value="Calculate">
</form>

<?php

function calc($x, $y, $op)
{
    if($op=="+")
        return $x+$y;
    elseif($op=="-")
        return $x-$y;
    elseif($op=="*")
        return $x*$y;
    elseif($op=="/")
        return $x/$y;
}

if(isset($_POST['btn']))
{
    $a = $_POST['a'];
    $b = $_POST['b'];
    $op = $_POST['op'];

    echo "Answer = " . calc($a, $b, $op);
}

?>

</body>
</html>