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
                <h1>Заметки</h1>
            </div>
			<ul id="todo-list">
                <li class="todo-item">
                    <input class="checkbox" type="checkbox">
                    <label class="title">Первая задача</label>
                    <input class="textfield" type="text" autocomplete="off">
                    <button class="edit"><i class="fas fa-edit"></i></button>
                    <button class="delete"><i class="fas fa-trash-alt"></i></button>
                </li>
            </ul>

            <form id="todo-form">
                <input id="add-input" type="text" autocomplete="off">
                <button id="add-button" type="submit">Добавить</button>
            </form>
		</div>
		<div class="notes-widget">notes-widget</div>
		<div class="timetable-widget">timetable-widget</div>
		<div class="timer-widget">timer-widget</div>
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
</body>
</html>