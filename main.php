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
		<div class="header-logo">
			<img src="" alt="">
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
			</table>
		</div>
		<div class="tracker-widget">tracker-widget</div>
		<div id="clock-widget"></div>
		<div id="todo-list-widget">
			<div class="todo-list-header">
                <h1>Список задач</h1>
            </div>
			<ul id="todo-list">
                <li class="todo-item">
                    <input class="checkbox" type="checkbox">
                    <label class="title">Первая задача</label>
                    <input class="textfield" type="text" autocomplete="off">
                    <button class="edit button"><i class="fas fa-edit"></i></button>
                    <button class="delete button"><i class="fas fa-trash-alt"></i></button>
                </li>
                <li class="todo-item">
                    <input class="checkbox" type="checkbox">
                    <label class="title">Вторая задача</label>
                    <input class="textfield" type="text" autocomplete="off">
                    <button class="edit button"><i class="fas fa-edit"></i></button>
                    <button class="delete button"><i class="fas fa-trash-alt"></i></button>
                </li>
                <li class="todo-item">
                    <input class="checkbox" type="checkbox">
                    <label class="title">Третья задача</label>
                    <input class="textfield" type="text" autocomplete="off">
                    <button class="edit button"><i class="fas fa-edit"></i></button>
                    <button class="delete button"><i class="fas fa-trash-alt"></i></button>
                </li>
            </ul>

            <form id="todo-form">
                <input id="add-input" type="text" autocomplete="off">
                <button id="add-button" class="button" type="submit">Добавить</button>
            </form>
		</div>
		<div class="notes-widget">notes-widget</div>
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
				<button class="timetable-widget__edit__btn button" onclick="EditDay()">Редактировать</button>
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
	<footer>
		<div class="footer-username">
			<p></p>
		</div>
		<div class="footer-exit-button">
			<a href="parts/logout.php">Выйти</a>
		</div>
	</footer>
<script src="js/clock-widget.js"></script>
<script src="js/calendar-widget.js"></script>
<script src="js/to-do-list-widget.js"></script>
<script src="js/timer-widget.js"></script>
<script src="js/timetable-widget.js"></script>
</body>
</html>