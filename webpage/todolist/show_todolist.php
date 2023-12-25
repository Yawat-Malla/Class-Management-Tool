<h1>My tasks</h1>
<br>
<?php
	require 'webpage/include/config.php';

	$view = "select * from todolist where user_id='".($_SESSION['user_id'])."'";
	$view_result = mysqli_query($con, $view);
	$counter = 0;
	if (mysqli_num_rows($view_result) > 0) {
		echo "<table>";
		while ($row = mysqli_fetch_assoc($view_result)){
            echo "<tr>";
            echo "<td>" . $row['tasks'] . "</td>";
            echo "</tr>";
			$counter +=1;
		}
		echo "</table>";
	}
	else {
		echo "No tasks to view";
	}
?>
