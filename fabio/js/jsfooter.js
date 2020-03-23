///////////messagebox
var xStatus;
xStatus = false;
// /////////Loader

$('#h-courses-container').mouseleave(function() {
	collapseMyCoursesContainer('hide');
});
function hideNotice() {
	$.ajax({
		type : 'POST',
		url : '/modules/footer/php/hidenotice.php',// xPathContactUs,//'modules/header/php/sendhelpmail.php?val=help',
		success : function() {
			$('#account-update-notification').remove();
		},
		dataType : 'text'
	});
}
function addcomment() {

	xvaltopic = $("#contactUsModal #topic :selected").text();
	xname = $("#contactUsModal #full-name-txtF").val();

	xmail = $("#contactUsModal #email-txtF").val();
	xsubject = $("#contactUsModal #subject-txtF").val();
	xcomment = $("#contactUsModal #usercomment").val();
	viewloader();
	var dataString = 'topic=' + encodeURIComponent(xvaltopic) + '&fullname='
			+ encodeURIComponent(xname) + '&email=' + encodeURIComponent(xmail)
			+ '&subject=' + encodeURIComponent(xsubject) + '&comment='
			+ encodeURIComponent(xcomment);

	$.ajax({
		type : 'POST',
		url : '/modules/header/php/sendhelpmail.php',// xPathContactUs,//'modules/header/php/sendhelpmail.php?val=help',
		data : dataString,
		success : showResponse,
		dataType : 'json'
	});
}
function showResponse(data, statusText) {

	if (statusText == 'success') {
		if (data.success == 'OK') {
			document.getElementById('contactmessage').innerHTML = data.msg;
			document.getElementById('send-contact-form').style.visibility = "hidden";
			document.getElementById('cancel-contact-form').value = "Close";

			// document.getElementById('message').innerHTML = data.error;
		} else {
			document.getElementById('contactmessage').innerHTML = data.error;
		}
		hideloader();
	}

}

function sendTeachRequest() {

	xname = $("#full-name-teacher").val();

	xmail = $("#teacher-email").val();

	xcomment = $("#teacher-message").val();
	viewloader();
	var dataString = 'fullname=' + encodeURIComponent(xname) + '&email='
			+ encodeURIComponent(xmail) + '&comment='
			+ encodeURIComponent(xcomment);

	$.ajax({
		type : 'POST',
		url : 'modules/header/php/sendteachmail.php',// xPathContactUs,//'modules/header/php/sendhelpmail.php?val=help',
		data : dataString,
		success : showResponse,
		dataType : 'json'
	});
}
function showResponse(data, statusText) {

	if (statusText == 'success') {
		if (data.success == 'OK') {
			document.getElementById('teaching-message').innerHTML = data.msg;
			$("#full-name-teacher").val('');
			$("#teacher-email").val('');
			$("#teacher-message").val('');

			// document.getElementById('message').innerHTML = data.error;
		} else {
			document.getElementById('teaching-message').innerHTML = data.error;
		}
		hideloader();
	}

}

function activecontact() {

	/*
	 * $('div#contact-us-modal-div').modal ({ opacity: 85, zIndex:9999999,
	 * //position:["30%","40%"], overlayCss: { backgroundColor: "#000" }
	 * 
	 * });
	 */
	$('#contactUsModal').modal('show');
	$("#contactUsModal #full-name-txtF").val(xnameuser);

	$("#contactUsModal #email-txtF").val(xmail);

}
function activeflag(xTitle, xType) {

	/*
	 * $('div#uploadflag').modal ({ opacity: 20, zIndex:9999999,
	 * //position:["30%","40%"], overlayCss: { backgroundColor: "#000" }
	 * 
	 * });
	 */
	$('#btn-flag-close').html("Close");
	$('#btn-flag-save').html("Send");
	$('#btn-flag-close').show();
	$('#btn-flag-save').show();
	$('#FlagLessonModal').modal('show');

	document.getElementById('full-name-flag').value = xArrayJson.nameuser;
	document.getElementById('email-flag').value = xArrayJson.email;
	if (xTitle != '') {
		document.getElementById('btn-flag-save').onclick = function() {
			addflag(xTitle, xType);
		}

	} else {
		document.getElementById('btn-flag-save').onclick = function() {
			addflag('', xType);
		}
	}

}

function addflag(xTitle, xType) {

	xvaltopic = $('#topic-flag').val();// document.getElementById('topic-flag').value
	xname = $('#full-name-flag').val();// document.getElementById('full-name-flag').value
	xmail = $('#email-flag').val();// document.getElementById('email-flag').value
	xsubject = $('#subject-flag').val();// document.getElementById('subject-flag').value
	// xtype=$('#type').val();//document.getElementById('subject-flag').value
	// alert(document.getElementById('usercomment').value);
	// fa
	$('#btn-flag-close').html("Close");
	$('#btn-flag-save').html("Send");
	$('#btn-flag-close').show();
	$('#btn-flag-save').show();
	xcomment = $('#usercomment-flag').val();// document.getElementById('usercomment-flag').value
	if (xTitle != '' && typeof xTitle !== "undefined") {
		xlesson = xTitle;
	} else {
		xlesson = xTitleFlag;
	}

	viewloader();
	var dataString = 'iduser=' + xiduser + '&topic='
			+ encodeURIComponent(xvaltopic) + '&name='
			+ encodeURIComponent(xname) + '&email=' + encodeURIComponent(xmail)
			+ '&subject=' + encodeURIComponent(xsubject) + '&comment='
			+ encodeURIComponent(xcomment) + '&lesson='
			+ encodeURIComponent(xlesson) + '&type='
			+ encodeURIComponent(xType);

	$.ajax({
		type : 'POST',
		url : '/modules/flaglesson/php/flaglesson.php',// xPathFlag,//'modules/flaglesson/php/flaglesson.php',
		data : dataString,
		success : showResponseflag,
		dataType : 'json'
	});
}
function showResponseflag(data, statusText) {

	if (statusText == 'success') {

		if (data.success == 'OK') {// alert('Class saved!');

			document.getElementById('flag-lesson-message').innerHTML = data.msg;
			document.getElementById('btn-flag-save').style.visibility = "hidden";
			$('#btn-flag-close').hide();
			setTimeout(function() {
				$('#FlagLessonModal').modal('hide');

			}, 2000);

		} else {

			document.getElementById('flag-lesson-message').innerHTML = data.error;
		}

		hideloader();

	}
}

// xMod 1 - only OK 2 - OK and close
function alertbox(xTitle, xMsg, xMod, xFuncOK, xFuncKO) {

	if (xFuncOK == null) {
		xFuncOK = '';
	}
	$("#btn-dialog-save").removeAttr('onClick');
	$("#btn-dialog-close").removeAttr('onClick');
	// alert(xFuncOK);
	// $( "#dialog-box-title" ).html(xTitle);
	$("#genericModal #myModalLabel").html(xTitle);

	document.getElementById('idmessage').innerHTML = xMsg;
	$("#btn-dialog-close").show();
	$("#btn-dialog-save").show();
	if (xMod == 1) {
		$("#btn-dialog-close").html("OK");
		$("#btn-dialog-save").hide();
	}
	if (xMod == 2) {
		$("#btn-dialog-close").addClass('buttons-visible');
		$("#btn-dialog-close").html("Close");

		$("#btn-dialog-save").attr('onClick', xFuncOK + 'return false;');
		$("#btn-dialog-save").html("OK");
	}
	if (xMod == 3) {
		$("#btn-dialog-close").addClass('buttons-visible');
		$("#btn-dialog-close").attr('onClick', xFuncKO + 'return false;');
		$("#btn-dialog-close").html("Close");

		$("#btn-dialog-save").attr('onClick', xFuncOK + 'return false;');
		$("#btn-dialog-save").html("OK");
	}
	$('#genericModal').modal('show');

}

function activepreview(xval, xid) {
	if (IPADPreview == '') {
		$('div#preview').modal({
			opacity : 85,
			zIndex : 9999999,
			// position:["30%","40%"],
			overlayCss : {
				backgroundColor : "#000"
			}

		});

		// removeElement('videohtml');
		inittrailerplayer(xval);

	} else {

		// removeElement('videoplaypreview');
		location.href = xPathVideoHTML + "?xid=" + xid + "&redirect="
				+ encodeURIComponent(document.location.href);// "videohtml.php?xid="+xid+"&redirect="+encodeURIComponent(document.location.href);

	}

}
function removeElement(divNum) {

	var d = document.getElementById('flashContent');

	var olddiv = document.getElementById(divNum);

	d.removeChild(olddiv);

}
// 1-success;2-error;3-info
function msg(xName, xStatus, xMsg) {
	xClass = '';

	if (xStatus == 1) {
		xClass = "alert alert-success";
	}
	if (xStatus == 2) {
		xClass = "alert alert-danger";
	}
	if (xStatus == 3) {
		xClass = "alert alert-info";
	}
	$("#" + xName).attr('class', xClass);
	$("#" + xName).html(xMsg);
	document.getElementById(xName).style.display = "block";

	setTimeout(function() {
		$("#" + xName).fadeOut("slow", function() {
			document.getElementById(xName).style.display = "none";
		});

	}, 10000);
}

// xType - type:COURSE/VIDEO
// xName - Name video o lesson
// xID - Id of lement to insert into favorite
function addFavoriteExecution(xType, xName, xID, xArea) {
	var dataString = 'iduser=' + xiduser + '&name=' + encodeURIComponent(xName)
			+ '&type=' + xType + '&area=' + xArea;

	$.ajax({
		type : 'POST',
		url : '/modules/favorite/php/favorite.php?op=add&val=' + xID,// 'modules/favorite/php/favorite.php?op=add&val='+xval,
		data : dataString,
		success : showResponsefavoriteexecution,
		dataType : 'json'
	});

}
function showResponsefavoriteexecution(data, statusText) {

	if (statusText == 'success') {

		if (data.success == 'OK') {// alert('Class saved!');
			addFavoriteCourseToJson(data.idfavorite, data.idaddfavorite,
					data.area);
			// document.getElementById('favorites-menu').innerHTML=data.favorite;
			// document.getElementById('add-to-favorite-message').innerHTML=data.msg;
			$('#add-Favorite-Modal').modal('hide');
			// document.getElementById('ok-add-to-favorites').style.visibility="hidden";
			// document.getElementById('cancel-add-to-favorites').value="Close";

		} else {
			$('#add-to-favorite-message').html(data.msg);
			$('#ok-add-to-favorites').hide();
			$('#cancel-add-to-favorites').html("OK");
			// alertbox(xPhpVideoPageMsg.AlertVideoHeader,data.msg,1);
			// document.getElementById('add-to-favorite-message').innerHTML=data.msg;
			// document.getElementById('ok-add-to-favorites').style.visibility="hidden";
			// document.getElementById('cancel-add-to-favorites').value="Close";
		}

		hideloader();

	}
}

// xType - type:COURSE/VIDEO
// xName - Name video o lesson
// xID - Id of lement to insert into favorite
// xArea - browsepage/coursedetail/videopage
// xObject - object to pass
function activefavorite(xType, xName, xID, xArea) {

	$('#ok-add-to-favorites').html("Yes");
	$('#cancel-add-to-favorites').html("No");
	$('#add-to-favorite-message').html("");
	$('#ok-add-to-favorites').show();
	$('#cancel-add-to-favorites').show();
	if (xType == "COURSE") {
		document.getElementById('favoriteobject').innerHTML = 'course "'
				+ xName + '"';
		document.getElementById('ok-add-to-favorites').setAttribute(
				"onclick",
				"javascript:addFavoriteExecution('" + xType + "','" + xName
						+ "'," + xID + ",'" + xArea + "');return false;");

	} else {
		document.getElementById('favoriteobject').innerHTML = 'video "' + xName
				+ '"';
		document.getElementById('ok-add-to-favorites').setAttribute(
				"onclick",
				"javascript:addFavoriteExecution('" + xType + "','" + xName
						+ "'," + xID + ",'" + xArea + "');return false;");
	}
	$('#add-Favorite-Modal').modal('show');

}

function hideloader() {

}
function viewloader() {

}

function openTeachModal() {
	$('#continueTeach').click(function() {
		saveTitleContent();
	});
	$('#course-title').on('keydown', function(e) {
		if (e.which == 13) {
			saveTitleContent();
			e.preventDefault();
		}

	});
	$('#teachModal').modal('show');

}
function saveTitleContent() {
	$('#continueTeach').addClass("disabled");
	$('#continueTeach').attr("disabled", "disabled");
	if ($('#course-title').val() != "") {
		$.ajax({
			type : 'POST',
			url : '/modules/create-content/php/saveContentTitle.php',// 'modules/favorite/php/favorite.php?op=add&val='+xval,
			data : "title=" + encodeURIComponent($('#course-title').val()),
			success : function(data) {
				if (data.userLogged == 1) {
					window.location = "/teach/create/" + data.contentid;
				} else {
					$("#savetitle-alert").css("display", "");
					$("#savetitle-alert").html(
							'You must be logged in to create new content!');
					$("#savetitle-alert").removeClass("hidden").show();
					setTimeout(function() {
						$("#savetitle-alert").fadeOut('slow');
					}, 10000); // <-- time in milliseconds
				}
			},
			error : function(xhr, ajaxOptions, thrownError) {
				console.log(thrownError);

			},
			dataType : 'json'
		});
	} else {
		$("#savetitle-alert").css("display", "");
		$("#savetitle-alert").html('Insert Title');
		$("#savetitle-alert").removeClass("hidden").show();
		setTimeout(function() {
			$("#savetitle-alert").fadeOut('slow');
		}, 10000); // <-- time in milliseconds
	}
}
if ($('#teachdropdown').length) {
	$('#teachdropdown').click(function() {
		// openTeachModal()
	});
}