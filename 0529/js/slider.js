
var slider_num=0;
var slider_length=$('.sliderLi').length;
var slider_old=slider_length-1;
var sliderLi_last=slider_num+1;

sliderInit();

$('.slider_left_arrow').click(function(event) {

	  slider_right_go();

});
$('.slider_right_arrow').click(function(event) {
		slider_left_go();
});
$('.slider_title').click(function(event) {
	$(this).hide();
	$(this).siblings('.slider_contant').show();
});
$('.slider_contant').click(function(event) {
	$(this).hide();
	$(this).siblings('.slider_title').show();
});

$('.close_active').click(function(event) {
		 constrolX=0;
	     $('.popShow').removeClass('popHide');
    $('.pop_11').addClass('pop_active')
});
function sliderInit()
{
	$('.sliderLi').eq(0).addClass('sliderLi_active');
	$('.sliderLi').eq(sliderLi_last).addClass('sliderLi_last');
	$('.sliderLi').eq(slider_old).addClass('sliderLi_old');
}
function slider_left_go()
{
	slider_old=slider_num;
	slider_num++;
	if(slider_num == slider_length)
	{
		slider_num=0;
	}
	sliderLi_last=slider_num+1;
	if (sliderLi_last == slider_length) {
		sliderLi_last=0;
	}
	$('.sliderLi').removeClass('sliderLi_active');
	$('.sliderLi').removeClass('sliderLi_last');
	$('.sliderLi').css('z-index','0');
	$('.sliderLi').removeClass('sliderLi_old')
	$('.sliderLi').eq(slider_num).addClass('sliderLi_active');
	$('.sliderLi_active').css('z-index','1');
    $('.sliderLi').eq(slider_old).addClass('sliderLi_old');
    $('.sliderLi').eq(sliderLi_last).addClass('sliderLi_last');
    $(".sliderLi_last").css({
  "transition":"unset"
  });
    $(".sliderLi_active").css({
  "transition":"right .5s"
  });
    $(".sliderLi_old").css({
  "transition":"right .5s"
  });
}
function slider_right_go()
{
	slider_old=slider_num;
	slider_num--;
	if(slider_num < 0)
	{
		slider_num=slider_length-1;
	}
		sliderLi_last=slider_num-1;
	if (sliderLi_last == slider_length) {
		sliderLi_last=slider_length-1;
	}

	$('.sliderLi').removeClass('sliderLi_active');
	$('.sliderLi').removeClass('sliderLi_last');
	$('.sliderLi').css('z-index','0');
	$('.sliderLi').removeClass('sliderLi_old')
	$('.sliderLi').eq(slider_num).addClass('sliderLi_active');
	$('.sliderLi_active').css('z-index','1');
    $('.sliderLi').eq(sliderLi_last).addClass('sliderLi_old');
     $('.sliderLi').eq(slider_old).addClass('sliderLi_last');
     $(".sliderLi_old").css({
  "transition":"unset"
  });
    $(".sliderLi_active").css({
  "transition":"right .5s"
  });
    $(".sliderLi_last").css({
  "transition":"right .5s"
  });
}
// $('.searchShow button').click(function(event) {
// 	$('.searchShow').toggleClass('searchHide');
// });
