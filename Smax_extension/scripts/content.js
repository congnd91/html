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

$(document).on('click', '.message', function () {
    console.log("message");

    setTimeout(function () {

        var linksList = document.querySelector('body');
        if ($('.box-id').is(":visible")) {
            $('.box-id-text').text($('.topbar.bg h3').html());

        } else {
            var html = `
 <div class="box-id" style="background-color:#fff;width: 250px;height: 250px;border-radius: 2px 2px 0px 0px;position: fixed;
                bottom: 0px;right: 20px;z-index: 9999;box-shadow:2px 2px 7px 0px rgba(0,0,0,0.5);overflow: hidden">
        <h3 style="margin: 0px;padding: 8px 10px;text-align: center;color: #fff;font-size: 18px;background-color: #0099fe">Modal ID</h3>
        <div style="text-align: center;padding: 10px 0px">
            <p class="box-id-text">` + $('.topbar.bg h3').html() + `</p>
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
