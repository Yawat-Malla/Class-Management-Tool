<?php

$title="Schedule | CMT ";
$content='
<div id="content-middle">
<h1>Schedule</h1>
<h3> Grade 11, Khumbutse</h3>
<button class="home_button"><a href ="./schedule.php">Back</a></button>';
require_once '../include/base.php';
include '../include/config.php';
    $present_day = date('l');
    $query = "select * from schedule;";
    if($present_day!="Sunday" && $present_day!="Saturday" &&  $present_day!="Friday" ){
        $result = mysqli_query($con,$query);
        echo"<table>";
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['timeperiod'] . "</td>";
            if($present_day=="Monday"){
                echo "<td>".$row['Tuesday']."</td>";
            }
            elseif($present_day=="Tuesday"){
            echo "<td>".$row['Wednesday']."</td>";
            }
            elseif($present_day=="Wednesday"){
            echo "<td>".$row['Thursday']."</td>";
            }
            elseif($present_day=="Thursday"){
            echo "<td>".$row['Friday']."</td>";
            }

            echo "</tr>";
        
        }
    }
    elseif($present_day=="Sunday"){
        $result = mysqli_query($con,$query);
        echo"<table>";
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['Monday']."</td></tr>";
        }
    }
   else{
        echo "<br><br><br>Tomorrow is holiday.<br> ";
    }
    echo "</table></div>";
?>
