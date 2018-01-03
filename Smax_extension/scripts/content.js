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




//Smax click
$(document).on('click', '.message', function () {
    console.log("smax");
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

    // linksList.innerHTML = request.data;


    linksList.insertAdjacentHTML('beforeend', html);
    sendResponse({
        data: data,
        success: true
    });
});
