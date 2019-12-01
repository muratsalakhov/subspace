$(document).ready(function() {
	var date = new Date();
	var current_day;
	const firstLesson = document.getElementById('first-lesson');
	const secondLesson = document.getElementById('second-lesson');
	const thirdLesson = document.getElementById('third-lesson');
	const fourthLesson = document.getElementById('fourth-lesson');
	const fifthLesson = document.getElementById('fifth-lesson');
	const sixthLesson = document.getElementById('sixth-lesson');
	const seventhLesson = document.getElementById('seventh-lesson');

    function timetableBindEvents() {
    	const prevButton = document.querySelector('.timetable-day-prev-btn');
    	const nextButton = document.querySelector('.timetable-day-next-btn');
    	const timetableEditButton = document.querySelector('.timetable-edit-btn');

        prevButton.addEventListener('click', PrevDay);
        nextButton.addEventListener('click', NextDay);
        timetableEditButton.addEventListener('click', EditDay)
    }

	function TimetableInit() {
		current_day = date.getDay();
		Timetable()
	}

	function Timetable(){
		if (current_day == 1) {
			dayname = "Понедельник";
			firstLesson.innerHTML = document.getElementById('monday-1').innerText;
			secondLesson.innerHTML = document.getElementById('monday-2').innerText;
			thirdLesson.innerHTML = document.getElementById('monday-3').innerText;
			fourthLesson.innerHTML = document.getElementById('monday-4').innerText;
			fifthLesson.innerHTML = document.getElementById('monday-5').innerText;
			sixthLesson.innerHTML = document.getElementById('monday-6').innerText;
			seventhLesson.innerHTML = document.getElementById('monday-7').innerText;

		} else if (current_day == 2) {
			dayname = "Вторник";
			firstLesson.innerHTML = document.getElementById('tuesday-1').innerText;
			secondLesson.innerHTML = document.getElementById('tuesday-2').innerText;
			thirdLesson.innerHTML = document.getElementById('tuesday-3').innerText;
			fourthLesson.innerHTML = document.getElementById('tuesday-4').innerText;
			fifthLesson.innerHTML = document.getElementById('tuesday-5').innerText;
			sixthLesson.innerHTML = document.getElementById('tuesday-6').innerText;
			seventhLesson.innerHTML = document.getElementById('tuesday-7').innerText;
		} else if (current_day == 3) {
			dayname = "Среда";
			firstLesson.innerHTML = document.getElementById('wednesday-1').innerText;
			secondLesson.innerHTML = document.getElementById('wednesday-2').innerText;
			thirdLesson.innerHTML = document.getElementById('wednesday-3').innerText;
			fourthLesson.innerHTML = document.getElementById('wednesday-4').innerText;
			fifthLesson.innerHTML = document.getElementById('wednesday-5').innerText;
			sixthLesson.innerHTML = document.getElementById('wednesday-6').innerText;
			seventhLesson.innerHTML = document.getElementById('wednesday-7').innerText;
		} else if (current_day == 4) {
			dayname = "Четверг";
			firstLesson.innerHTML = document.getElementById('thursday-1').innerText;
			secondLesson.innerHTML = document.getElementById('thursday-2').innerText;
			thirdLesson.innerHTML = document.getElementById('thursday-3').innerText;
			fourthLesson.innerHTML = document.getElementById('thursday-4').innerText;
			fifthLesson.innerHTML = document.getElementById('thursday-5').innerText;
			sixthLesson.innerHTML = document.getElementById('thursday-6').innerText;
			seventhLesson.innerHTML = document.getElementById('thursday-7').innerText;
		} else if (current_day == 5) {
			dayname = "Пятница";
			firstLesson.innerHTML = document.getElementById('friday-1').innerText;
			secondLesson.innerHTML = document.getElementById('friday-2').innerText;
			thirdLesson.innerHTML = document.getElementById('friday-3').innerText;
			fourthLesson.innerHTML = document.getElementById('friday-4').innerText;
			fifthLesson.innerHTML = document.getElementById('friday-5').innerText;
			sixthLesson.innerHTML = document.getElementById('friday-6').innerText;
			seventhLesson.innerHTML = document.getElementById('friday-7').innerText;
		} else if (current_day == 6) {
			dayname = "Суббота";
			firstLesson.innerHTML = document.getElementById('saturday-1').innerText;
			secondLesson.innerHTML = document.getElementById('saturday-2').innerText;
			thirdLesson.innerHTML = document.getElementById('saturday-3').innerText;
			fourthLesson.innerHTML = document.getElementById('saturday-4').innerText;
			fifthLesson.innerHTML = document.getElementById('saturday-5').innerText;
			sixthLesson.innerHTML = document.getElementById('saturday-6').innerText;
			seventhLesson.innerHTML = document.getElementById('saturday-7').innerText;
		} else if (current_day == 0) {
			dayname = "Воскресенье";
			firstLesson.innerHTML = document.getElementById('sunday-1').innerText;
			secondLesson.innerHTML = document.getElementById('sunday-2').innerText;
			thirdLesson.innerHTML = document.getElementById('sunday-3').innerText;
			fourthLesson.innerHTML = document.getElementById('sunday-4').innerText;
			fifthLesson.innerHTML = document.getElementById('sunday-5').innerText;
			sixthLesson.innerHTML = document.getElementById('sunday-6').innerText;
			seventhLesson.innerHTML = document.getElementById('sunday-7').innerText;
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

	function SaveDay() {
		if (current_day == 1) {
			const currentFirstLesson = document.getElementById('monday-1');
			const currentSecondLesson = document.getElementById('monday-2');
			const currentThirdLesson = document.getElementById('monday-3');
			const currentFourthLesson = document.getElementById('monday-4');
			const currentFifthLesson = document.getElementById('monday-5');
			const currentSixthLesson = document.getElementById('monday-6');
			const currentSeventhLesson = document.getElementById('monday-7');

			currentFirstLesson.innerText = document.getElementById('first-lesson-input').value;
			currentSecondLesson.innerText = document.getElementById('second-lesson-input').value;
			currentThirdLesson.innerText = document.getElementById('third-lesson-input').value;
			currentFourthLesson.innerText = document.getElementById('fourth-lesson-input').value;
			currentFifthLesson.innerText = document.getElementById('fifth-lesson-input').value;
			currentSixthLesson.innerText = document.getElementById('sixth-lesson-input').value;
			currentSeventhLesson.innerText = document.getElementById('seventh-lesson-input').value;

			$(document).ready(function() {
			    $.ajax({
			        url: 'timetable-processing.php',
			        type: 'POST',
			        cache: false,
			        data: {'timetable_day' : current_day, 'timetable_first' : currentFirstLesson.innerText,
			    		'timetable_second' : currentSecondLesson.innerText, 'timetable_third' : currentThirdLesson.innerText,
			    		'timetable_fourth' : currentFourthLesson.innerText, 'timetable_fifth' : currentFifthLesson.innerText,
			    		'timetable_sixth' : currentSixthLesson.innerText, 'timetable_seventh' : currentSeventhLesson.innerText},
			        dataType: 'html',
			        success: function(data){
		                alert(data);
	            	}
			    });
			});

		} else if (current_day == 2) {
			const currentFirstLesson = document.getElementById('tuesday-1');
			const currentSecondLesson = document.getElementById('tuesday-2');
			const currentThirdLesson = document.getElementById('tuesday-3');
			const currentFourthLesson = document.getElementById('tuesday-4');
			const currentFifthLesson = document.getElementById('tuesday-5');
			const currentSixthLesson = document.getElementById('tuesday-6');
			const currentSeventhLesson = document.getElementById('tuesday-7');

			currentFirstLesson.innerText = document.getElementById('first-lesson-input').value;
			currentSecondLesson.innerText = document.getElementById('second-lesson-input').value;
			currentThirdLesson.innerText = document.getElementById('third-lesson-input').value;
			currentFourthLesson.innerText = document.getElementById('fourth-lesson-input').value;
			currentFifthLesson.innerText = document.getElementById('fifth-lesson-input').value;
			currentSixthLesson.innerText = document.getElementById('sixth-lesson-input').value;
			currentSeventhLesson.innerText = document.getElementById('seventh-lesson-input').value;

			$(document).ready(function() {
			    $.ajax({
			        url: 'timetable-processing.php',
			        type: 'POST',
			        cache: false,
			        data: {'timetable_day' : current_day, 'timetable_first' : currentFirstLesson.innerText,
			    		'timetable_second' : currentSecondLesson.innerText, 'timetable_third' : currentThirdLesson.innerText,
			    		'timetable_fourth' : currentFourthLesson.innerText, 'timetable_fifth' : currentFifthLesson.innerText,
			    		'timetable_sixth' : currentSixthLesson.innerText, 'timetable_seventh' : currentSeventhLesson.innerText},
			        dataType: 'html',
			        success: function(data){
		                alert(data);
	            	}
			    });
			});

		} else if (current_day == 3) {
			const currentFirstLesson = document.getElementById('wednesday-1');
			const currentSecondLesson = document.getElementById('wednesday-2');
			const currentThirdLesson = document.getElementById('wednesday-3');
			const currentFourthLesson = document.getElementById('wednesday-4');
			const currentFifthLesson = document.getElementById('wednesday-5');
			const currentSixthLesson = document.getElementById('wednesday-6');
			const currentSeventhLesson = document.getElementById('wednesday-7');

			currentFirstLesson.innerText = document.getElementById('first-lesson-input').value;
			currentSecondLesson.innerText = document.getElementById('second-lesson-input').value;
			currentThirdLesson.innerText = document.getElementById('third-lesson-input').value;
			currentFourthLesson.innerText = document.getElementById('fourth-lesson-input').value;
			currentFifthLesson.innerText = document.getElementById('fifth-lesson-input').value;
			currentSixthLesson.innerText = document.getElementById('sixth-lesson-input').value;
			currentSeventhLesson.innerText = document.getElementById('seventh-lesson-input').value;

			$(document).ready(function() {
			    $.ajax({
			        url: 'timetable-processing.php',
			        type: 'POST',
			        cache: false,
			        data: {'timetable_day' : current_day, 'timetable_first' : currentFirstLesson.innerText,
			    		'timetable_second' : currentSecondLesson.innerText, 'timetable_third' : currentThirdLesson.innerText,
			    		'timetable_fourth' : currentFourthLesson.innerText, 'timetable_fifth' : currentFifthLesson.innerText,
			    		'timetable_sixth' : currentSixthLesson.innerText, 'timetable_seventh' : currentSeventhLesson.innerText},
			        dataType: 'html',
			        success: function(data){
		                alert(data);
	            	}
			    });
			});

		} else if (current_day == 4) {
			const currentFirstLesson = document.getElementById('thursday-1');
			const currentSecondLesson = document.getElementById('thursday-2');
			const currentThirdLesson = document.getElementById('thursday-3');
			const currentFourthLesson = document.getElementById('thursday-4');
			const currentFifthLesson = document.getElementById('thursday-5');
			const currentSixthLesson = document.getElementById('thursday-6');
			const currentSeventhLesson = document.getElementById('thursday-7');

			currentFirstLesson.innerText = document.getElementById('first-lesson-input').value;
			currentSecondLesson.innerText = document.getElementById('second-lesson-input').value;
			currentThirdLesson.innerText = document.getElementById('third-lesson-input').value;
			currentFourthLesson.innerText = document.getElementById('fourth-lesson-input').value;
			currentFifthLesson.innerText = document.getElementById('fifth-lesson-input').value;
			currentSixthLesson.innerText = document.getElementById('sixth-lesson-input').value;
			currentSeventhLesson.innerText = document.getElementById('seventh-lesson-input').value;

			$(document).ready(function() {
			    $.ajax({
			        url: 'timetable-processing.php',
			        type: 'POST',
			        cache: false,
			        data: {'timetable_day' : current_day, 'timetable_first' : currentFirstLesson.innerText,
			    		'timetable_second' : currentSecondLesson.innerText, 'timetable_third' : currentThirdLesson.innerText,
			    		'timetable_fourth' : currentFourthLesson.innerText, 'timetable_fifth' : currentFifthLesson.innerText,
			    		'timetable_sixth' : currentSixthLesson.innerText, 'timetable_seventh' : currentSeventhLesson.innerText},
			        dataType: 'html'
			    });
			});

		} else if (current_day == 5) {
			const currentFirstLesson = document.getElementById('friday-1');
			const currentSecondLesson = document.getElementById('friday-2');
			const currentThirdLesson = document.getElementById('friday-3');
			const currentFourthLesson = document.getElementById('friday-4');
			const currentFifthLesson = document.getElementById('friday-5');
			const currentSixthLesson = document.getElementById('friday-6');
			const currentSeventhLesson = document.getElementById('friday-7');

			currentFirstLesson.innerText = document.getElementById('first-lesson-input').value;
			currentSecondLesson.innerText = document.getElementById('second-lesson-input').value;
			currentThirdLesson.innerText = document.getElementById('third-lesson-input').value;
			currentFourthLesson.innerText = document.getElementById('fourth-lesson-input').value;
			currentFifthLesson.innerText = document.getElementById('fifth-lesson-input').value;
			currentSixthLesson.innerText = document.getElementById('sixth-lesson-input').value;
			currentSeventhLesson.innerText = document.getElementById('seventh-lesson-input').value;

			$(document).ready(function() {
			    $.ajax({
			        url: 'timetable-processing.php',
			        type: 'POST',
			        cache: false,
			        data: {'timetable_day' : current_day, 'timetable_first' : currentFirstLesson.innerText,
			    		'timetable_second' : currentSecondLesson.innerText, 'timetable_third' : currentThirdLesson.innerText,
			    		'timetable_fourth' : currentFourthLesson.innerText, 'timetable_fifth' : currentFifthLesson.innerText,
			    		'timetable_sixth' : currentSixthLesson.innerText, 'timetable_seventh' : currentSeventhLesson.innerText},
			        dataType: 'html',
			        success: function(data){
		                alert(data);
	            	}
			    });
			});

		} else if (current_day == 6) {
			const currentFirstLesson = document.getElementById('saturday-1');
			const currentSecondLesson = document.getElementById('saturday-2');
			const currentThirdLesson = document.getElementById('saturday-3');
			const currentFourthLesson = document.getElementById('saturday-4');
			const currentFifthLesson = document.getElementById('saturday-5');
			const currentSixthLesson = document.getElementById('saturday-6');
			const currentSeventhLesson = document.getElementById('saturday-7');

			currentFirstLesson.innerText = document.getElementById('first-lesson-input').value;
			currentSecondLesson.innerText = document.getElementById('second-lesson-input').value;
			currentThirdLesson.innerText = document.getElementById('third-lesson-input').value;
			currentFourthLesson.innerText = document.getElementById('fourth-lesson-input').value;
			currentFifthLesson.innerText = document.getElementById('fifth-lesson-input').value;
			currentSixthLesson.innerText = document.getElementById('sixth-lesson-input').value;
			currentSeventhLesson.innerText = document.getElementById('seventh-lesson-input').value;

			$(document).ready(function() {
			    $.ajax({
			        url: 'timetable-processing.php',
			        type: 'POST',
			        cache: false,
			        data: {'timetable_day' : current_day, 'timetable_first' : currentFirstLesson.innerText,
			    		'timetable_second' : currentSecondLesson.innerText, 'timetable_third' : currentThirdLesson.innerText,
			    		'timetable_fourth' : currentFourthLesson.innerText, 'timetable_fifth' : currentFifthLesson.innerText,
			    		'timetable_sixth' : currentSixthLesson.innerText, 'timetable_seventh' : currentSeventhLesson.innerText},
			        dataType: 'html',
			        success: function(data){
		                alert(data);
	            	}
			    });
			});

		} else {
			const currentFirstLesson = document.getElementById('sunday-1');
			const currentSecondLesson = document.getElementById('sunday-2');
			const currentThirdLesson = document.getElementById('sunday-3');
			const currentFourthLesson = document.getElementById('sunday-4');
			const currentFifthLesson = document.getElementById('sunday-5');
			const currentSixthLesson = document.getElementById('sunday-6');
			const currentSeventhLesson = document.getElementById('sunday-7');

			currentFirstLesson.innerText = document.getElementById('first-lesson-input').value;
			currentSecondLesson.innerText = document.getElementById('second-lesson-input').value;
			currentThirdLesson.innerText = document.getElementById('third-lesson-input').value;
			currentFourthLesson.innerText = document.getElementById('fourth-lesson-input').value;
			currentFifthLesson.innerText = document.getElementById('fifth-lesson-input').value;
			currentSixthLesson.innerText = document.getElementById('sixth-lesson-input').value;
			currentSeventhLesson.innerText = document.getElementById('seventh-lesson-input').value;

			$(document).ready(function() {
			    $.ajax({
			        url: 'timetable-processing.php',
			        type: 'POST',
			        cache: false,
			        data: {'timetable_day' : current_day, 'timetable_first' : currentFirstLesson.innerText,
			    		'timetable_second' : currentSecondLesson.innerText, 'timetable_third' : currentThirdLesson.innerText,
			    		'timetable_fourth' : currentFourthLesson.innerText, 'timetable_fifth' : currentFifthLesson.innerText,
			    		'timetable_sixth' : currentSixthLesson.innerText, 'timetable_seventh' : currentSeventhLesson.innerText},
			        dataType: 'html',
			        success: function(data){
		                alert(data);
	            	}
			    });
			});
		}		
	}

	function EditDay() {
		const widget = document.querySelector('.timetable-body');
		const isEditing = widget.classList.contains('timetable-editing');
    	const prevButton = document.querySelector('.timetable-day-prev-btn');
		const nextButton = document.querySelector('.timetable-day-next-btn');

	    if (isEditing) {
    		prevButton.disabled = false;
    		nextButton.disabled = false;
    		SaveDay();

	    	button = document.querySelector('.timetable-btn');
	    	button.innerHTML = '<button class="timetable-edit-btn button" type="button">Редактировать</button>';
	    	timetableBindEvents();

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
    		prevButton.disabled = true;
    		nextButton.disabled = true;

	    	button = document.querySelector('.timetable-btn');
	    	button.innerHTML = '<button class="timetable-edit-btn button" type="button"">Сохранить</button>';
	    	timetableBindEvents();

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

	timetableBindEvents();
	TimetableInit();
});