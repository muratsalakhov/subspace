<?php
require('init.php');

/** @var mysqli|bool $connection */

require('parts/check_user.php');
$username = $_SESSION['username'];

$todo_query = "SELECT * FROM todo_list WHERE todo_user = '$username'";
$todo_items = mysqli_query($connection, $todo_query) or die(mysqli_error($connection));

$timetable_result = mysqli_query($connection, "SELECT * FROM timetable WHERE timetable_user = '$username' AND timetable_day = 1 LIMIT 1") or die(mysqli_error($connection));
$timetable_monday = mysqli_fetch_assoc($timetable_result);
$timetable_result = mysqli_query($connection, "SELECT * FROM timetable WHERE timetable_user = '$username' AND timetable_day = 2 LIMIT 1") or die(mysqli_error($connection));
$timetable_tuesday = mysqli_fetch_assoc($timetable_result);
$timetable_result = mysqli_query($connection, "SELECT * FROM timetable WHERE timetable_user = '$username' AND timetable_day = 3 LIMIT 1") or die(mysqli_error($connection));
$timetable_wednesday = mysqli_fetch_assoc($timetable_result);
$timetable_result = mysqli_query($connection, "SELECT * FROM timetable WHERE timetable_user = '$username' AND timetable_day = 4 LIMIT 1") or die(mysqli_error($connection));
$timetable_thursday = mysqli_fetch_assoc($timetable_result);
$timetable_result = mysqli_query($connection, "SELECT * FROM timetable WHERE timetable_user = '$username' AND timetable_day = 5 LIMIT 1") or die(mysqli_error($connection));
$timetable_friday = mysqli_fetch_assoc($timetable_result);
$timetable_result = mysqli_query($connection, "SELECT * FROM timetable WHERE timetable_user = '$username' AND timetable_day = 6 LIMIT 1") or die(mysqli_error($connection));
$timetable_saturday = mysqli_fetch_assoc($timetable_result);
$timetable_result = mysqli_query($connection, "SELECT * FROM timetable WHERE timetable_user = '$username' AND timetable_day = 7 LIMIT 1") or die(mysqli_error($connection));
$timetable_sunday = mysqli_fetch_assoc($timetable_result);
	
$tracker_query = "SELECT * FROM tracker WHERE tracker_user = '$username'";
$tracker_result = mysqli_query($connection, $tracker_query) or die(mysqli_error($connection));

$notes_query = "SELECT * FROM notes WHERE notes_user = '$username'";
$notes_result = mysqli_query($connection, $notes_query) or die(mysqli_error($connection));
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SubSpace</title>
	<link rel="stylesheet" href="../css/main.css" >
	<link rel="stylesheet" href="../css/media.css" >
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Pacifico&display=swap&subset=cyrillic" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a7c8538669.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<div class="header-container">		
			<div class="header-logo">
				<a href="#">SubSpace</a>
			</div>
			<div class="header-buttons">
				<div class="header-username"><?php echo $username ?></div>
				<a href="../logout.php">Выйти</a>
			</div>
		</div>
	</header>
	<section>

		<!-- ВИДЖЕТ КАЛЕНДАРЬ-->

		<div id="calendar-widget">
			<div class="calendar-header">
				<h1>Календарь</h1>
			</div>
			<table id="calendar">
				<thead>
					<tr><td><i class="fas fa-arrow-left"></i><td colspan="5"><td><i class="fas fa-arrow-right"></i>
			 		<tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
				<tbody>
			</table>
		</div>

		<!-- ВИДЖЕТ ТРЕКЕР-->

		<div id="tracker-widget">
			<div class="tracker-widget-header">
				<h1>Трекер привычек</h1>
			</div>
			<div class="tracker-widget-body">
				<!-- .tracker-widget-item*8>.tracker-widget-item-name+input[type="checkbox"]*5 -->
				<form class="tracker-widget-item">
					<?php $tracker_item = mysqli_fetch_assoc($tracker_result); ?>
					<input class="tracker-item-name" type="text" autocomplete="off" value="<?php echo $tracker_item['tracker_title']; ?>">
					<div id="first-track" class="hide"><?php echo $tracker_item['tracker_id']; ?></div>
					<input class="tracker-checkbox tracker_1" type="checkbox" <?php if ($tracker_item['tracker_1'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_2" type="checkbox" <?php if ($tracker_item['tracker_2'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_3" type="checkbox" <?php if ($tracker_item['tracker_3'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_4" type="checkbox" <?php if ($tracker_item['tracker_4'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_5" type="checkbox" <?php if ($tracker_item['tracker_5'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_6" type="checkbox" <?php if ($tracker_item['tracker_6'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_7" type="checkbox" <?php if ($tracker_item['tracker_7'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_8" type="checkbox" <?php if ($tracker_item['tracker_8'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_9" type="checkbox" <?php if ($tracker_item['tracker_9'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_10" type="checkbox" <?php if ($tracker_item['tracker_10'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_11" type="checkbox" <?php if ($tracker_item['tracker_11'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_12" type="checkbox" <?php if ($tracker_item['tracker_12'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_13" type="checkbox" <?php if ($tracker_item['tracker_13'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_14" type="checkbox" <?php if ($tracker_item['tracker_14'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_15" type="checkbox" <?php if ($tracker_item['tracker_15'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_16" type="checkbox" <?php if ($tracker_item['tracker_16'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_17" type="checkbox" <?php if ($tracker_item['tracker_17'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_18" type="checkbox" <?php if ($tracker_item['tracker_18'] == 1) {echo "checked";} ?>>
				</form>
				<div class="tracker-widget-item">
					<?php $tracker_item = mysqli_fetch_assoc($tracker_result); ?>
					<input class="tracker-item-name" type="text" autocomplete="off" value="<?php echo $tracker_item['tracker_title']; ?>">
					<div id="second-track" class="hide"><?php echo $tracker_item['tracker_id']; ?></div>
					<input class="tracker-checkbox tracker_1" type="checkbox" <?php if ($tracker_item['tracker_1'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_2" type="checkbox" <?php if ($tracker_item['tracker_2'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_3" type="checkbox" <?php if ($tracker_item['tracker_3'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_4" type="checkbox" <?php if ($tracker_item['tracker_4'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_5" type="checkbox" <?php if ($tracker_item['tracker_5'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_6" type="checkbox" <?php if ($tracker_item['tracker_6'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_7" type="checkbox" <?php if ($tracker_item['tracker_7'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_8" type="checkbox" <?php if ($tracker_item['tracker_8'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_9" type="checkbox" <?php if ($tracker_item['tracker_9'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_10" type="checkbox" <?php if ($tracker_item['tracker_10'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_11" type="checkbox" <?php if ($tracker_item['tracker_11'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_12" type="checkbox" <?php if ($tracker_item['tracker_12'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_13" type="checkbox" <?php if ($tracker_item['tracker_13'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_14" type="checkbox" <?php if ($tracker_item['tracker_14'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_15" type="checkbox" <?php if ($tracker_item['tracker_15'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_16" type="checkbox" <?php if ($tracker_item['tracker_16'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_17" type="checkbox" <?php if ($tracker_item['tracker_17'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_18" type="checkbox" <?php if ($tracker_item['tracker_18'] == 1) {echo "checked";} ?>>
				</div>
				<div class="tracker-widget-item">
					<?php $tracker_item = mysqli_fetch_assoc($tracker_result); ?>
					<input class="tracker-item-name" type="text" autocomplete="off" value="<?php echo $tracker_item['tracker_title']; ?>">
					<div id="third-track" class="hide"><?php echo $tracker_item['tracker_id']; ?></div>
					<input class="tracker-checkbox tracker_1" type="checkbox" <?php if ($tracker_item['tracker_1'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_2" type="checkbox" <?php if ($tracker_item['tracker_2'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_3" type="checkbox" <?php if ($tracker_item['tracker_3'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_4" type="checkbox" <?php if ($tracker_item['tracker_4'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_5" type="checkbox" <?php if ($tracker_item['tracker_5'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_6" type="checkbox" <?php if ($tracker_item['tracker_6'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_7" type="checkbox" <?php if ($tracker_item['tracker_7'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_8" type="checkbox" <?php if ($tracker_item['tracker_8'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_9" type="checkbox" <?php if ($tracker_item['tracker_9'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_10" type="checkbox" <?php if ($tracker_item['tracker_10'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_11" type="checkbox" <?php if ($tracker_item['tracker_11'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_12" type="checkbox" <?php if ($tracker_item['tracker_12'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_13" type="checkbox" <?php if ($tracker_item['tracker_13'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_14" type="checkbox" <?php if ($tracker_item['tracker_14'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_15" type="checkbox" <?php if ($tracker_item['tracker_15'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_16" type="checkbox" <?php if ($tracker_item['tracker_16'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_17" type="checkbox" <?php if ($tracker_item['tracker_17'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_18" type="checkbox" <?php if ($tracker_item['tracker_18'] == 1) {echo "checked";} ?>>
				</div>
				<div class="tracker-widget-item">
					<?php $tracker_item = mysqli_fetch_assoc($tracker_result); ?>
					<input class="tracker-item-name" type="text" autocomplete="off" value="<?php echo $tracker_item['tracker_title']; ?>">
					<div id="fourth-track" class="hide"><?php echo $tracker_item['tracker_id']; ?></div>
					<input class="tracker-checkbox tracker_1" type="checkbox" <?php if ($tracker_item['tracker_1'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_2" type="checkbox" <?php if ($tracker_item['tracker_2'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_3" type="checkbox" <?php if ($tracker_item['tracker_3'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_4" type="checkbox" <?php if ($tracker_item['tracker_4'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_5" type="checkbox" <?php if ($tracker_item['tracker_5'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_6" type="checkbox" <?php if ($tracker_item['tracker_6'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_7" type="checkbox" <?php if ($tracker_item['tracker_7'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_8" type="checkbox" <?php if ($tracker_item['tracker_8'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_9" type="checkbox" <?php if ($tracker_item['tracker_9'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_10" type="checkbox" <?php if ($tracker_item['tracker_10'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_11" type="checkbox" <?php if ($tracker_item['tracker_11'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_12" type="checkbox" <?php if ($tracker_item['tracker_12'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_13" type="checkbox" <?php if ($tracker_item['tracker_13'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_14" type="checkbox" <?php if ($tracker_item['tracker_14'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_15" type="checkbox" <?php if ($tracker_item['tracker_15'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_16" type="checkbox" <?php if ($tracker_item['tracker_16'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_17" type="checkbox" <?php if ($tracker_item['tracker_17'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_18" type="checkbox" <?php if ($tracker_item['tracker_18'] == 1) {echo "checked";} ?>>
				</div>
				<div class="tracker-widget-item">
					<?php $tracker_item = mysqli_fetch_assoc($tracker_result); ?>
					<input class="tracker-item-name" type="text" autocomplete="off" value="<?php echo $tracker_item['tracker_title']; ?>">
					<div id="fifth-track" class="hide"><?php echo $tracker_item['tracker_id']; ?></div>
					<input class="tracker-checkbox tracker_1" type="checkbox" <?php if ($tracker_item['tracker_1'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_2" type="checkbox" <?php if ($tracker_item['tracker_2'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_3" type="checkbox" <?php if ($tracker_item['tracker_3'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_4" type="checkbox" <?php if ($tracker_item['tracker_4'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_5" type="checkbox" <?php if ($tracker_item['tracker_5'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_6" type="checkbox" <?php if ($tracker_item['tracker_6'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_7" type="checkbox" <?php if ($tracker_item['tracker_7'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_8" type="checkbox" <?php if ($tracker_item['tracker_8'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_9" type="checkbox" <?php if ($tracker_item['tracker_9'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_10" type="checkbox" <?php if ($tracker_item['tracker_10'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_11" type="checkbox" <?php if ($tracker_item['tracker_11'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_12" type="checkbox" <?php if ($tracker_item['tracker_12'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_13" type="checkbox" <?php if ($tracker_item['tracker_13'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_14" type="checkbox" <?php if ($tracker_item['tracker_14'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_15" type="checkbox" <?php if ($tracker_item['tracker_15'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_16" type="checkbox" <?php if ($tracker_item['tracker_16'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_17" type="checkbox" <?php if ($tracker_item['tracker_17'] == 1) {echo "checked";} ?>>
					<input class="tracker-checkbox tracker_18" type="checkbox" <?php if ($tracker_item['tracker_18'] == 1) {echo "checked";} ?>>
				</div>
			</div>
		</div>

		<!-- ВИДЖЕТ ЧАСЫ-->

		<div id="clock-widget">
			<p class="clock-widget-clock" id="clock-time">19:45:00</p>
			<p class="clock-widget-day" id="clock-day">суббота</p>
			<p class="clock-widget-date" id="clock-date">13 февраля</p>
		</div>

		<!-- ВИДЖЕТ СПИСОК ДЕЛ-->

		<div id="todo-list-widget">
			<div class="todo-list-header">
                <h1>Список задач</h1>
            </div>
            <div class="todo-list-body">
            	<div id="todo-list">
	                <?php 
						foreach ($todo_items as $todo_item) { ?>
							<?php 
								if ($todo_item['todo_checked'] == 1) {
									?><form class="todo-item completed">
									<input class="checkbox todo-checkbox" type="checkbox" checked><?php
								} else {
									?><form class="todo-item">
									<input class="checkbox todo-checkbox" type="checkbox"><?php
								}
							?>
		                    <label class="title todo-title"><?php echo $todo_item['todo_name']; ?></label>
		                    <input class="textfield todo-edit-textfield" type="text" autocomplete="off" maxlength="15">
		                    <button class="edit button" type="button"><i class="fas fa-edit"></i></button>
		                    <button class="delete button" type="button"><i class="fas fa-trash-alt"></i></button>
		                </form>
					<?php	
						}
					?>
	            </div>

	            <form id="todo-form">
	                <input id="todo-add-input" type="text" autocomplete="off" maxlength="15">
	                <button id="todo-add-button" class="button" type="button">Добавить</button>
	            </form>
            </div>
		</div>

		<!-- ВИДЖЕТ ЗАМЕТКИ-->

		<div id="notes-widget">
			<div class="notes-widget-header">
				<h1>Заметки</h1>
			</div>
			<div class="notes-widget-body">
				<div class="notes-widget-left">
					<div id="notes-list">
						<?php 
						foreach ($notes_result as $note_item) { ?>
							<form class="notes-item">					
								<label class="title notes-title"><?php echo $note_item['notes_title']; ?></label>
					            <input class="textfield" type="text" autocomplete="off" maxlength="14">
					            <button class="edit button" type="button"><i class="fas fa-edit"></i></button>
					            <button class="delete button" type="button"><i class="fas fa-trash-alt"></i></button>
					            <pre class="notes-text"><?php echo $note_item['notes_text']; ?></pre>
							</form>
						<?php } ?>
					</div>
					<form id="notes-form">
		                <input id="notes-add-input" type="text" autocomplete="off" maxlength="14">
		                <button id="notes-add-button" class="button" type="button"><i class="fas fa-plus"></i></button>
		            </form>
				</div>
				<div class="notes-widget-right">
					<textarea id="notes-textarea" cols="30" rows="10" form="notes-form"></textarea>
				</div>
			</div>
		</div>

		<!-- ВИДЖЕТ РАСПИСАНИЕ-->

		<div id="timetable-widget">
			<div class="timetable-header">
				<h1>Расписание</h1>
			</div>
			<div class="timetable-body">
				<div class="timetable-day">
					<button class="timetable-day-prev-btn"><i class="fas fa-arrow-left"></i></button>
					<div class="timetable-day-name">
						<p id="timetable-day-name">Понедельник</p>
					</div>
					<button class="timetable-day-next-btn"><i class="fas fa-arrow-right"></i></button>
				</div>
				<form id="timetable">		
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">1</p>
						<div class="timetable-lesson-name" id="first-lesson"><p>Понедельник</p></div>
						<p id="monday-1" class="lesson-hide"><?php echo $timetable_monday['timetable_first']; ?></p>
						<p id="tuesday-1" class="lesson-hide"><?php echo $timetable_tuesday['timetable_first']; ?></p>
						<p id="wednesday-1" class="lesson-hide"><?php echo $timetable_wednesday['timetable_first']; ?></p>
						<p id="thursday-1" class="lesson-hide"><?php echo $timetable_thursday['timetable_first']; ?></p>
						<p id="friday-1" class="lesson-hide"><?php echo $timetable_friday['timetable_first']; ?></p>
						<p id="saturday-1" class="lesson-hide"><?php echo $timetable_saturday['timetable_first']; ?></p>
						<p id="sunday-1" class="lesson-hide"><?php echo $timetable_sunday['timetable_first']; ?></p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">2</p>
						<div class="timetable-lesson-name" id="second-lesson"><p>Вторник</p></div>
						<p id="monday-2" class="lesson-hide"><?php echo $timetable_monday['timetable_second']; ?></p>
						<p id="tuesday-2" class="lesson-hide"><?php echo $timetable_tuesday['timetable_second']; ?></p>
						<p id="wednesday-2" class="lesson-hide"><?php echo $timetable_wednesday['timetable_second']; ?></p>
						<p id="thursday-2" class="lesson-hide"><?php echo $timetable_thursday['timetable_second']; ?></p>
						<p id="friday-2" class="lesson-hide"><?php echo $timetable_friday['timetable_second']; ?></p>
						<p id="saturday-2" class="lesson-hide"><?php echo $timetable_saturday['timetable_second']; ?></p>
						<p id="sunday-2" class="lesson-hide"><?php echo $timetable_sunday['timetable_second']; ?></p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">3</p>
						<div class="timetable-lesson-name" id="third-lesson"><p>Среда</p></div>
						<p id="monday-3" class="lesson-hide"><?php echo $timetable_monday['timetable_third']; ?></p>
						<p id="tuesday-3" class="lesson-hide"><?php echo $timetable_tuesday['timetable_third']; ?></p>
						<p id="wednesday-3" class="lesson-hide"><?php echo $timetable_wednesday['timetable_third']; ?></p>
						<p id="thursday-3" class="lesson-hide"><?php echo $timetable_thursday['timetable_third']; ?></p>
						<p id="friday-3" class="lesson-hide"><?php echo $timetable_friday['timetable_third']; ?></p>
						<p id="saturday-3" class="lesson-hide"><?php echo $timetable_saturday['timetable_third']; ?></p>
						<p id="sunday-3" class="lesson-hide"><?php echo $timetable_sunday['timetable_third']; ?></p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">4</p>
						<div class="timetable-lesson-name" id="fourth-lesson"><p>Четверг</p></div>
						<p id="monday-4" class="lesson-hide"><?php echo $timetable_monday['timetable_fourth']; ?></p>
						<p id="tuesday-4" class="lesson-hide"><?php echo $timetable_tuesday['timetable_fourth']; ?></p>
						<p id="wednesday-4" class="lesson-hide"><?php echo $timetable_wednesday['timetable_fourth']; ?></p>
						<p id="thursday-4" class="lesson-hide"><?php echo $timetable_thursday['timetable_fourth']; ?></p>
						<p id="friday-4" class="lesson-hide"><?php echo $timetable_friday['timetable_fourth']; ?></p>
						<p id="saturday-4" class="lesson-hide"><?php echo $timetable_saturday['timetable_fourth']; ?></p>
						<p id="sunday-4" class="lesson-hide"><?php echo $timetable_sunday['timetable_fourth']; ?></p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">5</p>
						<div class="timetable-lesson-name" id="fifth-lesson"><p>Пятница</p></div>
						<p id="monday-5" class="lesson-hide"><?php echo $timetable_monday['timetable_fifth']; ?></p>
						<p id="tuesday-5" class="lesson-hide"><?php echo $timetable_tuesday['timetable_fifth']; ?></p>
						<p id="wednesday-5" class="lesson-hide"><?php echo $timetable_wednesday['timetable_fifth']; ?></p>
						<p id="thursday-5" class="lesson-hide"><?php echo $timetable_thursday['timetable_fifth']; ?></p>
						<p id="friday-5" class="lesson-hide"><?php echo $timetable_friday['timetable_fifth']; ?></p>
						<p id="saturday-5" class="lesson-hide"><?php echo $timetable_saturday['timetable_fifth']; ?></p>
						<p id="sunday-5" class="lesson-hide"><?php echo $timetable_sunday['timetable_fifth']; ?></p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">6</p>
						<div class="timetable-lesson-name" id="sixth-lesson"><p>Суббота</p></div>
						<p id="monday-6" class="lesson-hide"><?php echo $timetable_monday['timetable_sixth']; ?></p>
						<p id="tuesday-6" class="lesson-hide"><?php echo $timetable_tuesday['timetable_sixth']; ?></p>
						<p id="wednesday-6" class="lesson-hide"><?php echo $timetable_wednesday['timetable_sixth']; ?></p>
						<p id="thursday-6" class="lesson-hide"><?php echo $timetable_thursday['timetable_sixth']; ?></p>
						<p id="friday-6" class="lesson-hide"><?php echo $timetable_friday['timetable_sixth']; ?></p>
						<p id="saturday-6" class="lesson-hide"><?php echo $timetable_saturday['timetable_sixth']; ?></p>
						<p id="sunday-6" class="lesson-hide"><?php echo $timetable_sunday['timetable_sixth']; ?></p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">7</p>
						<div class="timetable-lesson-name" id="seventh-lesson"><p>Воскресенье</p></div>
						<p id="monday-7" class="lesson-hide"><?php echo $timetable_monday['timetable_seventh']; ?></p>
						<p id="tuesday-7" class="lesson-hide"><?php echo $timetable_tuesday['timetable_seventh']; ?></p>
						<p id="wednesday-7" class="lesson-hide"><?php echo $timetable_wednesday['timetable_seventh']; ?></p>
						<p id="thursday-7" class="lesson-hide"><?php echo $timetable_thursday['timetable_seventh']; ?></p>
						<p id="friday-7" class="lesson-hide"><?php echo $timetable_friday['timetable_seventh']; ?></p>
						<p id="saturday-7" class="lesson-hide"><?php echo $timetable_saturday['timetable_seventh']; ?></p>
						<p id="sunday-7" class="lesson-hide"><?php echo $timetable_sunday['timetable_seventh']; ?></p>
					</div>
					<div class="timetable-btn">
						<button class="timetable-edit-btn button" type="button">Редактировать</button>
					</div>
				</form>
			</div>
		</div>

		<!-- ВИДЖЕТ ТАЙМЕР-->	

		<div id="timer-widget">
			<div class="timer-header">
				<h1>Таймер</h1>
			</div>
			<div class="timer">
	        	<div id="timer-clock">
	        		<p>00:00:00</p>
	        	</div>
				<input id="start" class="button" type="button" onclick="New_start()" value="Старт">
	        	<input id="pause"class="pause button" type="button" onclick="Pause()" value="Пауза">
			</div>
		</div>
	</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../js/clock-widget.js"></script>
<script src="../js/calendar-widget.js"></script>
<script src="../js/to-do-list-widget.js"></script>
<script src="../js/timer-widget.js"></script>
<script src="../js/timetable-widget.js"></script>
<script src="../js/notes-widget.js"></script>
<script src="../js/tracker-widget.js"></script>
</body>
</html>