var xCourses = new Object();
var StripeObject = {
	key : xStripeKey,
	image : '/images/mobile-app-icon.png',
	name : 'CGCIRCUIT LLC',
	description : '',
	amount : 5000,
	allowRememberMe : true,
	email : '',
	panelLabel : '',
	currency : 'usd',
	opened : function() {

	},
	closed : '',
	token : function(token, args) {

		$messg = processToken(token, xTot, xCourses['type'], 1, xCourses);

	},
	afterUrl : "",
	afterPopup : true,
	initUrl : "",
	initPopup : "",
	postPay : true
}
var handler = initializeStripe(StripeObject);

function buynow($idlesson, $type, $version, $price) {
	xTot = 0;
	xCourses = [];
	xTot += $price;

	xtmpCourses = new Object();
	xtmpCourses['course'] = $idlesson;
	xtmpCourses['type'] = $type;
	xtmpCourses['version'] = $version;
	xtmpCourses['bundle'] = 0;

	xCourses[0] = xtmpCourses;
	if (xTot > 0) {

		xTot = xTot.replace(".", "");
		SingleObject = {

			amount : xTot,
			email : xmail
		}
		handler.open(SingleObject);
	} else {
		// subscribeworkshop($('#IDCourse').val(),$('#version').val(),'<URI>');
	}

}

function subscribecoursedetail(xval) {
	if (xvalue == 0) {

		alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.SubscribeLesson, 2,
				'javascript:subscribeOK(' + xval + ');');
		// Are you sure to subscribe for this lesson?
	} else {
		alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.LoginForSubscribe,
				2, "javascript:returnlogin('course/"
						+ $tempLessonJSON.title.urlname
								.substring($tempLessonJSON.title.urlname
										.indexOf("course/") + 7) + "');");
		// You must login before subscribe!

	}
}

function subscribetutorialcoursedetail(xval) {
	if (xvalue == 0) {

		alertbox(xPhpHeaderMsg.AlertboxTitle, xPhpHeaderMsg.SubscribeTutorial,
				2, 'javascript:subscribeOKcoursedetail(' + xval + ');');

	} else {
		alertbox(xPhpHeaderMsg.AlertboxTitle,
				xPhpHeaderMsg.LoginForSubscribeTutorial, 2,
				"javascript:returnlogin('course/"
						+ $tempLessonJSON.title.urlname
								.substring($tempLessonJSON.title.urlname
										.indexOf("course/") + 7) + "');");

	}
}
function subscribeOKcoursedetail(xval) {
	viewloader();

	var dataString = 'IdLesson=' + xval + '&IdUser=' + xiduser;

	$.ajax({
		type : 'POST',
		url : xPathHeaderSubscribe + '?val=add',// 'modules/header/php/subscribe.php?val=add',
		data : dataString,
		success : showResponsesubscribecoursedetail,
		dataType : 'json'
	});

}

function showResponsesubscribecoursedetail(data, statusText) {
	if (statusText == 'success') {
		if (data.success == 'OK') {

			addLearningFromCourseToJson(data.idcourse);

			alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);
			location.reload();
			hideloader();
		} else {
			alertbox(xPhpHeaderMsg.AlertboxTitle, data.msg, 1);
			hideloader();
		}
	}
}

function addLearningFromCourseToJson($val) {
	obj = $tempLessonJSON;// json var of browsebage
	var newobj = new Object();

	newobj.idcourse = obj.id;
	newobj.thumbnailPath = obj.images.iconurl;
	newobj.title = obj.title.title;
	newobj.url = "/course/"
			+ obj.title.urlname
					.substring(obj.title.urlname.indexOf("course/") + 7);
	$dataHeader.myCourses.learning.push(newobj);// json var of header

}
