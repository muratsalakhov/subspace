<?php
	// TIMETABLE WIDGET DATA PROCESSING
	require('init.php');

    /** @var mysqli|bool $connection */

	$timetable_user = $_SESSION['username'];
	$timetable_day = $_POST['timetable_day'];
	$timetable_first = $_POST['timetable_first'];
	$timetable_second = $_POST['timetable_second'];
	$timetable_third = $_POST['timetable_third'];
	$timetable_fourth = $_POST['timetable_fourth'];
	$timetable_fifth = $_POST['timetable_fifth'];
	$timetable_sixth = $_POST['timetable_sixth'];
	$timetable_seventh = $_POST['timetable_seventh'];

	//if ($timetable_day!=""){
		$query = "UPDATE timetable SET timetable_first = '$timetable_first', timetable_second = '$timetable_second', timetable_third = '$timetable_third', timetable_fourth = '$timetable_fourth', timetable_fifth = '$timetable_fifth', timetable_sixth = '$timetable_sixth', timetable_seventh = '$timetable_seventh' WHERE timetable_user = '$timetable_user' AND timetable_day = '$timetable_day'";
		$result = mysqli_query($connection, $query);
		if ($result){
			echo "True";
		} else {
			echo "False";
		}
	//}

?>