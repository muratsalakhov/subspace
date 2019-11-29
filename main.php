<?php
require('database.php');
require('parts/check_user.php');
$username = $_SESSION['username'];

$todo_query = "SELECT * FROM todo_list WHERE todo_user = '$username'";
$todo_items = mysqli_query($connection, $todo_query) or die(mysqli_error($connection));
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
				<div class="header-username"><?php echo $username ?></div>
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
			<div class="tracker-widget-header">
				<h1>Трекер привычек</h1>
			</div>
			<div class="tracker-widget-body">
				<!-- .tracker-widget-item*8>.tracker-widget-item-name+input[type="checkbox"]*5 -->
				<div class="tracker-widget-item">
					<div class="tracker-widget-item-name">Привычка 1</div>
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
				<div class="tracker-widget-item">
					<div class="tracker-widget-item-name">Привычка 2</div>
					<input type="checkbox" class="tracker-widget-item-checkbox">
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
				<div class="tracker-widget-item">
					<div class="tracker-widget-item-name">Привычка 3</div>
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
				<div class="tracker-widget-item">
					<div class="tracker-widget-item-name">Привычка 4</div>
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
				<div class="tracker-widget-item">
					<div class="tracker-widget-item-name">Привычка 5</div>
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
	                	if (mysqli_num_rows($todo_items) == 0){
	                		?>
	                			<form class="todo-item">
						            <input class="checkbox todo-checkbox" type="checkbox">
						            <label class="title todo-title">Первая задача</label>
						            <input class="textfield" type="text" autocomplete="off">
						            <button class="edit button" type="button"><i class="fas fa-edit"></i></button>
						            <button class="delete button" type="button"><i class="fas fa-trash-alt"></i></button>
						        </form>
	                		<?php
	                	}
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
		                    <input class="textfield" type="text" autocomplete="off">
		                    <button class="edit button" type="button"><i class="fas fa-edit"></i></button>
		                    <button class="delete button" type="button"><i class="fas fa-trash-alt"></i></button>
		                </form>
					<?php	
						}
					?>
	            </div>

	            <form id="todo-form">
	                <input id="todo-add-input" type="text" autocomplete="off">
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
						<form class="notes-item choosed">					
							<label class="title notes-title">Первая задача</label>
				            <input class="textfield" type="text" autocomplete="off">
				            <button class="edit button" type="button"><i class="fas fa-edit"></i></button>
				            <button class="delete button" type="button"><i class="fas fa-trash-alt"></i></button>
				            <p class="notes-text">Первая задача</p>
						</form>
						<form class="notes-item">					
							<label class="title notes-title">Вторая задача</label>
				            <input class="textfield" type="text" autocomplete="off">
				            <button class="edit button" type="button"><i class="fas fa-edit"></i></button>
				            <button class="delete button" type="button"><i class="fas fa-trash-alt"></i></button>
				            <p class="notes-text">Вторая задача</p>
						</form>
					</div>
					<form id="notes-form">
		                <input id="notes-add-input" type="text" autocomplete="off">
		                <button id="notes-add-button" class="button" type="button"><i class="fas fa-plus"></i></button>
		            </form>
				</div>
				<div class="notes-widget-right">
					<textarea name="text" id="notes-textarea" cols="30" rows="10">Первая задача</textarea>
					<button id="notes-save" class="button" type="button">Сохранить</button>
				</div>
			</div>
		</div>
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
				<form id="timetable-monday">		
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">1</p>
						<div class="timetable-lesson-name" id="first-lesson"><p>Понедельник</p></div>
						<p id="monday-1" class="lesson-hide">Понедельник</p>
						<p id="tuesday-1" class="lesson-hide">Понедельник</p>
						<p id="wednesday-1" class="lesson-hide">Понедельник</p>
						<p id="thursday-1" class="lesson-hide">Понедельник</p>
						<p id="friday-1" class="lesson-hide">Понедельник</p>
						<p id="saturday-1" class="lesson-hide">Понедельник</p>
						<p id="sunday-1" class="lesson-hide">Понедельник</p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">2</p>
						<div class="timetable-lesson-name" id="second-lesson"><p>Вторник</p></div>
						<p id="monday-2" class="lesson-hide">Вторник</p>
						<p id="tuesday-2" class="lesson-hide">Вторник</p>
						<p id="wednesday-2" class="lesson-hide">Вторник</p>
						<p id="thursday-2" class="lesson-hide">Вторник</p>
						<p id="friday-2" class="lesson-hide">Вторник</p>
						<p id="saturday-2" class="lesson-hide">Вторник</p>
						<p id="sunday-2" class="lesson-hide">Вторник</p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">3</p>
						<div class="timetable-lesson-name" id="third-lesson"><p>Среда</p></div>
						<p id="monday-3" class="lesson-hide">Среда</p>
						<p id="tuesday-3" class="lesson-hide">Среда</p>
						<p id="wednesday-3" class="lesson-hide">Среда</p>
						<p id="thursday-3" class="lesson-hide">Среда</p>
						<p id="friday-3" class="lesson-hide">Среда</p>
						<p id="saturday-3" class="lesson-hide">Среда</p>
						<p id="sunday-3" class="lesson-hide">Среда</p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">4</p>
						<div class="timetable-lesson-name" id="fourth-lesson"><p>Четверг</p></div>
						<p id="monday-4" class="lesson-hide">Четверг</p>
						<p id="tuesday-4" class="lesson-hide">Четверг</p>
						<p id="wednesday-4" class="lesson-hide">Четверг</p>
						<p id="thursday-4" class="lesson-hide">Четверг</p>
						<p id="friday-4" class="lesson-hide">Четверг</p>
						<p id="saturday-4" class="lesson-hide">Четверг</p>
						<p id="sunday-4" class="lesson-hide">Четверг</p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">5</p>
						<div class="timetable-lesson-name" id="fifth-lesson"><p>Пятница</p></div>
						<p id="monday-5" class="lesson-hide">Пятница</p>
						<p id="tuesday-5" class="lesson-hide">Пятница</p>
						<p id="wednesday-5" class="lesson-hide">Пятница</p>
						<p id="thursday-5" class="lesson-hide">Пятница</p>
						<p id="friday-5" class="lesson-hide">Пятница</p>
						<p id="saturday-5" class="lesson-hide">Пятница</p>
						<p id="sunday-5" class="lesson-hide">Пятница</p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">6</p>
						<div class="timetable-lesson-name" id="sixth-lesson"><p>Суббота</p></div>
						<p id="monday-6" class="lesson-hide">Суббота</p>
						<p id="tuesday-6" class="lesson-hide">Суббота</p>
						<p id="wednesday-6" class="lesson-hide">Суббота</p>
						<p id="thursday-6" class="lesson-hide">Суббота</p>
						<p id="friday-6" class="lesson-hide">Суббота</p>
						<p id="saturday-6" class="lesson-hide">Суббота</p>
						<p id="sunday-6" class="lesson-hide">Суббота</p>
					</div>
					<div class="timetable-lesson">
						<p class="timetable-lesson-number">7</p>
						<div class="timetable-lesson-name" id="seventh-lesson"><p>Воскресенье</p></div>
						<p id="monday-7" class="lesson-hide">Воскресенье</p>
						<p id="tuesday-7" class="lesson-hide">Воскресенье</p>
						<p id="wednesday-7" class="lesson-hide">Воскресенье</p>
						<p id="thursday-7" class="lesson-hide">Воскресенье</p>
						<p id="friday-7" class="lesson-hide">Воскресенье</p>
						<p id="saturday-7" class="lesson-hide">Воскресенье</p>
						<p id="sunday-7" class="lesson-hide">Воскресенье</p>
					</div>
					<div class="timetable-btn">
						<button class="timetable-edit-btn button" type="button">Редактировать</button>
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
<script src="js/notes-widget.js"></script>
</body>
</html>