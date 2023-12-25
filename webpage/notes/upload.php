<?php

$title = 'Upload Notes';
$content = '<div id="content-middle">
<h1>Upload Notes</h1>

<table>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <tr><td><label for="upload">Add files:</label></td></tr>
    <tr><td><input type="file" id="upload" name="file" required><br></td></tr>
    <tr><td><label for="subject">Subject:</label><td>
        <td><select name="subject" id="subject" required>
                <option value="physics">Physics</option>
                <option value="chemistry">Chemistry</option>
                <option value="mathematics">Mathematics</option>
                <option value="coding">Coding</option>
            </select></td></tr>
    <tr><td><input type="submit" name="submit" value="Upload"></td></tr>
    </form>
</table></div>';

require_once '../include/base.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $folder = "files/" . $file_name;
    // $temp_name = $_FILES[$_POST['file']];
    move_uploaded_file($temp_name, $folder);

    include '../include/config.php';
    $insert = "insert into notes(file_name, username, subject) values('" . $file_name . "','" . $_SESSION['username'] . "','" . $_POST['subject'] . "')";
    mysqli_query($con, $insert);
}
?>