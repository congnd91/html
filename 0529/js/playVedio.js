var video = $("#video")[0];
var cotorlPlay = 0;
var playNum = 0;

$('.nowText').text($('#video source').eq(playNum).attr('name'));
$('.next_name').text($('#video source').eq(playNum + 1).attr('name'));
$("#play").click(function() {
    if (!cotorlPlay) {
        video.play(); //播放影片   
        cotorlPlay = 1;
        $('.playVedio').css('opacity', '.3');
        $('.pastVedio').css('opacity', '.3');
        var time_go_num = setInterval(time_go, 1000);

        var t = setInterval(function() {
            //以影片總長跟目前位置算出一個比例，顯示時間的圖像應該在的位置   
            var now = (video["currentTime"] / video["duration"]) * 100;
            //讓css去改變位置   
            $(".now_position").css("left", now + '%');
            if (now == 100) {

                nextVedio();

            }
        }, 100);

    } else {

        cotorlPlay = 0;
        video.pause(); //停止播放  
        $('.playVedio').css('opacity', '1');
        $('.pastVedio').css('opacity', '1');
    }
});



var clicking = false;

$(".track_bar").mousedown(function(e) {
    var width_Time = $('.now_position').width();
    clicking = true;
    var begameX = e.pageX - $('.track_bar').offset().left;

    video.currentTime = (begameX * video["duration"]) / width_Time - 2.5;
});
$(".track_bar").mouseup(function(e) {
    clicking = false;
});
$(".track_bar").mousemove(function(e) {
    var width_Time = $('.now_position').width();
    var begameX = e.pageX - $('.track_bar').offset().left;
    if (clicking == false) return;
    video.currentTime = (begameX * video["duration"]) / width_Time - 2.5;
});
$('.pastVedio').click(function(event) {
    var width_Timee = ('.now_position').width();
    if (video.currentTime < 0.5) {

        postVedio()
    }

    video.currentTime = $(0 * video["duration"]) / width_Time - 2.5;

});
$('.next').click(function(event) {
    nextVedio();
});
$('.fullVedio').click(function(event) {
    fullVedio()
});

function nextVedio() {
    playNum++;
    if (playNum == $('#video source').length) {
        playNum = 0;
        $('#video').attr('src', $('#video source').eq(playNum).attr('src'));
        video.pause();
        location.href='recording.html';
    } else {
        $('#video').attr('src', $('#video source').eq(playNum).attr('src'));
        video.play();
    }
    $('.nowText').text($('#video source').eq(playNum).attr('name'));
    var nextNum = playNum + 1;
    if (nextNum == $('#video source').length) {
        nextNum = 0;
    }
    $('.next_name').text($('#video source').eq(nextNum).attr('name'));

}

function postVedio() {
    $('.next_name').text($('#video source').eq(playNum).attr('name'));

    playNum--;

    if (playNum < 0) {
        playNum = $('#video source').length - 1;
        $('#video').attr('src', $('#video source').eq(playNum).attr('src'));
        video.play();
    } else {
        $('#video').attr('src', $('#video source').eq(playNum).attr('src'));
        video.play();
    }
    $('.nowText').text($('#video source').eq(playNum).attr('name'));
}

function time_go() {
    var x = Math.floor(video["duration"] - video["currentTime"]);

    $('.time_reciprocal').text(x);
}

function fullVedio() {
    if (video.requestFullscreen) {

        video.requestFullscreen();
    } else if (video.msRequestFullscreen) {
        video.msRequestFullscreen();
    } else if (video.mozRequestFullScreen) {

        video.mozRequestFullScreen();
    } else if (video.webkitRequestFullscreen) {

        video.webkitRequestFullscreen();
    }

}
