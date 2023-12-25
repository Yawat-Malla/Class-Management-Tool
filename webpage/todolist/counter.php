<?php
    require 'webpage/include/config.php';

    $view = "SELECT * FROM todolist WHERE user_id='" . ($_SESSION['user_id']) . "'";
    $view_result = mysqli_query($con, $view);

    if ($view_result) {
        $counter = mysqli_num_rows($view_result);
    } else {
        $counter=0;
    }
?>  
