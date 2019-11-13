var date = new Date();
var current_day;

function TimetableInit() {
	current_day = date.getDay();
	Timetable()
}

function Timetable(){
	if (current_day == 1) {
		dayname = "Понедельник";
	} else if (current_day == 2) {
		dayname = "Вторник";
	} else if (current_day == 3) {
		dayname = "Среда";
	} else if (current_day == 4) {
		dayname = "Четверг";
	} else if (current_day == 5) {
		dayname = "Пятница";
	} else if (current_day == 6) {
		dayname = "Суббота";
	} else if (current_day == 7) {
		dayname = "Воскресенье";
	}
	document.getElementById('timetable-day-name').innerHTML = dayname;
}

function PrevDay() {
	if (current_day == 1) {
		current_day = 7;
	} else {
		current_day -= 1;
	}
	Timetable();
}

function NextDay() {
	if (current_day == 7) {
		current_day = 1;
	} else {
		current_day += 1;
	}
	Timetable();
}

function EditDay() {
	const widget = document.querySelector('.timetable-widget__body');
	const isEditing = widget.classList.contains('timetable-editing');

    if (isEditing) {
    	игеещт = document.querySelector('.timetable-widget__edit__btn');
    	button.innerText = "Редактировать";

        var first_lesson = document.getElementById('first-lesson-input').value;
		document.getElementById('first-lesson').innerHTML = '<p>' + first_lesson + '</p>';

        var second_lesson = document.getElementById('second-lesson-input').value;
		document.getElementById('second-lesson').innerHTML = '<p>' + second_lesson + '</p>';

        var third_lesson = document.getElementById('third-lesson-input').value;
		document.getElementById('third-lesson').innerHTML = '<p>' + third_lesson + '</p>';

        var fourth_lesson = document.getElementById('fourth-lesson-input').value;
		document.getElementById('fourth-lesson').innerHTML = '<p>' + fourth_lesson + '</p>';

        var fifth_lesson = document.getElementById('fifth-lesson-input').value;
		document.getElementById('fifth-lesson').innerHTML = '<p>' + fifth_lesson + '</p>';

        var sixth_lesson = document.getElementById('sixth-lesson-input').value;
		document.getElementById('sixth-lesson').innerHTML = '<p>' + sixth_lesson + '</p>';

        var seventh_lesson = document.getElementById('seventh-lesson-input').value;
		document.getElementById('seventh-lesson').innerHTML = '<p>' + seventh_lesson + '</p>';
    } else {
    	button = document.querySelector('.timetable-widget__edit__btn');
    	button.innerText = "Сохранить";

        var first_lesson = document.getElementById('first-lesson').textContent;
		document.getElementById('first-lesson').innerHTML = '<input id="first-lesson-input" type="text" autocomplete="off" value="' + first_lesson + '">';

		var second_lesson = document.getElementById('second-lesson').textContent;
		document.getElementById('second-lesson').innerHTML = '<input id="second-lesson-input" type="text" autocomplete="off" value="' + second_lesson + '">';

		var third_lesson = document.getElementById('third-lesson').textContent;
		document.getElementById('third-lesson').innerHTML = '<input id="third-lesson-input" type="text" autocomplete="off" value="' + third_lesson + '">';

		var fourth_lesson = document.getElementById('fourth-lesson').textContent;
		document.getElementById('fourth-lesson').innerHTML = '<input id="fourth-lesson-input" type="text" autocomplete="off" value="' + fourth_lesson + '">';

		var fifth_lesson = document.getElementById('fifth-lesson').textContent;
		document.getElementById('fifth-lesson').innerHTML = '<input id="fifth-lesson-input" type="text" autocomplete="off" value="' + fifth_lesson + '">';

		var sixth_lesson = document.getElementById('sixth-lesson').textContent;
		document.getElementById('sixth-lesson').innerHTML = '<input id="sixth-lesson-input" type="text" autocomplete="off" value="' + sixth_lesson + '">';

		var seventh_lesson = document.getElementById('seventh-lesson').textContent;
		document.getElementById('seventh-lesson').innerHTML = '<input id="seventh-lesson-input" type="text" autocomplete="off" value="' + seventh_lesson + '">';
    }

	widget.classList.toggle('timetable-editing');
	
}

TimetableInit();