
var id = "{{Promotion::max('id')}}";
if (id != null) {
    var end_time = "{{Promotion::find(id)->end_date}}";
    //var end_time = promotion"{{->end_date}}";
    var mytime = "{{Carbon::now('Asia/Ho_Chi_Minh')}}";
    var time = "{{strtotime(end_time)}}";
     var newformat = "{{date('Y/M/d',time)}}";/*
    $view->with('promotion', $promotion);
    $view->with('newformat', $newformat);*/
}
/*else{
  $view->with('promotion', null);
    $view->with('newformat', null);
}*/


function getTimeRemaining(endtime) {
              const total = Date.parse(endtime) - Date.parse(new Date());
              const seconds = Math.floor((total / 1000) % 60);
              const minutes = Math.floor((total / 1000 / 60) % 60);
              const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
              const days = Math.floor(total / (1000 * 60 * 60 * 24));
              
              return {
                total,
                days,
                hours,
                minutes,
                seconds
            };
        }
        function initializeClock(id, endtime) {
          const clock = document.getElementById(id);
          const daysSpan = clock.querySelector('.days');
          const hoursSpan = clock.querySelector('.hours');
          const minutesSpan = clock.querySelector('.minute');
          const secondsSpan = clock.querySelector('.second');
          function updateClock() {
            const t = getTimeRemaining(endtime);
            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
            if (t.total <= 0) {
              clearInterval(timeinterval);
          }
      }
      updateClock();
      const timeinterval = setInterval(updateClock, 1000);
  }
  var time = newformat;
  const deadline = new Date(time);
  initializeClock('clockdiv', deadline);