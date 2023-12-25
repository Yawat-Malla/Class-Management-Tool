<?php

$title = "Todo | CMT";
$content = '<div id="content-middle">

	<h1>To-Do List</h1>
	
		<form method="POST" action="todo.php">
			<label for="new-task">Add New Task:</label><br>
			<input type="text" id="new-task" name="new" placeholder="New Task...." required>
			<button type="submit">Add Task</button>
		</form>
		';

require_once '../include/base.php';
include '../include/config.php';
$view = "select * from todolist where user_id='" . ($_SESSION['user_id']) . "'";
$view_result = mysqli_query($con, $view);

if (mysqli_num_rows($view_result) > 0) {
	echo "<table>";
	while ($row = mysqli_fetch_assoc($view_result)) {
		echo "<tr>";
		echo "<td>" . $row['tasks'] . "</td>";
		echo "<td> <button><a href='delete.php?id=" . $row['id'] . "'>Delete</a></button></td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "No tasks to view </div>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'webpage/include/config.php';

    $insert = "INSERT INTO todolist (tasks, user_id) 
               VALUES ('" . $_POST['new'] . "','" . $_SESSION['user_id'] . "')";
    $insert_result = mysqli_query($con, $insert);

    // Check if the insertion was successful
    if ($insert_result) {
        // Redirect to the same page after insertion
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}
?>
