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


$(document).on('click', '.message', function () {
    console.log("message");
    if ($('#exc-style').length <= 0) {
        $("head").append("<style type='text/css' id='exc-style'>.exc-box *{box-sizing:border-box;line-height:1.2}.exc-box{width:70px;height:70px;position:fixed;bottom:50px;right:20px;z-index:999}.exc-icon{width:70px;height:70px;background-color:rgba(239,1,23,0.3);padding:5px;border-radius:50%;position:relative}.exc-icon::before{width:100%;height:100%;content:'';display:block;position:absolute;z-index:1;border:1px solid #ef0117;top:0;left:0;border-radius:50%;box-sizing:border-box;animation-name:zoom;animation-duration:1s;animation-iteration-count:infinite;opacity:0}.exc-icon-inner{width:60px;height:60px;background-color:#ef0117;position:relative;z-index:2;color:#fff;line-height:60px;font-size:30px;border-radius:50%;text-align:center;cursor:pointer}.exc-icon-inner img{width:23px;height:23px;border:2px solid #fff;border-radius:50%;position:absolute;bottom:-5px;left:-5px}@keyframes zoom{0%{transform:scale(1);opacity:0}30%{transform:scale(1);opacity:0}50%{opacity:.5}100%{transform:scale(1.5);opacity:0}}.exc-expand{width:220px;border:2px solid #ef0117;height:60px;position:absolute;right:30px;top:5px;border-radius:5px 0 0 5px;padding:5px 40px 5px 5px;display:none}.exc-close{display:block;width:15px;height:15px;text-align:center;line-height:15px;font-family:arial;font-size:12px;position:absolute;font-style:normal;top:2px;left:0;z-index:9;cursor:pointer}.exc-close:hover{color:#ef0117}.exc-profile{height:50px;padding:0 0 0 55px}.exc-profile img{float:left;width:45px;height:45px;margin:0 0 0 -55px;border-radius:50%}.exc-profile p{font-weight:600;font-size:13px;font-family:arial;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin:0;padding:2px 0 7px}.exc-btn-sent{color:#fff;font-family:arial;display:inline-block;border-radius:3px;font-size:12px;padding:3px 5px;background-color:#ef0117;cursor:pointer}.exc-btn-sent:hover{opacity:.8}");
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
                <i class="fa fa-phone">
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



console.log("cong");

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
