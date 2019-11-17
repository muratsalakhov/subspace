<?php
	// TODO WIDGET DATA PROCESSING
	require('database.php');
	$add_input= $_POST['add-input'];
	$todo_user = $_SESSION['username'];
	$todo_checked = 0;
	
	$query = "INSERT INTO todo_list (todo_user, todo_name, todo_checked) VALUES ('$todo_user', '$add_input', '$todo_checked')";
	$result = mysqli_query($connection, $query);
	if ($result){
		echo 'True';
	} else {
		echo 'False';
	}
?>