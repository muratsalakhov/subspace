var t = new Date;
var s = new Date;
var n = new Date;
t.setHours(0, 0, 0, 0);

function Timer() {
    t = new Date(t.getTime() + (new Date).getTime() - s.getTime());
    hours = (t.getHours() < 10) ? '0' + t.getHours() : t.getHours(),
    minutes = (t.getMinutes() < 10) ? '0' + t.getMinutes() : t.getMinutes(),
    seconds = (t.getSeconds() < 10) ? '0' + t.getSeconds() : t.getSeconds();
    var timer = document.getElementById('timer-clock');
    timer.innerHTML = '<p>' + hours + ':' + minutes + ':' + seconds + '</p>';
    s = new Date;
    n = setTimeout(arguments.callee, 500);
};

function New_start() {
    t.setHours(0, 0, 0, 0);
    document.getElementById('start').value = 'Заново';
    document.getElementById('pause').value = 'Пауза';
    s = new Date;
    Timer();
};

function Pause() {
  if (s){
    window.clearTimeout(n); 
    document.getElementById('pause').value = 'Запуск';
    document.getElementById('start').value = 'Заново';
    s = !1;
  }  else {
    s= new Date;
    document.getElementById('pause').value = 'Пауза';
    Timer();
  }
};