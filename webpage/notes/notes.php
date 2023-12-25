<?php

$title = "Notes | CMT";
$content = '
<div id="content-middle">
<h1>Get notes</h1>
<nav>
    <form action="notes.php" method="POST">
        <input type="text" name="search" placeholder="Search by subject...">
    <button type="submit">Search</button>
    </form>
</nav>';

require_once '../include/base.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    require('../include/config.php');
    $query = "select * from notes";
    $result_query = mysqli_query($con, $query);
    $found = 0;
    echo "<table border=0>";
    echo "<tr><th>File Name</th><th>Subject</th><th>Uploaded by</th>";
    while ($row = mysqli_fetch_assoc($result_query)) {
        if ($row['subject'] == strtolower($_POST['search'])) {
            echo "<tr>
                <td>" . $row['file_name'] . "</td>
                <td>" . $row['subject'] . "</td>
                <td>" . $row['username'] . "</td>
                <td> <button><a href='download.php?file_name=" . $row['file_name'] . "'>Download</a></button></td>
                ";
            $found = 1;
        }
    }
    if ($found == 0) {
        echo "Sorry, no result was found for the subject.";
    }
    echo "</table></div>";
}
?>
<h3><a href="upload.php" style="text-decoration:none;">Upload Notes</a></h3>