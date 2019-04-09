$(function () {
    lmpost = {};
    lmpost.options = {
        campaignid: '',
        testresult: '',
        leadtypeid: 44,
        domain: '',
        form: ''
    };

    lmpost.urls = {
        hitUrl: '',
        supportUrl: '',
        apiUrl: '',
        submitUrl: ''
    };

    lmpost.registerHit = function () {
        var script = document.createElement('script');
        script.setAttribute('type', 'text/javascript');
        script.setAttribute('src', lmpost.urls.hitUrl);
        document.getElementsByTagName('head')[0].appendChild(script);
    };

    lmpost.blinkErrorElements = function (root) {
        var colorArray = new Array("#fff", "#F94722", "#FFFFFF", "#F94722", "#FFFFFF", "#FEE0DA");
        if (!root) root = jQuery;
        root.find(':visible.error').animate({
            backgroundColor: colorArray[1]
        }, 150)
                    .animate({
                        backgroundColor: colorArray[2]
                    }, 100)
                    .animate({
                        backgroundColor: colorArray[3]
                    }, 100)
                    .animate({
                        backgroundColor: colorArray[4]
                    }, 100)
                    .animate({
                        backgroundColor: colorArray[5]
                    }, 100, function () {
                        $(this).removeAttr('style');
                    });
    };

    var isNumeric = function (n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    };

    lmpost.calculateAPR = function (amount, totalFee, numberOfDays) {
        var apr = 0,
		    inputReady = isNumeric(amount) && isNumeric(totalFee) && isNumeric(numberOfDays) && amount > 0 && numberOfDays > 0;

        if (!inputReady) {
            return -1;
        }

        apr = 36500 * (totalFee / amount / numberOfDays);

        return apr;
    };

    lmpost.displayForm = function (dv) {
        var script = document.createElement('script');
        script.setAttribute('id', 'leadsb2cformsrc');
        script.setAttribute('type', 'text/javascript');
        script.setAttribute('src', lmpost.options.domain + 'scripts/forms.core.js');
        dv.appendChild(script);
    };

    lmpost.initFormLink = function() {
        // Init redirection from main form.
        $('form.apply-now a.btn-cash').on('click',
            function() {
                var elem = $(this),
                    form = elem.closest('form');

                if (form.validate) {
                    form.validate(
                        {
                            errorPlacement: function(error, element) {
                            }
                        }
                    );
                    if (!form.valid()) {
                        lmpost.blinkErrorElements();
                        return false;
                    }
                } //if

                var queryParams = form.find(':not(.b2c-dont-send)').serialize(),
                    targetUrl = lmpost.urls.supportUrl,
                    href = elem.attr('href'),
                    ltid = href.toLowerCase().indexOf('title') > 0 ? 18 : 9;

                $.ajax(
                    {
                        url: targetUrl + '?action=subscribe&responsetype=json&uid=' + lmpost.options.hituid + '&LeadTypeID=' + ltid + '&PathID=1&' + queryParams,
                        type: 'get',
                        dataType: 'jsonp',
                        timeout: 1000,
                        complete: function() {
                            window.location.href = href + '?' + (queryParams || '').replace(/\+/g, '%20');
                        }
                    }
                );

                return false;
            }
        );
    };

    lmpost.registerHit();

    lmpost.initFormLink();

    var lmpostform = $('#lmpostform');
    if (lmpostform.length) { lmpost.displayForm(lmpostform[0]); };

    $('.form-apply-wrap #RequestedAmount').before("<em class='ico-amount'></em>");
    $('.form-apply-wrap #FName').before("<em class='ico-name'></em>");
    $('.form-apply-wrap #LName').before("<em class='ico-name'></em>");
    $('.form-apply-wrap #Email').before("<em class='ico-email'></em>");
    $('.form-apply-wrap #ZipCode').before("<em class='ico-code'></em>");

    $(".r-popup, .form-popup").fancybox({
        'width': 960,
        'height': 550,
        'margin': 5,
        'autoDimensions': false
    });

    $(".r-calculate").fancybox({
        'width': 470,
        'height': 480,
        'margin': 5,
        'autoDimensions': false
    });
    $(".r-calculate").click(function () {
        $('#r-calculate').load('_apr-calculator.html');
    });

    $(".r-rules").click(function () {
        $('#r-rules').load('_apr-rules.html');
    });

    $(".r-loan").click(function () {
        $('#r-loan').load('_apr-loan.html');
    });

    $(".r-military").click(function () {
        $('#r-military').load('_apr-military.html');
    });

    $(".privacy-popup").click(function () {
        $('#privacy-popup').load('_privacypolicy.html');
    });

    $(".terms-popup").click(function () {
        $('#terms-popup').load('_terms.html');
    });

    $(".disclaimer-popup").click(function () {
        $('#disclaimer-popup').load('_disclaimer.html');
    });

    //Press enter on Home form
    $(".form-apply input").focus(function () {
        $(this).keypress(function (e) {
            var key = e.which;
            if(key == 13)  
            {
                $('.form-apply .btn-cash').click();
                return false;  
            }
        });   
    });

    var getZip = function (cb) {
        if (document.location.protocol === navigator.geolocation != null) {
            return navigator.geolocation.getCurrentPosition(function (pos) {
                var coords, url;
                coords = pos.coords;
                url = "//nominatim.openstreetmap.org/reverse?format=json&lat=" + coords.latitude + "&lon=" + coords.longitude + "&addressdetails=1";
                return $.ajax({
                    url: url,
                    dataType: 'jsonp',
                    jsonp: 'json_callback',
                    cache: true
                }).success(function (data) {
                    return cb(data.address.postcode);
                });
            });
        }
        else {
            alert("Sorry, Your zip code is not defined")
        }
    };
    $(".getZip").click(function () {
        getZip(function (zipcode) {
            $("#ZipCode").val(zipcode);
        });
        return false;
    })
    // var requestAmount = '<select name="RequestedAmount" id="RequestedAmount"><option value="">Select Loan Amount</option><option value="100">\$100</option><option value="200">\$200</option><option value="300">\$300</option><option value="400">\$400</option><option value="500">\$500</option><option value="600">\$600</option><option value="700">\$700</option><option value="800">\$800</option><option value="900">\$900</option><option value="1000">\$1000</option><option value="1500">\$1500</option><option value="2000">\$2000</option><option value="2500">\$2500</option><option value="3000">\$3000</option><option value="3500">\$3500</option><option value="4000">\$4000</option><option value="4500">\$4500</option><option value="5000">\$5000</option></select>';
    // $("select#RequestedAmount").html(requestAmount);
});

