var $stripeParameters;

function initializeStripe($handler) {

	var handler = StripeCheckout.configure({
		key : $handler.key,
		image : $handler.image,
		name : $handler.name,
		description : $handler.description,
		amount : $handler.amount,
		allowRememberMe : $handler.allowRememberMe,
		email : $handler.email,
		panelLabel : $handler.panelLabel,
		currency : $handler.currency,
		opened : $handler.opened,
		closed : $handler.closed,
		email : $handler.email,
		token : $handler.token,
		initUrl : $handler.initUrl,
		initPopup : $handler.initPopup,
		afterUrl : $handler.afterUrl,
		afterPopup : $handler.afterPopup,
		postPay : $handler.postPay,
		zipCode : false
	});
	$stripeParameters = $handler;

	return handler;

}

function processToken($token, $amount, $typelesson, $version, $Courses) {
	$returnmsg = "";
	console.log($Courses);
	alertbox('Checkout', 'We are processing your request...', 1);
	$("#btn-dialog-close").html('<i class="fa fa-refresh fa-spin"></i>');
	$("#btn-dialog-close").prop('disabled', true);
	var dataString = 'token=' + JSON.stringify($token) + '&courses='
			+ JSON.stringify($Courses) + '&WLidentifier=' + $writelogIdentifier
			+ '&WLlogcount=' + $writelogLogcount;
	$.ajax({
		type : 'POST',
		async : true,
		url : '/modules/cart/php/processToken.php?postPay='
				+ $stripeParameters.postPay + '&amount=' + $amount
				+ '&typelesson=' + $typelesson + '&version=' + $version,
		data : dataString,
		success : function(data) {
			if (data.cognitoNewUser==1){
				if (COGNITO_AUTH=="NO"){
				}else{
					var poolData = {
						UserPoolId: COGNITO_USER_POOL_ID,
						ClientId: COGNITO_USER_POOL_CLIENT_ID                
					};
					var userPool = new AmazonCognitoIdentity.CognitoUserPool(poolData);

					var attributeList = [];

					var dataEmail = {
						Name: 'email',
						Value: data.email.toLowerCase()
					};

					// var dataName = {
					//     Name: 'name',
					//     Value: newuser.name
					// };

					var attributeEmail = new AmazonCognitoIdentity.CognitoUserAttribute(dataEmail);
					// var attributeName = new AmazonCognitoIdentity.CognitoUserAttribute(dataName);

					attributeList.push(attributeEmail);
					// attributeList.push(attributeName);


					userPool.signUp(data.email.toLowerCase(), data.CGNpassword, attributeList, null, function(err, result) {
						if (err) {
							console.log(err);
							
						} else {
														
							jQuery.ajax({
								type : 'GET',
								
								url : '/modules/login/php/validateNewCognitoUser.php?cognitoid=' + result.userSub + '&email='+data.email.toLowerCase()+'&password=' +data.CGNpassword,
								dataType : 'json'
							});
						}
					});
				}
			}
			if (data.PaymentExecuted && data.operationSuccess) {
				//sendAnalytics(0,false,false,'N.D.');
				paymentExecuted("stripe", data.VIC, "VIC");
			}
			$("#btn-dialog-close").html('OK');
			$("#btn-dialog-close").prop('disabled', false);
			if ($stripeParameters.afterUrl) {
				setTimeout(function (){
					window.location.href = ($stripeParameters.afterUrl);
				}, 1000);
			} else {

			}
			if ($stripeParameters.afterPopup) {
				// alert("Chiamo Popup");
				if (data.errormessages != "") {
					stripeAfterPopupResult(data);

				} else {

				}
			} else {

			}
			if ($stripeParameters.postPay) {

			} else {

			}

			console.log(data);
			$returnmsg = data.result;

		},
		dataType : 'json'
	});
	return $returnmsg;
}
