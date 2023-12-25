<?php
session_start();
if ($_SESSION['started'] == true) {
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CMT</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>

        <div id="navbar">
            <ul>
                <li><img src="../../images/dashboard.png" class="icon" /><a href ="./index.php">Dashboard</a></li>
                <li><img src="../../images/todo.png" class="icon" /><a href="./webpage/todolist/todo.php">Todo</a></li>
                <li><img src="../../images/schedule.png" class="icon" /><a href="./webpage/schedule/schedule.php">Schedule</a></li>
                <li><img src="../../images/assignments.png" class="icon" /><a href="./webpage/assignment/assignment.php">Assignment</a></li>
                <li><img src="../../images/notes.png" class="icon" /><a href="./webpage/notes/notes.php">Notes</a></li>
            </ul>
        </div>

        <div id="content-middle">
            <h3>Hello, <?php echo $_SESSION['username'] ?> !</h3>
            <?php include "./webpage/todolist/counter.php"?>
            <h1>You've got <?php echo $counter ?> tasks today</h1><br><br>
            <?php include "./webpage/todolist/show_todolist.php";
            echo "<br><br>";
            include "./webpage/assignment/show_assignments.php" ?>
        </div>

        <div id="content-right">
            <table>
                <tr>
                    <td><img src="images/profile.jpg" alt="profile" class="profile-img" /></td>
                    <td style='width: 150px;'>
                        <h3><?php echo $_SESSION["username"] ?></h3>
                    </td>
                    <td padding=10px;>
                        <button class="lg-out-btn"><a href= "./webpage/login/logout.php" ><img src="./images/logout.png" class="icon"/></a></button>
                    </td>
                </tr>
            </table>
            <br>
            <?php include "webpage/gadgets/calendar.php" ?>
        </div>
    <?php
} else {
    header('location:webpage/login/login.php');
}
    ?>
    </body>

    </html>