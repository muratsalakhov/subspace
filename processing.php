<?php
	// TODO WIDGET DATA PROCESSING
	require('database.php');
	$add_input= $_POST['add-input'];
	$todo_user = $_SESSION['username'];
	$todo_title = $_POST['todo_title'];
	$todo_checked = $_POST['todo_checked'];
	//$todo_checked = 0;
	
	if (isset($_POST['add-input'])){
		$query = "INSERT INTO todo_list (todo_user, todo_name, todo_checked) VALUES ('$todo_user', '$add_input', '0')";
		$result = mysqli_query($connection, $query);
		if ($result){
			echo 'True';
		} else {
			echo 'False';
		}
	}

	//if (isset($_POST['todo_title'])){
		$query = "UPDATE todo_list SET todo_checked = '$todo_checked' WHERE todo_user = '$todo_user' AND todo_name = '$todo_title'";
		$result = mysqli_query($connection, $query);		
		if ($result){
			echo 'True';
		} else {
			echo 'False';
		}
	//}

?>