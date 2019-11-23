<?php
require('database.php');
require('parts/check_user.php');
$username = $_SESSION['username'];

$todo_query = "SELECT * FROM todo_list WHERE todo_user = '$username'";
$todo_result = mysqli_query($connection, $todo_query) or die(mysqli_error($connection));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SubSpace</title>
	<link rel="stylesheet" href="css/main.css" >
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
				<div class="header-username">Мурат</div>
				<a href="logout.php">Выйти</a>
			</div>
		</div>
	</header>
	<section>
		<div id="calendar-widget">
			<div class="calendar-header">
				<h1>Календарь</h1>
			</div>
			<table id="calendar">
				<thead>
					<tr><td><i class="fas fa-arrow-left"></i><td colspan="5"><td><i class="fas fa-arrow-right"></i>
			 		<tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
				<tbody>
			</table>+
		</div>
		<div id="tracker-widget">
			<div class="tracker-widget__header">
				<h1>Трекер привычек</h1>
			</div>
			<div class="tracker-widget__body">
				<!-- .tracker-widget__item*8>.tracker-widget__item__name+input[type="checkbox"]*5 -->
				<div class="tracker-widget__item">
					<div class="tracker-widget__item__name">Привычка 1</div>
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
				</div>
				<div class="tracker-widget__item">
					<div class="tracker-widget__item__name">Привычка 2</div>
					<input type="checkbox" class="tracker-widget__item__checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
				</div>
				<div class="tracker-widget__item">
					<div class="tracker-widget__item__name">Привычка 3</div>
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
				</div>
				<div class="tracker-widget__item">
					<div class="tracker-widget__item__name">Привычка 4</div>
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
				</div>
				<div class="tracker-widget__item">
					<div class="tracker-widget__item__name">Привычка 5</div>
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
					<input type="checkbox">
				</div>
			</div>
		</div>
		<div id="clock-widget">
			<p class="clock-widget__clock" id="clock-time">19:45:00</p>
			<p class="clock-widget__day" id="clock-day">суббота</p>
			<p class="clock-widget__date" id="clock-date">13 февраля</p>
		</div>
		<div id="todo-list-widget">
			<div class="todo-list-header">
                <h1>Список задач</h1>
            </div>
			<div id="todo-list">
                <form class="todo-item">
                    <input class="checkbox todo-checkbox" type="checkbox">
                    <label class="title todo-title">Первая задача</label>
                    <input class="textfield" type="text" autocomplete="off">
                    <button class="edit button" type="button"><i class="fas fa-edit"></i></button>
                    <button class="delete button" type="button"><i class="fas fa-trash-alt"></i></button>
                </form>
                <?php 
					foreach ($todo_result as $todo_item) { ?>
						<?php 
							if ($todo_item['todo_checked'] == 1) {
								?><li class="todo-item completed">
								<input class="checkbox todo-checkbox" type="checkbox" checked><?php
							} else {
								?><li class="todo-item">
								<input class="checkbox todo-checkbox" type="checkbox"><?php
							}
						?>
	                    <label class="title todo-title"><?php echo $todo_item['todo_name']; ?></label>
	                    <input class="textfield" type="text" autocomplete="off">
	                    <button class="edit button" type="button"><i class="fas fa-edit"></i></button>
	                    <button class="delete button" type="button"><i class="fas fa-trash-alt"></i></button>
	                </li>
				<?php	
					}
				?>
            </div>

            <form id="todo-form">
                <input id="add-input" type="text" autocomplete="off">
                <button id="add-button" class="button" type="button">Добавить</button>
            </form>
		</div>
		<div id="notes-widget">
			<div class="notes-widget__header">
				<h1>Заметки</h1>
			</div>
			<div class="notes-widget__body">
				<div class="notes-widget__left">
					<div class="notes-widget__item">					
						<label class="title">Первая задача</label>
						<input class="textfield" type="text" autocomplete="off">
	                    <button class="edit button"><i class="fas fa-edit"></i></button>
	                    <button class="delete button"><i class="fas fa-trash-alt"></i></button>
					</div>
					<div class="notes-widget__item">					
						<label class="title">Вторая задача</label>
						<input class="textfield" type="text" autocomplete="off">
	                    <button class="edit button"><i class="fas fa-edit"></i></button>
	                    <button class="delete button"><i class="fas fa-trash-alt"></i></button>
					</div>
					<form id="notes-widget-form">
		                <button id="add-button" class="button" type="submit">Добавить</button>
		            </form>
				</div>
				<div class="notes-widget__right">
					<textarea name="text" id="notes-widget-textarea" cols="30" rows="10"></textarea>
				</div>
			</div>
		</div>
		<div id="timetable-widget">
			<div class="timetable-widget__header">
				<h1>Расписание</h1>
			</div>
			<div class="timetable-widget__body">
				<div class="timetable-widget__day">
					<button class="timetable-widget__day__prev__btn" onclick="PrevDay()"><i class="fas fa-arrow-left"></i></button>
					<div class="timetable-widget__day__name">
						<p id="timetable-day-name">Понедельник</p>
					</div>
					<button class="timetable-widget__day__next__btn" onclick="NextDay()"><i class="fas fa-arrow-right"></i></button>
				</div>
				<form action="main.php" method="POST">		
					<div class="timetable-widget__lesson">
						<p class="timetable-widget__lesson__number">1</p>
						<div class="timetable-widget__lesson__name" id="first-lesson"><p>Математика</p></div>
					</div>
					<div class="timetable-widget__lesson">
						<p class="timetable-widget__lesson__number">2</p>
						<div class="timetable-widget__lesson__name" id="second-lesson"><p>Математика</p></div>
					</div>
					<div class="timetable-widget__lesson">
						<p class="timetable-widget__lesson__number">3</p>
						<div class="timetable-widget__lesson__name" id="third-lesson"><p>Математика</p></div>
					</div>
					<div class="timetable-widget__lesson">
						<p class="timetable-widget__lesson__number">4</p>
						<div class="timetable-widget__lesson__name" id="fourth-lesson"><p>Математика</p></div>
					</div>
					<div class="timetable-widget__lesson">
						<p class="timetable-widget__lesson__number">5</p>
						<div class="timetable-widget__lesson__name" id="fifth-lesson"><p>Математика</p></div>
					</div>
					<div class="timetable-widget__lesson">
						<p class="timetable-widget__lesson__number">6</p>
						<div class="timetable-widget__lesson__name" id="sixth-lesson"><p>Математика</p></div>
					</div>
					<div class="timetable-widget__lesson">
						<p class="timetable-widget__lesson__number">7</p>
						<div class="timetable-widget__lesson__name" id="seventh-lesson"><p>Математика</p></div>
					</div>
					<div class="timetable-widget__btn">
						<button class="timetable-widget__edit__btn button" onclick="EditDay()">Редактировать</button>
					</div>
					</form>
			</div>
		</div>
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
<script src="js/clock-widget.js"></script>
<script src="js/calendar-widget.js"></script>
<script src="js/to-do-list-widget.js"></script>
<script src="js/timer-widget.js"></script>
<script src="js/timetable-widget.js"></script>
</body>
</html>