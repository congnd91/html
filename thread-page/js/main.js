$(document).ready(function() {

	$(window).scroll(function() {
    if ($(document).scrollTop() > 300) {
      $('.js-upload-panel').addClass('fixed');
    }
    else {
      $('.js-upload-panel').removeClass('fixed'); }
    });


	$('.nav-link').click(function() {
		$('.mobile-nav, .mobile-nav-bg').removeClass('show');
		$('body').removeClass('no-scroll');
	});



	$('.mobile-nav-bg').click(function() {
		$('.mobile-nav-bg, .mobile-nav').removeClass('show');
		$('body').removeClass('no-scroll');
	});

	$('.show-menu').on('click', function() {
		$('.mobile-nav, .mobile-nav-bg').toggleClass('show');
		$('body').toggleClass('no-scroll');
	});





	$('.js-navbar-toggler').on('click', function() {
		$('.navbar-toggler').toggleClass('active');
	});
	$('.mobile-nav-bg, .nav-link').click(function() {
		$('.navbar-toggler').removeClass('active');
	});

	$('.js-navbar-toggler').on('click', function() {
		$('.js-custom-navbar-collapse').toggleClass('active');
	});
	$('.mobile-nav-bg, .nav-link').click(function() {
		$('.js-custom-navbar-collapse').removeClass('active');
	});


	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
	
	
	
	
	

});