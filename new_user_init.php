<?php 
require('init.php');

/** @var mysqli|bool $connection */

$result = mysqli_query($connection, "INSERT INTO todo_list (todo_user, todo_name, todo_checked) VALUES ('$username', 'Первая задача', '0')");
$result = mysqli_query($connection, "INSERT INTO todo_list (todo_user, todo_name, todo_checked) VALUES ('$username', 'Вторая задача', '0')");
$result = mysqli_query($connection, "INSERT INTO todo_list (todo_user, todo_name, todo_checked) VALUES ('$username', 'Третья задача', '0')");

$result = mysqli_query($connection, "INSERT INTO tracker (tracker_user, tracker_title) VALUES ('$username', 'Привычка 1')");
$result = mysqli_query($connection, "INSERT INTO tracker (tracker_user, tracker_title) VALUES ('$username', 'Привычка 2')");
$result = mysqli_query($connection, "INSERT INTO tracker (tracker_user, tracker_title) VALUES ('$username', 'Привычка 3')");
$result = mysqli_query($connection, "INSERT INTO tracker (tracker_user, tracker_title) VALUES ('$username', 'Привычка 4')");
$result = mysqli_query($connection, "INSERT INTO tracker (tracker_user, tracker_title) VALUES ('$username', 'Привычка 5')");

$result = mysqli_query($connection, "INSERT INTO notes (notes_user, notes_title, notes_text) VALUES ('$username', 'Первая заметка', 'Это моя самая первая заметка')");

$result = mysqli_query($connection, "INSERT INTO timetable (timetable_user, timetable_day) VALUES ('$username', '1')");
$result = mysqli_query($connection, "INSERT INTO timetable (timetable_user, timetable_day) VALUES ('$username', '2')");
$result = mysqli_query($connection, "INSERT INTO timetable (timetable_user, timetable_day) VALUES ('$username', '3')");
$result = mysqli_query($connection, "INSERT INTO timetable (timetable_user, timetable_day) VALUES ('$username', '4')");
$result = mysqli_query($connection, "INSERT INTO timetable (timetable_user, timetable_day) VALUES ('$username', '5')");
$result = mysqli_query($connection, "INSERT INTO timetable (timetable_user, timetable_day) VALUES ('$username', '6')");
$result = mysqli_query($connection, "INSERT INTO timetable (timetable_user, timetable_day) VALUES ('$username', '0')");

?>