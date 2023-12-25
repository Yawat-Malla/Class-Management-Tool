<h1>Your Assignments</h1>
<?php

include 'webpage/include/config.php';
$view = "select * from assignment";
$view_result = mysqli_query($con, $view);


// to display in list
if (mysqli_num_rows($view_result) > 0) {
    echo "<table class = 'show-assignments'>";
    echo "<tr>";
    echo "<th>Subjects</th>";
    echo "<th>Homework</th>";
    echo "<th>Due Date</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($view_result)) {

        echo "<tr>";
        echo "<td>" . $row['subjects'] . "</td>";
        echo "<td>" . $row['homeworks'] . "</td>";
        echo "<td>" . $row['due'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo " <br> No assignment pending at the moment.";
}

?>