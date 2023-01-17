<?php
	// TRACKER WIDGET DATA PROCESSING
	require('init.php');

    /** @var mysqli|bool $connection */

	$tracker_user = $_SESSION['username'];
	$tracker_checkbox = $_POST['tracker_checkbox'];
	$tracker_check_status = $_POST['tracker_check_status'];
	$tracker_title = $_POST['tracker_title'];
	$tracker_id = $_POST['tracker_id'];

	if ($tracker_checkbox!=""){
		$query = "UPDATE tracker SET ".$tracker_checkbox." = '$tracker_check_status' WHERE tracker_user = '$tracker_user' AND tracker_title = '$tracker_title' LIMIT 1";
		$result = mysqli_query($connection, $query);
		if ($result){
			echo "True";
		} else {
			echo "False";
		}
	}

	if ($tracker_id!=""){
		$query = "UPDATE tracker SET tracker_title = '$tracker_title' WHERE tracker_user = '$tracker_user' AND tracker_id = '$tracker_id' LIMIT 1";
		$result = mysqli_query($connection, $query);
		if ($result){
			echo "True";
		} else {
			echo "False";
		}
	}

?>