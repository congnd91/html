
function showContent() {
	$(".tab-pane").css('display','none');
	$('#myTabContent').css('visibility','visible');
}

$('document').ready(function () {

    var doc = document.documentElement;
    doc.setAttribute('data-useragent', navigator.userAgent);

	if($('.multiple').length > 0) {
		$('.multiple').multiselect({
		    noneSelectedText: receiversNoneSelectedText,
		    checkAllText: receiversMarkAllText,
		    uncheckAllText: receiversUnMarkAllText,
		    selectedText: receiversMarkedText
		}); 
	}
	$('.warranty .nav>li>a').click(function() {
		$(this).parent().parent().find('input:radio').attr('checked',false);
		var radio = $(this).children('input:radio');
		if (radio.is(':checked')) {
		    radio.attr('checked', false);
		}
		else {
		    radio.attr('checked', true);
		}
	});
		
	if (typeof (Sys) !== 'undefined') {
		with (Sys.WebForms.PageRequestManager.getInstance()) {
			add_beginRequest(onBeginRequest);
			add_endRequest(onEndRequest);
		}
    }

	$(".rateme a").hover(function(){
		var index = $(this).index();
		var el = $(this).parent().children('a');
		el.slice(index+1,5).removeClass('hover');
		el.slice(0,index+1).addClass('hover');
	},
	function(){
		var el = $(this).parent().children('a');
		el.removeClass('hover');
	});
    //Click on large image in car image carousel displays image in fancybox
	if ($('#myCarousel').length > 0) {
	    $("#myCarousel .fancybox").fancybox({
	        openEffect: 'none',
	        closeEffect: 'none'
	    });
    }

    if ($('#secondCarousel').length > 0) {
        $("#secondCarousel .fancybox").fancybox({
            openEffect: 'none',
            closeEffect: 'none'
        });
    }

    if ($('#thirdCarousel').length > 0) {
        $("#thirdCarousel .fancybox").fancybox({
            beforeShow: function () { this.title = $(this.element).data("caption");},
            openEffect: 'none',
            closeEffect: 'none'
        });
    }

	if ($('#car-images').length > 0) {
	    $("#car-images a").fancybox({
			cyclic	: true,
			onStart	: function() {
				$("#carousel").trigger("pause");
			},
			onClosed: function() {
				$("#carousel").trigger("play");
			}
		});
    }
    if ($('#damage-images').length > 0) {
        $("#damage-images a").fancybox({
            cyclic: true,
            onStart: function () {
                $("#carousel").trigger("pause");
            },
            onClosed: function () {
                $("#carousel").trigger("play");
            }
        });
    }
	if ($('.seller-comment').length > 0) {
		$('.seller-comment .tab-pane p').mCustomScrollbar({
			scrollButtons:{
				enable:false
			},
			theme:"dark-thick"
		});
	}
	//$('select').not('.multiple').selectBoxIt();
	if ($('.advanced-search-link').length > 0) {
		$('.advanced-search-link').click(function(){
		    $('.advanced-search').toggle(100);
		});
	}
	$('.new_user_button').click(function(){
		$('.new_user_container').toggle(200);
		return false;
	});	
    if(!$("html").hasClass("ie8") || !$("html").hasClass("ie7") ) {	
		if($('#myTabContent .tab-pane').length > 0) {
			$('#myTabContent .tab-pane').each(function(){
				$(this).find($(".table_container").not('.float')).mCustomScrollbar({
				    horizontalScroll:true,
					scrollButtons:{
						enable:true
						},
					theme:"dark-thick"
				});
			});
		}
		else {
			if($(".table_container").length > 0) {
				$(".table_container").not('.float').mCustomScrollbar({
					horizontalScroll:true,
					scrollButtons:{
					    enable:true
					},
					theme:"dark-thick"
				});
			}
		}
    }	
	if ($(".tab-pane").length > 0) {
		setTimeout(showContent, 1000)
	}
	if ($('.car_num').length > 0) {
		$('.car_num input:first-child').focus();
		$(".car_num input:first-child").keyup(function() {
		    var input_first = $(".car_num input:first-child").val().length;
			$(".car_num input:eq(1)").val('');
			if (input_first == 3) {
				$(".car_num input:eq(1)").focus();
			}
		});
	}	
	//$(".spinner").spinner();

	$("input:file").change(function (){
		var fileName = $(this).val();
		$(this).parent().next(".filemessage").html(fileName);
	});
				
	$('.add_more_photos').click(function(){
		var html = $('.hidden.template').html();
		$(this).parent().before(html);
		return false;
	});

    if ($(".datepicker").length) {
        $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    }
				
	$(document).on('mouseenter', '.file_block', function() {
		$(this).find(".remove_big").fadeIn(100);
	});

	$(document).on('mouseleave', '.file_block', function() {
		$(this).find(".remove_big").fadeOut(100);
	});

	$(document).on('click', '.remove_big', function() {
		$(this).parent().parent().parent().remove();
		return false;
	});

	$('#open_car-list').click(function(){
		$('#myModal').on('show', function () {
			$('#myModal iframe').attr("src",$('#open_car-list').attr('href'));
		});
		$('#myModal').modal({ show: true, height: 500});
		return false;
	});

    if($("div.pdf-info").length == 0) {
		$('.carousel').carousel({
		    interval: 5000
		});
    }




    // by Alex 20.01.2017

    $('.car-profile-modal').on('hidden', function () {  //IC-DEV-15018 #17
        $('.car-profile-modal .modal-over').fadeOut(200, function () {
            $('.car-profile-modal .modal-main').show();
        });

    });

    $('.car-profile-modal').on('shown.bs.modal', function (e) {
        var enteredBid = $('#ContentPlaceHolderDefault_FullRegion_BidAmount').val();
        $('.car-profile-modal #ContentPlaceHolderDefault_FullRegion_PlaceBidControl_BidAmountModal').val(enteredBid);
        var formatted = enteredBid.replace(/(\d{3})/g, '$1 ').trim();
        $('#yourBidMessage').val(formatted);
    });

    $('.car-profile-modal #place_bid_final').on('click', function (e) {
        e.preventDefault();
        $('.car-profile-modal .modal-main').fadeOut(200, function () {
            $('.car-profile-modal .modal-over').fadeIn(200);
        });

    });


    $('#reload_page').click(function (e) {
        e.preventDefault();
        location.reload();
    });

    $('.search-car__block.collapsed').each(function () {
        var h = $(this).data('height');
        $('.search-car__block.collapsed').height(h);
    });

    $('.collapse_expand_switch').on('click', function (e) {
        e.preventDefault();
        if ($(this).parent().hasClass('collapsed')) {
            $(this).parent().removeClass('collapsed').addClass('expanded').css('height', 'auto');
        }
        else {
            var hh = $(this).parent().data('height');
            $(this).parent().removeClass('expanded').addClass('collapsed').css('height', hh);
        }
    });

    $('.order_manage_work__button').click(function (e) {
        e.preventDefault();

        $('html,body').animate({ 'scrollTop': $('#testProtocolAnchor').offset().top }, 1000);

        // $(document.body).animate({'scrollTop': $('#testProtocolAnchor').offset().top}, 2000);

        $('#order_manage_work').fadeIn(200);
        $('body').append('<div class="modal-backdrop in"></div>');
        $('.modal-backdrop').css('z-index', 990);
    });

    $('#order_manage_work .close').click(function (e) {
        e.preventDefault();
        $('#order_manage_work').fadeOut(200);
        $('.modal-backdrop.in').remove();
    });


    // by Alex end 20.01.2017






});

function onBeginRequest(sender, args) {
    if (sender._postBackSettings.sourceElement == null || ($(sender._postBackSettings.sourceElement).attr("class") != "my-auctions-button" && $(sender._postBackSettings.sourceElement).attr("class") != "latest-auctions-button" && $(sender._postBackSettings.sourceElement).attr("class") != "my-watches-button" && $(sender._postBackSettings.sourceElement).attr("class") != "auction-table-button" && $(sender._postBackSettings.sourceElement).attr("class") != "my-bids-button" && $(sender._postBackSettings.sourceElement).attr("class") != "current-bid-button" && $(sender._postBackSettings.sourceElement).attr("class") != "current-bid-popup-button")) {
        $('#loader').css('display', 'block');
    }
}

function onEndRequest(sender, args) {
    $('#loader').css('display', 'none');
    if ($(".datepicker").length > 0) {
        $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    }
    if ($('.modal-backdrop').length > 0 && ($($(sender._postBackSettings.sourceElement).parent().parent().parent().parent()).find('.unpublish-error').length == 0 || $($(sender._postBackSettings.sourceElement).parent().parent().parent().parent()).find('.unpublish-error').html() == "")) {
		$('.modal-backdrop').remove();
    }
    //$('select').not('.multiple').selectBoxIt();
    if ($(".tab-pane").length > 0) {
        setTimeout(showContent, 1000)
    }
}

function applyFormElementsStyle()
{
	$(".testprotocol span.aspNetDisabled input").each(function () {
		if ($(this).is(":checked")) {
			$(this).parent().css("background-position", "0 -50px");
		}
	});
}



//Page loading time, 2020-03
function finishPerformanceTestingHB(codeName) {
    var now = new Date().getTime();
    var page_load_time = now - performance.timing.navigationStart;
    AddToWriteLogHB(codeName, page_load_time);
    //console.log(codeName + " User-perceived page loading time: " + page_load_time);
}

function AddToWriteLogHB(codeName, duration) {
    var paramsForValuation = {
        codeName: codeName,
        durationms: duration,
        verbosityLevel: 10
    };
    var stringParams = JSON.stringify(paramsForValuation);
    $.ajax({
        type: 'POST',
        url: '/services/auctions.svc/LogToWriteLog',
        data: stringParams,
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        async: true,
        success: function (jqXHR) {

        },
        error: function (jqXHR, exception) {

        }
    });
}










