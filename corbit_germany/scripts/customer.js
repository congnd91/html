// JavaScript Document

/*---------------- go-top ---------------*/
$(function () {
	$("#gotop").click(function () {
		jQuery("html,body").animate({
			scrollTop: 0
		}, 1000);
	});
	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			$('#gotop').fadeIn("fast");
		} else {
			$('#gotop').stop().fadeOut("fast");
		}
	});
});


/****	Search Box ****/

$(function () {

	$('.search_btn').on('click',function(){

		var $this = $(this);

		$this.parents('.search_box').toggleClass('active');
		$this.parents('.search_box').find('input[type="search"]').focus();

	});

	$(document).on('click',function(event){

		if(!$(event.target).closest('.search_box').length){
			$('.search_box').removeClass('active');		    		
		}

	});
});

/**** lang *****/
$(document).ready(function(){
    $(".quick-search").click(function(){
        $(".quick-search-open").animate({
            height: 'toggle'
        });
    });
});

$(document).ready(function(){
    $(".lang").click(function(){
        $(".lang-open").animate({
            height: 'toggle'
        });
    });
});

$(document).ready(function(){
    $(".login").click(function(){
		 $(".login-open").toggleClass('login-show');
    });
});


