const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
var id = "{{Promotion::max('id')}}";
if (id != null) {
    var end_time = "{{Promotion::find(id)->end_date}}";
    //var end_time = promotion"{{->end_date}}";
    var mytime = "{{Carbon::now('Asia/Ho_Chi_Minh')}}";
    var time = "{{strtotime(end_time)}}";
     var newformat = "{{date('Y/M/d',time)}}";
     /*
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
function initializeClock(endtime) {
    const daysSpan = document.querySelectorAll('.days');
    const hoursSpan = document.querySelectorAll('.hours');
    const minutesSpan = document.querySelectorAll('.minute');
    const secondsSpan = document.querySelectorAll('.second');
    
    function updateClock() {
        const t = getTimeRemaining(endtime);
        daysSpan.forEach(element => element.innerHTML = t.days);
        hoursSpan.forEach(element => element.innerHTML = ('0' + t.hours).slice(-2));
        minutesSpan.forEach(element => element.innerHTML = ('0' + t.minutes).slice(-2));
        secondsSpan.forEach(element => element.innerHTML = ('0' + t.seconds).slice(-2));
        if (t.total <= 0) {
            clearInterval(timeinterval);
        }
    }
    updateClock();
    const timeinterval = setInterval(updateClock, 1000);
}

function updateDefaultAddress (id) {
    $.ajax({
        url:"update-default-address",
        data:{id: id},
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(response){
            if (response.status ) {
                Toast.fire({
                    icon: 'success',
                    title: response.message
                })
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.message
                })
            }
        } 
    });
}
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function(){
        readURL(this);
    });
});

function checkPassword() {
    let password = $('#password').val();
    $.ajax({
        url:"check-password",
        data: {password: password},
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(response){
            $('#help-block').text(response.message);
        } 
    });
}
