function clock(){
    var date = new Date(),
        hours = (date.getHours() < 10) ? '0' + date.getHours() : date.getHours(),
        minutes = (date.getMinutes() < 10) ? '0' + date.getMinutes() : date.getMinutes(),
        seconds = (date.getSeconds() < 10) ? '0' + date.getSeconds() : date.getSeconds();
        daydate = date.getDate(); // дата

        // день недели
        if (date.getDay() == 0) {
        	day = 'воскресенье';
        } else if (date.getDay() == 1) {
        	day = 'понедельник';
        } else if (date.getDay() == 2) {
        	day = 'вторник';
        } else if (date.getDay() == 3) {
        	day = 'среда';
        } else if (date.getDay() == 4) {
        	day = 'четверг';
        } else if (date.getDay() == 5) {
        	day = 'пятница';
        } else if (date.getDay() == 6) {
        	day = 'суббота';
        }

        // месяц
        if (date.getMonth() == 0) {
        	month = 'января';
        } else if (date.getMonth() == 1) {
        	month = 'февраля';
        } else if (date.getMonth() == 2) {
        	month = 'марта';
        } else if (date.getMonth() == 3) {
        	month = 'апреля';
        } else if (date.getMonth() == 4) {
        	month = 'мая';
        } else if (date.getMonth() == 5) {
        	month = 'июня';
        } else if (date.getMonth() == 6) {
        	month = 'июля';
        } else if (date.getMonth() == 7) {
        	month = 'августа';
        } else if (date.getMonth() == 8) {
        	month = 'сентября';
        } else if (date.getMonth() == 9) {
        	month = 'октября';
        } else if (date.getMonth() == 10) {
        	month = 'ноября';
        } else if (date.getMonth() == 11) {
        	month = 'декабря';
        }
    //document.getElementById('clock-widget').innerHTML = '<p class="clock-widget__date">'+ date + ' ' + month +'</p>';
    document.getElementById('clock-widget').innerHTML = '<p class="clock-widget__clock">' + hours + ':' + minutes + ':' + seconds + '</p><p class="clock-widget__day">' + day + '</p><p class="clock-widget__date">'+ daydate + ' ' + month +'</p>';
}
setInterval(clock, 1000);
clock();