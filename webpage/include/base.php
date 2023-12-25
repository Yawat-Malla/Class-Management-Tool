<?php
session_start();
if ($_SESSION['started'] == true) {
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php $title ?></title>
        <link rel="stylesheet" href="../../css/style.css">
    </head>

    <body>

        <div id="navbar">
            <ul>
                <li><img src="../../images/dashboard.png" class="icon" /><a href="../../index.php">Dashboard</a></li>
                <li><img src="../../images/todo.png" class="icon" /><a href="../todolist/todo.php">Todo</a></li>
                <li><img src="../../images/schedule.png" class="icon" /><a href="../schedule/schedule.php">Schedule</a></li>
                <li><img src="../../images/assignments.png" class="icon" /><a href="../assignment/assignment.php">Assignment</a></li>
                <li><img src="../../images/notes.png" class="icon" /><a href="../notes/notes.php">Notes</a></li>
            </ul>
        </div>
        
    <?php echo $content ?? ""; } else {
    header('location:webpage/login/login.php');
}
    ?>
    </body>

    </html>