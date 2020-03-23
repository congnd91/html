function viewmodal() {

	$('div#instructor').modal({
		opacity : 50,
		zIndex : 9999999,
		// position:["30%","40%"],
		overlayCss : {
			backgroundColor : "#111"
		}

	});

}

function searchKeyPress(e) {
	// look for window.event in case event isn't passed in
	if (window.event) {
		e = window.event;
	}
	if (e.keyCode == 13) {
		search();
	}
}

function sendinstructorform() {
	/*
	 * if (document.getElementById("resume").value==''){;
	 * document.getElementById("instructor-message").innerHTML=xPhpHeaderMsg.InstructorResume;
	 * //alertbox('CGCircuit','You must insert your Resume!',1);
	 * 
	 * 
	 * }else{ $.ajax({type:'POST', url:
	 * 'modules/instructor/instructorsend.php?iduser='+xiduser+'&email='+xmail,
	 * data:$('#instructorform').serialize(), success: function(response) { if
	 * (response.success=='OK'){//alert('Class saved!'); window.location =
	 * "msgpage.php?val=8"
	 * 
	 * }else{
	 * document.getElementById('instructor-message').innerHTML=response.msg; }
	 * }});
	 * 
	 * return false; }
	 */
}

$(document).ready(function() {
    initContentTypeMenu();
    initModalWindow();
	/*
	 * var optionsinstructor = {
	 * 
	 * 
	 * url:
	 * 'modules/instructor/instructorsend.php?iduser='+xiduser+'&email='+xmail,
	 * dataType: 'json' };
	 * 
	 * jQuery('#instructorform').submit(function() { if
	 * (document.getElementById("resume").value==''){;
	 * //alertbox('CGCircuit','You must insert your Resume!',1);
	 * document.getElementById("instructor-message").innerHTML=xPhpHeaderMsg.InstructorResume;//'You
	 * must insert your Resume!'
	 * 
	 * }else{ jQuery(this).ajaxSubmit(optionsinstructor); return false; } });
	 */



});

function initModalWindow() {
	if (typeof coockieSiteInformation !== 'undefined'){
		var flag = getCookie(coockieSiteInformation);

		if (!flag) {
			$('.main-site-information').removeClass('hidden');
		}

		$('.close-button').click(function() {
			var expires = 60 * 60 * 24 * 365;
			setCookie(coockieSiteInformation,1 , {expires: expires});
			$('.main-site-information').addClass('hidden');
		});
	}
}

function sendinvite() {
	if (xnuminvite != 0) {
		xname = $("#popinvite #full-name-txtF").val();

		xmail = $("#popinvite #email-txtF").val();

		xsubject = $("#popinvite #subject-txtF").val();

		xMessage = $("#popinvite #message-txtF").val();

		viewloader();

		var dataString = 'iduser=' + xiduser + '&name='
				+ encodeURIComponent(xname) + '&email='
				+ encodeURIComponent(xmail) + '&subject='
				+ encodeURIComponent(xsubject) + '&usercomment='
				+ encodeURIComponent(xMessage);

		$.ajax({
			type : 'POST',
			url : 'sendinvite.php',
			data : dataString,
			success : showResponseinvite,
			dataType : 'json'
		});

	} else {

		alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.InvitationN0, 1);
		// alertbox('CGCircuit','Your invitation number is 0!',1);
	}
}
function showResponseinstructor(data, statusText) {

	if (statusText == 'success') {
		document.getElementById("instructor-message").innerHTML = '';
		if (data.success == 'OK') {// alert('Class saved!');
			window.location = "msgpage.php?val=8"

		} else {
			document.getElementById('instructor-message').innerHTML = data.msg;
		}

	}

}

function showResponseinvite(data, statusText) {

	if (statusText == 'success') {

		if (data.success == 'OK') {// alert('Class saved!');

			document.getElementById('invitemessage').innerHTML = data.msg;
			document.getElementById('send-invite-form').style.visibility = "hidden";
			document.getElementById('cancel-invite-form').value = "Close";
			document.getElementById('modalnumber').innerHTML = data.tot;
			document.getElementById('invitenumber').innerHTML = data.tot;

			xnuminvite = data.tot;
		} else {
			document.getElementById('invitemessage').innerHTML = data.error;
		}

		hideloader();

	}
}
function activeinvite() {
	if (xnuminvite != 0) {
		$('div#popinvite').modal({
			opacity : 50,
			zIndex : 9999999,
			// position:["30%","40%"],
			overlayCss : {
				backgroundColor : "#111"
			}

		});

		document.getElementById('modalnumber').innerHTML = document
				.getElementById('invitenumber').innerHTML;

	} else {

		alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.InvitationN0, 1);
	}

}
function removemsg(xop, xval) {
	if (xop == 1) {
		alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.DeleteOneMsg, 2,
				'javascript:removemsgop1OK(' + xval + ');');
		// Are you sure you want to delete this message?
	}
	if (xop == 0) {
		alertbox(xPhpHeaderMsg.AlertboxTitlexPhpHeaderMsg.DeleteAllMsg, 2,
				'javascript:removemsgop0OK(' + xval + ');');
		// Are you sure you want to delete all messages?
	}
}

function removemsgop1OK(xval) {
	viewloader();

	var dataString = 'IdMessageUser=' + xval + '&IdUser=' + xiduser;

	$.ajax({
		type : 'POST',
		url : xPathHeaderRemovemsg + '?val=1',// 'modules/header/php/removemsg.php?val=1',
		data : dataString,
		success : showResponseremovemsg,
		dataType : 'json'
	});

}
function removemsgop0OK(xval) {
	viewloader();

	var dataString = 'IdMessageUser=' + xval + '&IdUser=' + xiduser;

	$.ajax({
		type : 'POST',
		url : xPathHeaderRemovemsg + '?val=0',// 'modules/header/php/removemsg.php?val=0',
		data : dataString,
		success : showResponseremovemsg,
		dataType : 'json'
	});
}
function showResponseremovemsg(data, statusText) {
	if (statusText == 'success') {
		if (data.success == 'OK') {

			if (data.tot > 0) {
				document.getElementById('msgs-list').innerHTML = data.listmsg;
			} else {
				document.getElementById('msgs-div').innerHTML = '';
			}
			document.getElementById('msg').innerHTML = xHeaderMessage + ' ('
					+ (xTotAlert + data.tot) + ')';
			alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);

			hideloader();
		} else {
			alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);
			hideloader();
		}
	}
}
function deletelessonlearn(xval) {
	alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.UnsubscribeLesson, 2,
			'javascript:deletelessonlearnOK(' + xval + ');');
	// Are you sure to unsubscribe for this lesson?
}
function deletelessonlearnOK(xval) {
	viewloader();

	var dataString = 'IdLesson=' + xval + '&IdUser=' + xiduser;

	$.ajax({
		type : 'POST',
		url : xPathHeaderSubscribe + '?val=del',// 'modules/header/php/subscribe.php?val=del',
		data : dataString,
		success : showResponsedeletelessonlearn,
		dataType : 'json'
	});
}
function showResponsedeletelessonlearn(data, statusText) {
	if (statusText == 'success') {
		if (data.success == 'OK') {

			document.getElementById('listlearning').innerHTML = data.subscribe;
			alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);

			hideloader();
		} else {
			alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);
			hideloader();
		}
	}
}

function deletelesson(xval) {
	alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.DeleteLessonRequest, 2,
			'javascript:deletelessonOK(' + xval + ');');
	// Are you sure you want to delete this lesson? This action is not undoable.
}

function deletelessonOK(xval) {
	viewloader();

	var dataString = 'IdLesson=' + xval;

	$.ajax({
		type : 'POST',
		url : xPathHeaderDelLesson + '?op=head',// 'modules/createlesson/php/deletelesson.php?op=head',
		data : dataString,
		success : showResponsedellesson,
		dataType : 'json'
	});
}
function showResponsedellesson(data, statusText) {

	if (statusText == 'success') {
		if (data.success == 'OK') {
			// $("#loading").hide();

			alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.LessonDeleted,
					1);// Lesson Deleted
			var dataString = 'iduser=' + xiduser;

			$.ajax({
				type : 'POST',
				url : xPathHeaderListTeaching,// 'modules/header/php/listteaching.php',
				data : dataString,
				success : showResponseteach,
				dataType : 'json'
			});

		}
	}

}

function showResponseteach(data, statusText) {

	if (statusText == 'success') {
		document.getElementById('listteaching').innerHTML = data.success;
		hideloader();
	}
}

function search() {
	xdocument = document.getElementById('idsearch').value;

	xstring = xPathHeaderSearchresult + '?search=' + xdocument;// "searchresults.php?search="+xdocument;
	window.location = xstring;

}

function subscribe(xval, xredirect) {
	if (xvalue == 0) {

		alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.SubscribeLesson, 2,
				'javascript:subscribeOK(' + xval + ');');
		// Are you sure to subscribe for this lesson?
	} else {
		if (typeof xredirect === "undefined") {
			alertbox(xPhpHeaderMsg.AlertboxTitle,
					xPhpHeaderMsg.LoginForSubscribe, 2,
					'javascript:returnlogin();');
		} else {
			xredirect=xredirect.replace(/\'/g,'\\\'');
			alertbox(xPhpHeaderMsg.AlertboxTitle,
					xPhpHeaderMsg.LoginForSubscribe, 2,
					"javascript:returnlogin(" + xval + ",'SUBSCRIBE','"
							+ xredirect + "');");
							$("#btn-dialog-save").html("Login");
		}

		// You must login before subscribe!

	}
}

function subscribetutorial(xval, xredirect) {
	if (xvalue == 0) {

		alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.SubscribeTutorial,
				2, 'javascript:subscribeOK(' + xval + ');');

	} else {
		if (typeof xredirect === "undefined") {
			alertbox(xPhpHeaderMsg.AlertboxTitle,
					xPhpHeaderMsg.LoginForSubscribeTutorial, 2,
					'javascript:returnlogin();');
		} else {
			alertbox(xPhpHeaderMsg.AlertboxTitle,
					xPhpHeaderMsg.LoginForSubscribeTutorial, 2,
					"javascript:returnlogin(" + xval + ",'SUBSCRIBE','"
							+ xredirect + "');");
		}

	}
}

function subscribeOK(xval) {
	viewloader();

	var dataString = 'IdLesson=' + xval + '&IdUser=' + xiduser;

	$.ajax({
		type : 'POST',
		url : xPathHeaderSubscribe + '?val=add',// 'modules/header/php/subscribe.php?val=add',
		data : dataString,
		success : showResponsesubscribe,
		dataType : 'json'
	});

}
// xval valore da ritornare per sottoscrivere o comprare
// xtype SUBSCRIBE/ADDTOCART
// xredirect indirizzo dove ritornare dopo il login
function returnlogin(xval, xtype, xredirect) {
	xParam = "";
	if (typeof xtype === "undefined") {

	} else {
		xParam = "&function=" + encodeURIComponent(xtype) + "&functionval="
				+ encodeURIComponent(xval);
		if (typeof xredirect === "undefined") {
					
			xredirect = "/shoppinglist.php";
		}else{
			xredirect =encodeURIComponent(xredirect);
		}
	}
	if (typeof xredirect === "undefined") {
		window.location = "/login.php";
	} else {
		window.location = "/login.php?REDIRECT_URL="
				+ encodeURIComponent(xredirect) + xParam;
	}

}
function showResponsesubscribe(data, statusText) {
	if (statusText == 'success') {
		if (data.success == 'OK') {

			addLearningToJson(data.idcourse);
			if (xPage == "course") {
				window.location.reload();

			}
			alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);
			hideloader();
		} else {
			alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);
			hideloader();
		}
	}
}

function addRentToCart(xval, xredirect) {
	if (xvalue == 0) {

		alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.LoginForRentCourse,
				2, 'javascript:addrenttocartOK(' + xval + ');');
		// Are you sure you want to add this lesson to your cart?
	} else {
		if (typeof xredirect === "undefined") {
			alertbox(xPhpHeaderMsg.AlertboxTitle,
					xPhpHeaderMsg.LoginToAddToCart, 2,
					'javascript:returnlogin();');
		} else {
			alertbox(xPhpHeaderMsg.AlertboxTitle,
					xPhpHeaderMsg.LoginToAddToCart, 2,
					"javascript:returnlogin(" + xval + ",'ADDRENT','"
							+ xredirect + "');");
		}

		// You must login before add to cart!
	}
}

function addtocart(xval, xredirect, xType) {
	if (xvalue == 0) {

		alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.AddLessonToCart, 2,
				'javascript:addtocartOK(' + xval + ', ' + xType + ');');
		// Are you sure you want to add this lesson to your cart?
	} else {
		if (typeof xredirect === "undefined") {
			alertbox(xPhpHeaderMsg.AlertboxTitle,
					xPhpHeaderMsg.LoginToAddToCart, 2,
					'javascript:returnlogin();');
		} else {
			alertbox(xPhpHeaderMsg.AlertboxTitle,
					xPhpHeaderMsg.LoginToAddToCart, 2,
					"javascript:returnlogin(" + xval + ",'ADDTOCART','"
							+ xredirect + "');");
		}

		// You must login before add to cart!
	}
}

function addbundletocart(xval, xredirect) {
	if (xvalue == 0) {

		alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.AddBundleToCart, 2,
				'javascript:addbundletocartOK(' + xval + ');');
		// Are you sure you want to add this lesson to your cart?
	} else {
		if (typeof xredirect === "undefined") {
			alertbox(xPhpHeaderMsg.AlertboxTitle,
					xPhpHeaderMsg.LoginToAddToCart, 2,
					'javascript:returnlogin();');
		} else {
			alertbox(xPhpHeaderMsg.AlertboxTitle,
					xPhpHeaderMsg.LoginToAddToCart, 2,
					"javascript:returnlogin(" + xval + ",'ADDTOCART','"
							+ xredirect + "');");
		}

		// You must login before add to cart!
	}
}

function addtotemporarycart(xval, xtype, xversion) {

	/*alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.AddLessonToCart, 2,
			'javascript:addtotemporarycartOK(' + xval + ',' + xtype + ','
					+ xversion + ');');*/
	alertbox(xPhpHeaderMsg.AlertboxTitle,xPhpHeaderMsg.LoginToAddToCart, 2,
						"javascript:returnlogin(" + xval + ",'ADDTOCART','');");

}
function addbundletotemporarycart(xval, xtype, xversion) {

	/*alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.AddBundleToCart, 2,
			'javascript:addbundletotemporarycartOK(' + xval + ',' + xtype + ','
					+ xversion + ');');*/
	alertbox(xPhpHeaderMsg.AlertboxTitle,xPhpHeaderMsg.LoginToAddToCart, 2,
						"javascript:returnlogin(" + xval + ",'ADDBUNDLETOCART','');");	
}

function addtocartOK(xval, xType) {
	viewloader();

	var dataString = 'IdLesson=' + xval + '&IdUser=' + xiduser + '&type='
			+ xType;

	$.ajax({
		type : 'POST',
		url : xPathHeaderCart + '?val=add',// 'modules/cart/php/addtocart.php?val=add',
		data : dataString,
		success : showResponsecart,
		dataType : 'json'
	});
}

function addbundletocartOK(xval) {
	viewloader();

	var dataString = 'IdLesson=' + xval + '&IdUser=' + xiduser;

	$.ajax({
		type : 'POST',
		url : xPathHeaderCart + '?val=addbundle',// 'modules/cart/php/addtocart.php?val=add',
		data : dataString,
		success : showResponsebundlecart,
		dataType : 'json'
	});
}

function addtotemporarycartOK(xval, xtype, xversion) {
	viewloader();

	var dataString = 'IdLesson=' + xval + '&type=' + xtype + '&version='
			+ xversion + '&identifier=' + $cartidentifier;

	$.ajax({
		type : 'POST',
		url : '/modules/cart/php/addtotemporarycart.php?op=add',// 'modules/cart/php/addtocart.php?val=add',
		data : dataString,
		success : showResponsecart,
		dataType : 'json'
	});
}

function addbundletotemporarycartOK(xval, xtype, xversion) {
	viewloader();

	var dataString = 'IdLesson=' + xval + '&type=' + xtype + '&version='
			+ xversion + '&identifier=' + $cartidentifier;

	$.ajax({
		type : 'POST',
		url : '/modules/cart/php/addtotemporarycart.php?op=addbundle',// 'modules/cart/php/addtocart.php?val=add',
		data : dataString,
		success : showResponsebundlecart,
		dataType : 'json'
	});
}

function addrenttocartOK(xval) {
	viewloader();

	var dataString = 'IdLesson=' + xval + '&IdUser=' + xiduser;

	$.ajax({
		type : 'POST',
		url : xPathHeaderCart + '?val=addrent',// 'modules/cart/php/addtocart.php?val=add',
		data : dataString,
		success : showResponsecart,
		dataType : 'json'
	});
}
function showResponsecart(data, statusText) {
	if (statusText == 'success') {
		if (data.success == 'OK') {

			document.getElementById('cartnumber').innerHTML = '('
					+ (xTotCart + 1) + ')';
			xTotCart = xTotCart + 1;
			// alertbox(xPhpHeaderMsg.AlertboxTitle,data.msg,1);
			$('#genericModal').modal('hide');
			hideloader();
		} else {
			alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);
			hideloader();
		}
	}
}

function showResponsebundlecart(data, statusText) {
	if (statusText == 'success') {
		if (data.success == 'OK') {

			document.getElementById('cartnumber').innerHTML = '('
					+ (data.totnumbercart) + ')';
			xTotCart = data.totnumbercart;
			// alertbox(xPhpHeaderMsg.AlertboxTitle,data.msg,1);
			$('#genericModal').modal('hide');
			hideloader();
		} else {
			alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);
			hideloader();
		}
	}
}

function initContentTypeMenu() {
	var teachCourse = $('#teach-course');
	var courseTypeContainer = $('.course-type-container');
	var courseTypeContainerMobile = $('.course-type-container-mobile');

    teachCourse.click(function (e) {
        if (
        	$(window).width() < 768 && $(e.target).parents('.course-type-container-mobile').length === 0
		) {
			e.stopPropagation();
            var displayMobile = $('.course-type-container-mobile').css('display');
            courseTypeContainerMobile.removeClass('visible-xs-block');

            if (displayMobile === 'none') {
                courseTypeContainerMobile.slideDown(500);
            } else {
                courseTypeContainerMobile.slideUp(500);
			}
        } else {
            var display = courseTypeContainer.css('display');
            courseTypeContainerMobile.addClass('visible-xs-block');

            if (display === 'none') {
                courseTypeContainer.slideDown(500);
            } else {
            	courseTypeContainer.slideUp(500);
			}
        }
	});


    $('#single-video-type-lnk').click(function (e) {
        handleContentType(this, false);
    });
    $('#text-based-type-lnk').click(function (e) {
        handleContentType(this, false);
    });
    $('#tutorial-type-lnk').click(function (e) {
        handleContentType(this, false);
    });
    $('#workshop-type-lnk').click(function (e) {
        handleContentType(this, false);
    });
    $('#single-video-type-lnk-mobile').click(function (e) {
        handleContentType(this, true);
    });
    $('#text-based-type-lnk-mobile').click(function (e) {
		handleContentType(this, true);
    });
    $('#tutorial-type-lnk-mobile').click(function (e) {
        handleContentType(this, true);
    });
    $('#workshop-type-lnk-mobile').click(function (e) {
        handleContentType(this, true);
    });
}

function handleContentType(element, mobile) {
    var data = {};
    $('.content-type-error').addClass('hidden');
    var title = '';
    if (mobile) {
        title = $('#course-title-mobile').val();
    } else {
        title = $('#course-title').val();
    }

    var contentType = $(element).attr('data-content-type');

    if(title === '') {
        $('.content-type-error').removeClass('hidden');
        $('.content-type-error').text('Title must be filled.');
        return;
    }

    data = {
        title: title,
        contentType: contentType
    };

    $.ajax({
        type : 'POST',
        url : '/modules/create-content/php/saveContentTitle.php',
        data : data,
        success : function(data) {
            if (data.userLogged == 1) {
                window.location = "/teach/create/" + data.contentid + '?menuMode=1';
            } else {
                // $("#savetitle-alert").css("display", "");
                // $("#savetitle-alert").html(
                //     'You must be logged in to create new content!');
                // $("#savetitle-alert").removeClass("hidden").show();
                // setTimeout(function() {
                //     $("#savetitle-alert").fadeOut('slow');
                // }, 10000);
            }
            $('#course-title-mobile').val('');
            $('#course-title').val('');
        },
        error : function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError);

        },
        dataType : 'json'
    });
}

function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function setCookie(name, value, options) {
    options = options || {};

    var expires = options.expires;

    if (typeof expires == "number" && expires) {
        var d = new Date();
        d.setTime(d.getTime() + expires * 1000);
        expires = options.expires = d;
    }
    if (expires && expires.toUTCString) {
        options.expires = expires.toUTCString();
    }

    value = encodeURIComponent(value);

    var updatedCookie = name + "=" + value;

    for (var propName in options) {
        updatedCookie += "; " + propName;
        var propValue = options[propName];
        if (propValue !== true) {
            updatedCookie += "=" + propValue;
        }
    }

    document.cookie = updatedCookie;
}

function successNotification(message) {
    $.notify({
        icon: 'fa fa-check-circle-o',
        message: message
    },{
        type: 'success',
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        }
    });
}

function errorNotification(message) {
    $.notify({
        icon: 'fa fa-exclamation-circle',
        message: message
    },{
        type: 'danger',
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        }
    });
}


function sendAnalytics(paymentid, paypal, workshop, origin){
	var type=0;
	var provider="stripe";
	if (workshop!=undefined){
		if (workshop!=null){
			if (workshop){
				type=1;
			}
		}
	}
	if (paypal!=undefined){
		if (paypal!=null){
			if (paypal){
				provider='paypal';
			}
		}
	}
	$.ajax({
		type : 'GET',
		url : '/modules/cart/php/createAnalyticsECommerce.php?type='+type+'&paymentid='+paymentid+'&provider='+provider+'&origin='+origin,
		async:false,
		success : function(data, statusText){
			//console.log(data);
			var code = data;
			var script = document.createElement("script");
			script.setAttribute("type", "text/javascript");
			script.appendChild(document.createTextNode(code));
			document.body.appendChild(script);
		},
		error : function(data, statusText){
			console.log(data);
		},
		dataType : 'text'
	});
}
function sendCookie( val){
	
	$.ajax({
		type : 'GET',
		url : '/modules/cookies/php/sendCookie.php?status='+val,
		async:true,
		success : function(data, statusText){			//console.log(data);
			
		},
		error : function(data, statusText){
			console.log(data);
		},
		dataType : 'text'
	});
}