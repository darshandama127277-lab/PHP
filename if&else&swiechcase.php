<?php
    $month_number = date("n");

    echo "Month using if..else:<br>";
    
    if ($month_number == 1) { echo "January<br>"; }
    elseif ($month_number == 2) { echo "February<br>"; }
    elseif ($month_number == 3) { echo "March<br>"; }
    elseif ($month_number == 4) { echo "April<br>"; }
    elseif ($month_number == 5) { echo "May<br>"; }
    elseif ($month_number == 6) { echo "June<br>"; }
    elseif ($month_number == 7) { echo "July<br>"; }
    elseif ($month_number == 8) { echo "August<br>"; }
    elseif ($month_number == 9) { echo "September<br>"; }
    elseif ($month_number == 10) { echo "October<br>"; }
    elseif ($month_number == 11) { echo "November<br>"; }
    elseif ($month_number == 12) { echo "December<br>"; }

    echo "<br>Month using switch case:<br>";
    
    switch ($month_number) {
        case 1: echo "January<br>"; break;
        case 2: echo "February<br>"; break;
        case 3: echo "March<br>"; break;
        case 4: echo "April<br>"; break;
        case 5: echo "May<br>"; break;
        case 6: echo "June<br>"; break;
        case 7: echo "July<br>"; break;
        case 8: echo "August<br>"; break;
        case 9: echo "September<br>"; break;
        case 10: echo "October<br>"; break;
        case 11: echo "November<br>"; break;
        case 12: echo "December<br>"; break;
    }
?>
