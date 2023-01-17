<?php
	// TODO WIDGET DATA PROCESSING
	require('init.php');

    /** @var mysqli|bool $connection */

	$add_input= $_POST['add-input'];
	$todo_user = $_SESSION['username'];
	$todo_title = $_POST['todo_title'];
	$todo_checked = $_POST['todo_checked'];
	$todo_input = $_POST['todo_input'];
	$todo_delete = $_POST['todo_delete'];

	if ($todo_delete!=""){
		$query = "DELETE FROM todo_list WHERE todo_user = '$todo_user' AND todo_name = '$todo_delete' LIMIT 1";
		$result = mysqli_query($connection, $query);
	}

	if ($todo_input!="" && $todo_title!=""){
		$query = "UPDATE todo_list SET todo_name = '$todo_input' WHERE todo_user = '$todo_user' AND todo_name = '$todo_title'";
		$result = mysqli_query($connection, $query);
	}


	if (isset($_POST['add-input'])){
		$query = "INSERT INTO todo_list (todo_user, todo_name, todo_checked) VALUES ('$todo_user', '$add_input', '0')";
		$result = mysqli_query($connection, $query);
		if ($result){
			echo 'True';
		} else {
			echo 'False';
		}
	}

	if ($todo_title!="" && $todo_checked!=""){
		$query = "UPDATE todo_list SET todo_checked = '$todo_checked' WHERE todo_user = '$todo_user' AND todo_name = '$todo_title'";
		$result = mysqli_query($connection, $query);		
		if ($result){
			echo 'True';
		} else {
			echo 'False';
		}
	}

?>