// JavaScript Document
	$(function(){
		
		//submenu
		$(function(){
			$('.dropDown').hover(function(){
				if($(this).parent().hasClass('nav')) return false;
				$(this).find('.submenu').stop(false,true).slideDown(200);
			},function(){
				if($(this).parent().hasClass('nav')) return false;
				$(this).find('.submenu').stop(false,true).slideUp(200);
			});
		});
		
		//mobile menu
		var $m_menu = $('ul.menu').clone();
		var $top_m_menu = $('.topLink').find('.rightBox').children('a').not('.dropDown, .exclude').clone();
				
		$m_menu.appendTo('.m_menu').removeClass().addClass('nav').find('b').remove().end().append($top_m_menu).children('a').wrap('<li/>').end().find('li.dropDown').each(function(){
			$(this).children('a').removeClass().append('<i class="fa-angle-down" />').attr('href','');
		});
				
		$('.m_menu').find('a.main').click(function(){
			if(!$(this).parent().hasClass('active')){
				$(this).parent().addClass('active');
				$(this).parent().css('height','auto');
			}else{
				$(this).parent().removeClass('active');
				$(this).parent().css('height',48);
			}//end if hasClass
			return false;
		});
		
		$('.m_menu').find('li.dropDown').children('a').click(function(){
			$(this).siblings().slideToggle();
			return false;
		});
		
		//mobile classLink
		var $clone = $('.side_classLink ul').clone(),
		      $current_txt = $('.side_classLink ul').find('.current02').text();
		$('.side_classLink').after('<div class="m_classLink"><a class="main"><b></b><i class="fa-angle-down"></i></a></div>');
		$('.m_classLink').append($clone).end().find('a.main b').text($current_txt);
		/*$('.m_classLink').hover(function(){
			$(this).find('ul').stop().slideDown(200);
		},function(){
			$(this).find('ul').stop().slideUp(200);*/
		var isT = true;
		$('.m_classLink').click(function(){
			if(isT){
				isT = false;
				$(this).find('i.fa-angle-down').removeClass().addClass('fa-angle-up').attr('href','');
				$(this).find('ul').stop().slideDown(200);
			}
			else{
				isT = true;
				$(this).find('i.fa-angle-up').removeClass().addClass('fa-angle-down').attr('href','');
				$(this).find('ul').stop().slideUp(200);
			}
			
		})
		
		//textEditor img
		if(isMobile){			
			$('.textEditor').find('img').each(function(){
				var href = $(this).attr('src').replace('_m','_b');
				$(this).wrap('<a class="titan-lb" href="' +href+ '"</a>');
			});			
		}
		
		//mailLink
		$('.contactLink').click(function(){
			if(isMobile){
				var href = $(this).data('mail');
				window.location.href= 'mailto:'+href;
				return false;
			}
		});

		//gotop
		$('.goTop').click(function(){
			$('body,html').stop().animate({scrollTop:0});
			return false;
		});
				
		//fix contactInfo height
		$('.side_contactInfo').find('b').each(function(){
			if($(this).height() <= 20) $(this).siblings('i').css('float','none').css('display','inline-block');
		});
		
	});