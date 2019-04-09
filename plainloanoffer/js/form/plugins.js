// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function () {};
  var methods = [
    'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
    'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());

// Place any jQuery/helper plugins in here.

$(function() {
    'use strict';
    var $uniformed = $("select");
    $uniformed.uniform();
});

// initialize a validator instance from the "FormValidator" constructor.
// A "<form>" element is optionally passed as an argument, but is not a must
// var validator = new FormValidator({"events" : ['blur', 'input', 'change']}, document.forms[0]);
var validator = new FormValidator({"events" : ['focusout']}, document.forms[0]);
    $('.b2cform').submit(function(event) {
        event.preventDefault();
         var noSleep = new NoSleep();
          noSleep.enable(); // keep the screen on!
        var $form = $(this);
        validatorResult = validator.checkAll(document.forms[0]);
        if (validatorResult.valid) {
            $('html, body').animate({
                scrollTop : 200
            }, 500);
            $('#processing_html').removeClass('hide').addClass('show');
            $('.b2cform').addClass('hide');
             $('#processing_html').focus();
             var d = $form.find(":not(.b2c-dont-send)").serialize().replace(new RegExp("", "g"), "");
            $.ajax({
            url: 'api/leadsmarket.php'+ "?" + d,
		 	cache: false,        
			complete: function (xhr, status) {
			  if (status === 'error' || !xhr.responseText) {
				  //alert('completeerror');
				  console.log(error);
				  console.log(xhr.responseText);
				  //alert(status);
			  }
			  else {
			   console.log('It Works!123');
			   console.log(xhr.responseText);
			   e = $.parseJSON(xhr.responseText);
			   console.log(e.Result+"   "+e.RedirectURL);
			   if(e.Result == 'Accepted' && e.RedirectURL != '')
				window.location.href = e.RedirectURL;
			  else if(e.Result == 'Rejected') {
					window.location.href = 'reject.html';
			   }
			   else if(e.Result == 'Duplicate') {
					window.location.href = 'duplicate.html';
			   }
			    else if(e.Result == 'Errors') {
				//	alert('errors'+e.Messages+e.Errors);
				var messages = '<ul>';
					messages += '<li>'+e.Messages.Message+'</li>';	
					$.each(e.Messages, function(index, value){
						if(typeof value.Message != 'undefined')
						messages += '<li>'+value.Message+'</li>';													
					});
					
					messages += '</ul>';
					//alert(messages);
					var errors = '<ul>';
					$.each(e.Errors, function(index, value){
					    //value = $.parseJSON(value);
					    if(typeof value.Error.Field != 'undefined' && typeof value.Error.Description != 'undefined' )
						errors += '<li>'+value.Error.Field+':'+value.Error.Description+'</li>';													
					});
					errors += '</ul>';
					//alert('errors'+errors)
					console.log('errors'+errors);
				    $('#processing_html').addClass('hide').removeClass('show');
                      $('.b2cform').removeClass('hide');
					if($('#msgDiv').length > 0) {
					$('#msgDiv').html("Please check the below errors.<br/>"+errors);
					}
					//g(" ", m, !1);
			   }
			  }
			},
        success: function(e) {
			 e = $.parseJSON(e);
			if(e.Result == 'Accepted' && e.RedirectURL != '')
				window.location.href = e.RedirectURL;
			  else if(e.Result == 'Rejected') {
					window.location.href = 'reject.html';
			   }
			   else if(e.Result == 'Duplicate') {
					window.location.href = 'duplicate.html';
			   }
			    else if(e.Result == 'Errors') {
				//	alert('errors'+e.messages+e.Errors);
					var messages = '<ul>';
					messages += '<li>'+e.Messages.Message+'</li>';	
					$.each(e.Messages, function(index, value){
						if(typeof value.Message != 'undefined')
						messages += '<li>'+value.Message+'</li>';													
					});
					
					messages += '</ul>';
					//alert(messages);
					var errors = '<ul>';
					$.each(e.Errors.Error, function(index, value){
						errors += '<li>'+value.Field+':'+value.Description+'</li>';													
					});
					errors += '</ul>';
					//alert('errors'+errors)
					console.log('errors'+errors);
				    $('#processing_html').addClass('hide').removeClass('show');
                      $('.b2cform').removeClass('hide');
					if($('#msgDiv').length > 0) {
					$('#msgDiv').html("Please check the below errors.<br/>"+errors);
					}
					//g(" ", m, !1);
			   }
        },
        type: "get",
        dataType: "jsonp"
    });
        }
    });
    // on form "submit" event
/*document.forms[0].onsubmit = function(e){
  var submit = true,
    validatorResult = validator.checkAll(this);

  console.log(validatorResult);
  return !!validatorResult.valid;
};*/

// on form "reset" event
document.forms[0].onreset = function(e){
    validator.reset();
};

 // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function(){
      validator.settings.alerts = !this.checked;

      if( this.checked )
        $('form .alert').remove();
    }).prop('checked',false);
