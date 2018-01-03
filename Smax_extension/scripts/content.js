/*
chrome.runtime.onMessage.addListener(function (request, sender, sendResponse) {
    console.log("something happening from the extension");
    var data = request.data || {};

    var linksList = document.querySelectorAll('a');
    
    [].forEach.call(linksList, function (header) {
        header.innerHTML = request.data;
    });
    sendResponse({
        data: data,
        success: true
    });
});
*/

$(document).on('click', '.exc-icon-inner', function () {

    if ($('.exc-expand').is(":visible")) {

    } else {

        $('.exc-expand').show();
        $('.exc-icon-inner img').hide();
    }


});
$(document).on('click', '.exc-close', function () {

    if ($('.exc-expand').is(":visible")) {
        $('.exc-expand').hide();
        $('.exc-icon-inner img').show();
    }


});


var style = "<style type='text/css' id='exc-style'>.exc-box *{box-sizing:border-box;line-height:1.2}.exc-box{width:70px;height:70px;position:fixed;bottom:50px;right:20px;z-index:999}.exc-icon{width:70px;height:70px;background-color:rgba(239,1,23,0.3);padding:5px;border-radius:50%;position:relative}.exc-icon::before{width:100%;height:100%;content:'';display:block;position:absolute;z-index:1;border:1px solid #ef0117;top:0;left:0;border-radius:50%;box-sizing:border-box;animation-name:zoom;animation-duration:1s;animation-iteration-count:infinite;opacity:0}.exc-icon-inner{width:60px;height:60px;background-color:#ef0117;position:relative;z-index:2;color:#fff;line-height:60px;font-size:30px;border-radius:50%;text-align:center;cursor:pointer;padding:10px 0 0}.exc-icon-inner .phone-icon{display:block;width:40px;height:40px;margin:0 auto;background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAADdcAAA3XAUIom3gAAAAHdElNRQfiAQIFMQogct1VAAAB80lEQVRIx53UW2iPcRzH8Z9ziyutyQwRc6GW0cStG9y4ciUXY+UQIy7MMaK0CGXlkLiiNTeSKOVCuVg5LCFt5IKh1ErR2mb2f7nY8/z3Pz3/g8/V8z29n+f3/X6fXwglpN19LeaUyksGPARjuh3+L4wTPov1w8aktFqX9GgxpWB0hZN6QMpF0/MTluiP3nG7MCKEEGwyAHrUJ5WXQtR6An5bPuGcnXHGAgg7NWZYk7T5g3eqYtcN+bqVUTCIL86ZmfbtB9dis18hrYyiNcYiT2/sC8EDsHncGCgIaEsn12jxFIxojnzVvuGneSEEHwuUD+WujFZDGIn7YZ0UjoUQPM4rT9lWYAJNhtEb90I3Xk+0JLN8e8IQ94DTkXUQ1AeL0m0a16mQKM/wIXpeIIXjIQR3swBXigB2gBUZh3gTQtAglXWEtYmAas/d1BRZa6w3f/zxXtY3vDUtVCarchp5tkJACK7nIPZWCqjyPmeYWypFNBjOQozampNR54jVxRCteTt51Yx0dJdR0GlqMqIjD/HS4hBCsDtj1F3JV05wPg8x7LL2rE2hsxjijHJ0pxjiaFmI5mLtPOBvScCr4kNt9KIE4EKpvZhsn1+J5V/NLWe56nJ+s1jfLS2jPIJs8CjnyvlkWdnlEWShQ7r0GdSnw6zM2D9qTGmqNCSZQwAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxOC0wMS0wMlQwNTo0OToxMCswMTowMLaNUFQAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTgtMDEtMDJUMDU6NDk6MTArMDE6MDDH0OjoAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==);background-repeat:no-repeat;background-position:center center}.exc-icon-inner img{width:23px;height:23px;border:2px solid #fff;border-radius:50%;position:absolute;bottom:-5px;left:-5px}@keyframes zoom{0%{transform:scale(1);opacity:0}30%{transform:scale(1);opacity:0}50%{opacity:.5}100%{transform:scale(1.5);opacity:0}}.exc-expand{width:220px;border:2px solid #ef0117;height:60px;position:absolute;background-color:#fff;right:30px;top:5px;border-radius:5px 0 0 5px;padding:5px 40px 5px 5px;display:none}.exc-close{display:block;width:15px;height:15px;text-align:center;line-height:15px;font-family:arial;font-size:12px;position:absolute;font-style:normal;top:2px;left:0;z-index:9;cursor:pointer}.exc-close:hover{color:#ef0117}.exc-profile{height:50px;padding:0 0 0 55px}.exc-profile img{float:left;width:45px;height:45px;margin:0 0 0 -55px;border-radius:50%}.exc-profile p{font-weight:600;font-size:13px;font-family:arial;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin:0;padding:2px 0 7px}.exc-btn-sent{color:#fff;font-family:arial;display:inline-block;border-radius:3px;font-size:12px;padding:3px 5px;background-color:#ef0117;cursor:pointer}.exc-btn-sent:hover{opacity:.8}";

var isLogin = false;





function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
        // Logged into your app and Facebook.
        testAPI();
    } else {
        // The person is not logged into your app or we are unable to tell.
        document.getElementById('status').innerHTML = 'Please log ' +
            'into this app.';
    }
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });
}

window.fbAsyncInit = function () {
    FB.init({
        appId: '1989940074582638',
        cookie: true, // enable cookies to allow the server to access 
        // the session
        xfbml: true, // parse social plugins on this page
        version: 'v2.8' // use graph api version 2.8
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });

};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function (response) {
        console.log('Successful login for: ' + response.name);
        document.getElementById('status').innerHTML =
            'Thanks for logging in, ' + response.name + '!';
    });
}




//Smax click
$(document).on('click', '.modal-caption', function () {
    console.log("smax");





    if (isLogin) {



        if ($('#exc-style').length <= 0) {
            $("head").append(style);
        }

        setTimeout(function () {

            var linksList = document.querySelector('body');
            if ($('.exc-box').is(":visible")) {
                $('.exc-profile p').text($('.topbar.bg h3').html());
                $('.exc-profile img').attr('src', $('.topbar.bg img').attr('src'));
                $('.exc-icon-inner img').attr('src', $('.topbar.bg img').attr('src'));



            } else {
                var html = `
 <div class="exc-box">
        <div class="exc-expand">
            <em class="exc-close">X</em>
            <div class="exc-profile">
                <img alt="" src=" ` + $('.topbar.bg img').attr('src') + `" />
                <p>` + $('.topbar.bg h3').html() + `</p>
                <span class="exc-btn-sent">Gửi thông tin</span>
            </div>

        </div>
        <div class="exc-icon">
            <div class="exc-icon-inner">
                <i class="phone-icon">
                </i>

                <img alt="" src="` + $('.topbar.bg img').attr('src') + `" />
            </div>
        </div>
    </div>

`;

                // linksList.innerHTML = request.data;


                linksList.insertAdjacentHTML('beforeend', html);
            }
        }, 300);
    } else {

        if ($('#exc-style').length <= 0) {
            $("head").append(style);
        }

        setTimeout(function () {

            var linksList = document.querySelector('body');
            if ($('.exc-box').is(":visible")) {




            } else {
                var html = `
 <div class="exc-box">
        <div class="exc-expand">
            <em class="exc-close">X</em>
            <div class="exc-profile">
                <img alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAFQElEQVR4Xu2dTWhcVRiGv3PutOJP0YUI9afrahVEhJpJhbRu3CmUaTLopuRPKehehAZBuhAEQcVkoq4kk44gSMGdZGFnAgFdWBXFhVawhYhuLLYx95wyJVCpk+Tc6bnpnfs92c45353zvg/f997JzcQIP6oVMKpPz+EFAJRDAAAAoFwB5cenAwCAcgWUH79nBxge+/B+b9wR5dqU4vjOr3+13Hz5l80O0xOAofr8s8b7L0qhgPZDeF9vL041AUArCACg1fmNcwMAADACNDNAB9DsvogAAAAwAjQzQAfQ7D4jQLn7AAAAjADlDAAAAHAXoJkBOoBm9wmByt0HAABgBChnAAAAgLsAzQzQATS7TwhU7j4AAAAjQDkDAAAA3AVsw4ATWbfiLjgxf5rUXraJW99qixe/T8Q+NBBo0QH+b9M1w70/Y4w5Y9Okk6ye/2lpaWZL0/9bpTrWmBGRkwAwEApcf5NOXGqdfe9fXzm10jp+sd+3DwD9KncL93knF0xij7YXxjs3+zYA4GYV3OH9TtyqSZNqpzXxc4xLA0AMFXeyhpFn2guTX8a6JADEUnIn6hj5pL0w+WLMSwFATDXzruXNY+3FiXMxLwMAMdXMs1bqvmm3pp+IfQkAiK1oTvW8+FOd5tRrscsDQGxFc6pnxD93tjn1eezyABBb0ZzqmdTuP9sa/zFr+UO12X2+khx2zu81xldu3O+MHLHeHM5a95as1/xR8O50bc9S68TfWYQfrs9PpD79wIpNsuwr7FqtAHQ/9l1uTu0SMT7UnFrtdHLe/vVHYuw9oXsKv04rACLyT7s5eUcWg7qt3yX21yx7Cr9WKwDeuUud09N3ZTFoqD6733j7Q5Y9hV8LAOEWPTXaeNga+T58xwCsBIBwk56uffRImqTfhe8YgJUAEG7ScH3ugPcm6sfG4VfPaSUAhAtbHZ1/VIz/NnzHAKwEgHCTAGBDq4H6tnDjPja+8v6NNqd+3S0vTn8dbr/IUO3t221y94Ht9jhx40bkpe3WFeL10ncAI2+2FyZf30mxh4813vVWTuzkNfu+FgD0Ld2mG6ujc5+JMc/Hr5xDRQCIL+pQrbFiEnkyfuUcKgJAfFGHjjV+N1b2xq+cQ0UAiCvqyMhMZe2+B66IFRu3ck7VACCusAdfaDyYpPJb3Ko5VgOAuOIeGps96MQux62aYzUAiCtutT53VLz5NG7VHKsBQFxxq2ONV0TknbhVc6xWdgC8kbduW197o5eEWR8H6z4RtHrnpT1b2bF2JZ0R71/N0bK4pcsOwGZq9fNACL8L2FBzoH4XsAkBALAhDB0gvKPSAegAPA/QZYAREN41Cr+SERBuESOAEcAIYATwTCAZIHxqFH8lGSDcIzIAGYAMQAYgA5ABwqdG8VeSAcI9IgOQAcgAZAAyABkgfGoUfyUZINwjMgAZgAxABiADkAHCp0bxV5IBwj0iA5AByABkADIAGSB8ahR/JRkg3CMyABmADEAGIAOQAcKnRvFXkgHCPSIDkAHIAGXJANdY9i7TP3/w3u4emG//Cm1sWkdAqD6lXwcApbd46wMCAAC0F6eam6lger1Qhj8PV2779ePTAZSjAAAAwAjQzAAdQLP73c9CfJ0OoJkBANDsPh1AufsAAACMAOUMAAAAcBegmQE6gGb3CYHK3QcAAGAEKGcAAACAuwDNDNABNLtPCFTuPgAAACNAOQP9ADBSn733cmoeVy5dKY6f+l3nVlrHL2Z6LLwUJ+cQQQr0/LuAoJ0sKoUCAFAKG/s/BAD0r10pdgJAKWzs/xBXAYxjO9s0VkbPAAAAAElFTkSuQmCC" />
                <p>Yêu cầu đăng nhập</p>

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
                <span class="exc-btn-sent">

<a href="https://www.facebook.com/dialog/oauth?client_id=1989940074582638&redirect_uri=http://page.smax.in&scope=public_profile">
Login facebook</a></span>
            </div>

        </div>
        <div class="exc-icon">
            <div class="exc-icon-inner">
                <i class="phone-icon">
                </i>

                <img alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAFQElEQVR4Xu2dTWhcVRiGv3PutOJP0YUI9afrahVEhJpJhbRu3CmUaTLopuRPKehehAZBuhAEQcVkoq4kk44gSMGdZGFnAgFdWBXFhVawhYhuLLYx95wyJVCpk+Tc6bnpnfs92c45353zvg/f997JzcQIP6oVMKpPz+EFAJRDAAAAoFwB5cenAwCAcgWUH79nBxge+/B+b9wR5dqU4vjOr3+13Hz5l80O0xOAofr8s8b7L0qhgPZDeF9vL041AUArCACg1fmNcwMAADACNDNAB9DsvogAAAAwAjQzQAfQ7D4jQLn7AAAAjADlDAAAAHAXoJkBOoBm9wmByt0HAABgBChnAAAAgLsAzQzQATS7TwhU7j4AAAAjQDkDAAAA3AVsw4ATWbfiLjgxf5rUXraJW99qixe/T8Q+NBBo0QH+b9M1w70/Y4w5Y9Okk6ye/2lpaWZL0/9bpTrWmBGRkwAwEApcf5NOXGqdfe9fXzm10jp+sd+3DwD9KncL93knF0xij7YXxjs3+zYA4GYV3OH9TtyqSZNqpzXxc4xLA0AMFXeyhpFn2guTX8a6JADEUnIn6hj5pL0w+WLMSwFATDXzruXNY+3FiXMxLwMAMdXMs1bqvmm3pp+IfQkAiK1oTvW8+FOd5tRrscsDQGxFc6pnxD93tjn1eezyABBb0ZzqmdTuP9sa/zFr+UO12X2+khx2zu81xldu3O+MHLHeHM5a95as1/xR8O50bc9S68TfWYQfrs9PpD79wIpNsuwr7FqtAHQ/9l1uTu0SMT7UnFrtdHLe/vVHYuw9oXsKv04rACLyT7s5eUcWg7qt3yX21yx7Cr9WKwDeuUud09N3ZTFoqD6733j7Q5Y9hV8LAOEWPTXaeNga+T58xwCsBIBwk56uffRImqTfhe8YgJUAEG7ScH3ugPcm6sfG4VfPaSUAhAtbHZ1/VIz/NnzHAKwEgHCTAGBDq4H6tnDjPja+8v6NNqd+3S0vTn8dbr/IUO3t221y94Ht9jhx40bkpe3WFeL10ncAI2+2FyZf30mxh4813vVWTuzkNfu+FgD0Ld2mG6ujc5+JMc/Hr5xDRQCIL+pQrbFiEnkyfuUcKgJAfFGHjjV+N1b2xq+cQ0UAiCvqyMhMZe2+B66IFRu3ck7VACCusAdfaDyYpPJb3Ko5VgOAuOIeGps96MQux62aYzUAiCtutT53VLz5NG7VHKsBQFxxq2ONV0TknbhVc6xWdgC8kbduW197o5eEWR8H6z4RtHrnpT1b2bF2JZ0R71/N0bK4pcsOwGZq9fNACL8L2FBzoH4XsAkBALAhDB0gvKPSAegAPA/QZYAREN41Cr+SERBuESOAEcAIYATwTCAZIHxqFH8lGSDcIzIAGYAMQAYgA5ABwqdG8VeSAcI9IgOQAcgAZAAyABkgfGoUfyUZINwjMgAZgAxABiADkAHCp0bxV5IBwj0iA5AByABkADIAGSB8ahR/JRkg3CMyABmADEAGIAOQAcKnRvFXkgHCPSIDkAHIAGXJANdY9i7TP3/w3u4emG//Cm1sWkdAqD6lXwcApbd46wMCAAC0F6eam6lger1Qhj8PV2779ePTAZSjAAAAwAjQzAAdQLP73c9CfJ0OoJkBANDsPh1AufsAAACMAOUMAAAAcBegmQE6gGb3CYHK3QcAAGAEKGcAAACAuwDNDNABNLtPCFTuPgAAACNAOQP9ADBSn733cmoeVy5dKY6f+l3nVlrHL2Z6LLwUJ+cQQQr0/LuAoJ0sKoUCAFAKG/s/BAD0r10pdgJAKWzs/xBXAYxjO9s0VkbPAAAAAElFTkSuQmCC" />
            </div>
        </div>
    </div>

`;

                // linksList.innerHTML = request.data;


                linksList.insertAdjacentHTML('beforeend', html);
            }
        }, 300);



    }

});


//fanpage
$(document).on('click', '._4k8w._5_n1', function () {
    console.log("smax");
    if ($('#exc-style').length <= 0) {
        $("head").append(style);
    }

    setTimeout(function () {

        var linksList = document.querySelector('body');
        if ($('.exc-box').is(":visible")) {
            $('.exc-profile p').text($('._3ur9 ._3urb').html());
            $('.exc-profile img').attr('src', $('._3ur9 img').attr('src'));
            $('.exc-profile a').attr('href', $('._3ur9 ._3-8w a').attr('href'));
            $('.exc-icon-inner img').attr('src', $('._3ur9  img').attr('src'));



        } else {
            var html = `
 <div class="exc-box">
        <div class="exc-expand">
            <em class="exc-close">X</em>
            <div class="exc-profile">
                <a href=" ` + $('._3ur9 ._3-8w a').attr('href') + `" target="_blank">
                <img alt="" src=" ` + $('._3ur9  img').attr('src') + `" />
</a>

                <p>` + $('._3ur9 ._3urb').html() + `</p>
                <span class="exc-btn-sent">Gửi thông tin</span>
            </div>

        </div>
        <div class="exc-icon">
            <div class="exc-icon-inner">
                <i class="phone-icon">
                </i>
                <img alt="" src="` + $('._3ur9  img').attr('src') + `" />
            </div>
        </div>
    </div>

`;

            // linksList.innerHTML = request.data;


            linksList.insertAdjacentHTML('beforeend', html);
        }
    }, 800);

});


//page.fm
$(document).on('click', '.media.conversation-list-item', function () {
    console.log("page.fm");
    if ($('#exc-style').length <= 0) {
        $("head").append(style);
    }

    setTimeout(function () {

        var linksList = document.querySelector('body');
        if ($('.exc-box').is(":visible")) {
            $('.exc-profile p').text($('.chat-menu .copyable-text').html());
            $('.exc-profile img').attr('src', $('.chat-menu > div > div > a > img').attr('src'));
            $('.exc-profile a').attr('href', $('.chat-menu > div > div > a').attr('href'));
            $('.exc-icon-inner img').attr('src', $('.chat-menu > div > div > a > img').attr('src'));



        } else {
            var html = `
 <div class="exc-box">
        <div class="exc-expand">
            <em class="exc-close">X</em>
            <div class="exc-profile">
                <a href=" ` + $('.chat-menu > div > div > a').attr('href') + `" target="_blank">
                <img alt="" src=" ` + $('.chat-menu > div > div > a > img').attr('src') + `" />
</a>

                <p>` + $('.chat-menu .copyable-text').html() + `</p>
                <span class="exc-btn-sent">Gửi thông tin</span>
            </div>

        </div>
        <div class="exc-icon">
            <div class="exc-icon-inner">
                <i class="phone-icon">
                </i>
                <img alt="" src="` + $('.chat-menu > div > div > a > img').attr('src') + `" />
            </div>
        </div>
    </div>

`;

            // linksList.innerHTML = request.data;


            linksList.insertAdjacentHTML('beforeend', html);
        }
    }, 400);

});






$(document).on('click', '.barleft', function () {
    console.log("bl");
});





chrome.runtime.onMessage.addListener(function (request, sender, sendResponse) {
    console.log("something happening from the extension");
    var data = request.data || {};

    var linksList = document.querySelector('body');

    var html = `
 <div style="background-color:#fff;width: 250px;height: 250px;border-radius: 2px 2px 0px 0px;position: fixed;
                bottom: 0px;right: 20px;z-index: 9999;box-shadow:2px 2px 7px 0px rgba(0,0,0,0.5);overflow: hidden">
        <h3 style="margin: 0px;padding: 8px 10px;text-align: center;color: #fff;font-size: 18px;background-color: #0099fe">Modal ID</h3>
        <div style="text-align: center;padding: 10px 0px">
            <p>ID here</p>
        </div>

    </div>
`;

    linksList.innerHTML = request.data;


    linksList.insertAdjacentHTML('beforeend', html);
    sendResponse({
        data: data,
        success: true
    });
});
