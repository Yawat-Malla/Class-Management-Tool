<?php
date_default_timezone_set('UTC');
$month = date('m');
$year = date('Y');
$numDays = date('t', strtotime("$year-$month-01"));
$firstDay = date('N', strtotime("$year-$month-01"));
$currentDay = date('j');
echo  date('d F Y');
echo "<h1>Today</h1>";
echo "<table class='calendar'>";
echo "<tr>";
echo "<th>Mon</th>";
echo "<th>Tue</th>";
echo "<th>Wed</th>";
echo "<th>Thu</th>";
echo "<th>Fri</th>";
echo "<th>Sat</th>";
echo "<th>Sun</th>";
echo "</tr>";

$day = 1;
echo "<tr>";
for ($i = 1; $i <= 7; $i++) {
    if ($i < $firstDay) {
        echo "<td></td>";
    } else {
        $class = ($day == $currentDay) ? 'current-day' : '';
        echo "<td class='$class'>" . $day . "</td>";
        $day++;
    }
}
echo "</tr>";

while ($day <= $numDays) {
    echo "<tr>";
    for ($i = 1; $i <= 7; $i++) {
        if ($day > $numDays) {
            echo "<td></td>";
        } else {
            $class = ($day == $currentDay) ? 'current-day' : '';
            echo "<td class='$class'>" . $day . "</td>";
            $day++;
        }
    }
    echo "</tr>";
}

echo "</table>";
?>
