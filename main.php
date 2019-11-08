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
			<table id="calendar">
				<thead>
					<tr><td><i class="fas fa-arrow-left"></i><td colspan="5"><td><i class="fas fa-arrow-right"></i>
			 		<tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
				<tbody>
			</table>
		</div>
		<div class="tracker-widget">tracker-widget</div>
		<div id="clock-widget"></div>
		<div class="to-do-list-widget">to-do-list-widget</div>
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
</body>
</html>