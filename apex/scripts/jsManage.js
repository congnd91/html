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
				$(this).parent().css('height',52);
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
		
		//mobile classLink2
		var $clone = $('.side_classLink2 ul').clone(),
		      $current_txt = $('.side_classLink2 ul').find('.current02').text();
		$('.side_classLink2').after('<div class="m_classLink2"><a class="main2"><b></b><i class="fa-angle-down"></i></a></div>');
		$('.m_classLink2').append($clone).end().find('a.main2 b').text($current_txt);
		/*$('.m_classLink').hover(function(){
			$(this).find('ul').stop().slideDown(200);
		},function(){
			$(this).find('ul').stop().slideUp(200);*/
		var isT = true;
		$('.m_classLink2').click(function(){
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
		
		
		
		
	});