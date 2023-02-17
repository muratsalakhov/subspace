<?php
	// NOTES WIDGET DATA PROCESSING
	require('init.php');

    /** @var mysqli|bool $connection */

	$notes_user = $_SESSION['username'];
	$notes_title = $_POST['notes_title'];
	$notes_input = $_POST['notes_input'];
	$notes_title_old = $_POST['notes_title_old'];
	$notes_delete = $_POST['notes_delete'];
	$notes_text = $_POST['notes_text'];
	$notes_text_title = $_POST['notes_text_title'];

	if ($notes_title!=""){
		$query = "INSERT INTO notes (notes_user, notes_title, notes_text) VALUES ('$notes_user', '$notes_title', 'Всем привет, я новая заметка!)')";
		$result = mysqli_query($connection, $query);
		if ($result){
			echo "True";
		} else {
			echo "False";
		}
	}

	if (isset($_POST['notes_input'])) {
		$query = "UPDATE notes SET notes_title = '$notes_input' WHERE notes_user = '$notes_user' AND notes_title = '$notes_title_old'";
		$result = mysqli_query($connection, $query);
	}

	if ($notes_delete!=""){
		$query = "DELETE FROM notes WHERE notes_user = '$notes_user' AND notes_title = '$notes_delete' LIMIT 1";
		$result = mysqli_query($connection, $query);
	}

	if (isset($_POST['notes_text'])) {
		$query = "UPDATE notes SET notes_text = '$notes_text' WHERE notes_user = '$notes_user' AND notes_title = '$notes_text_title'";
		$result = mysqli_query($connection, $query);
	}

?>