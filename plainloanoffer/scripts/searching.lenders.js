
(function slendres(instrumented) {
    if (!instrumented && window.runInstrumented) {
        runInstrumented(slendres, 'slendres');
        return;
    }

    var opts = lmpost.options, processingTemplate;

    if (lmpost.options.appOptions.templates.useCustomProcessingTemplate) {
        processingTemplate = lmpost.options.appOptions.templates.processingTemplate;
    } else {
		processingTemplate = "<div class=\"b2c-search\">"
						+ "<h1 class=\"b2c-searching-title\">WAITING PAGE<\/h1>"
                         /*+ "<h1 class=\"b2c-searching-title\">Please wait while we process your request with our panel of authorized lending partners.<\/h1>"
                         + "<h2 class=\"b2c-search-subtitle\">Check your email for loan confirmation or available storefront lenders and other exclusive offers.<\/h2>"
                         + "<h3 class=\"b2c-search-subtitle\">Do not close this window while the form is processing.<\/h3>"
                         + " <p class=\"b2c-search-subtitle\">Form processing<\/p>"
                         + " <p class=\"b2c-search-percent\" id=\"search-percent\">0%<\/p>"
                         + " <div class=\"b2c-search-loading-wrap\">"
                         + " <div class=\"b2c-search-loading\" id=\"search-loading\" style=\"width: 0%\">"
                         + " <\/div><\/div>"
                         + " <p>If you are connected with one of our authorized lending partners,<\/p>"
                         + " <p>you will be redirected to an electronic signature page to review the loan terms.</p>"
                         + " <p>In some cases, you may be directed to a local storefront location for your loan.<\/p>"*/
                         + "<\/div>";
		var templateHtml = '';
		alert('test');
		$.get( "processing.html", function( data ) {
			// the contents is now in the variable data
			console.log(data);
			templateHtml =  data;
			alert('top'+templateHtml);
		});
		if(templateHtml != '')
			processingTemplate = templateHtml;
		});			
    }
	alert(processingTemplate);
    opts.appOptions.templates.processingTemplate = processingTemplate;

    var startTime;

    var responseReceived = false;
    var loaded = 0;

    //Init callbacks and deffered elemennts.
    var beforeSendData = function () {
        startTime = new Date().getTime();
        window.scrollTo(0, 0);
        ChangeLoaded();
    };

    opts.onBeforeSend = beforeSendData;
    var origSuccess = opts.onSuccess;
    opts.onSuccess = opts.onError = function (data, defaultHandler) {
        var result = 0,
        finalize = function () {
            responseReceived = true;
            FastFillProgressBar();
            if (origSuccess)
            { result = origSuccess(data, defaultHandler); }
            else {
                if (defaultHandler) { result = defaultHandler(data); }
            }
        };

        if (!data) {
            return;
        }

        if (data.Result == 0 && lmpost.options.appOptions.noRedirect) {
            return -1; // If is still processing just ignore custom actions.
        };

        if ( data.Result == 4) {
            finalize();
            return 0;
        }
        else {
            window.setTimeout(finalize, 10000);
        }

        return result;
    };

    function ChangeLoaded() {
        if (!responseReceived) {
            loaded = loaded + Math.floor(Math.random() * 5);
            if (loaded > 100) {
                loaded = 0;
            }
            $('#search-loading').attr('style', 'width:' + loaded + '%');
            $('#search-percent').text(loaded + '%');
            window.setTimeout(function () {
                ChangeLoaded(loaded);
            }, 300 + Math.floor(Math.random() * 2000));
        }
    };

    function FastFillProgressBar(redirectUrl) {
        if (loaded < 100) {
            loaded++;
            $('#search-loading').attr('style', 'width:' + loaded + '%');
            $('#search-percent').text(loaded + '%');
        }
    };

})()

