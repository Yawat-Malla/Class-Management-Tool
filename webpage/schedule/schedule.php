<?php
$title= "Schedule | CMT";
$content='<div id="content-middle">
<h1>Schedule</h1>
<h3> Grade 11, Khumbutse</h3>
<button ><a href = "otherdays.php" / >Tomorrow>> </button>';

require_once '../include/base.php';
include '../include/config.php';
    $present_day = date('l');
    $full_date = date("l, F j, Y");

    echo"<p>".$full_date."</p>";

    $query = "select * from schedule;";

    if($present_day!="Sunday" and $present_day!="Saturday"){
        $result = mysqli_query($con,$query);
        echo"<table>";
        
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['timeperiod'] . "</td>";
            if($present_day=="Monday"){
                echo "<td>".$row['Monday']."</td>";
            }
            elseif($present_day=="Tuesday"){
            echo "<td>".$row['Tuesday']."</td>";
            }
            elseif($present_day=="Wednesday"){
            echo "<td>".$row['Wednesday']."</td>";
            }
            elseif($present_day=="Thursday"){
            echo "<td>".$row['Thursday']."</td>";
            }
            elseif($present_day=="Friday"){
            echo "<td>".$row['Friday']."</td>";
            }
            echo "</tr>";
        
        }
        echo "</table> ";
    }
    else{
        echo "It is holiday today.";
    }

    echo '<div id="content-middle">';
    ?>