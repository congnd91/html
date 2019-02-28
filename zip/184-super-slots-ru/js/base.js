!function($){
    var preventUnloadPrompt = false;

    //getting ref code
    var refCode = '?',
        pattern = /(?:^|\W)p(\d+)p(\d+)p([\w\d]{4})(?:t(\d+))?(?:f(\d+))?(?:$|\W)/,
        curHref = window.location.href.split('?'),
        sourceRefCode = '',
        match = null;
    if(!!curHref[1]) {
        match = curHref[1].match(pattern);
        if(match && !config.disableLandingId && !config.refCode) {
            refCode = curHref[1].match(pattern)[0];
            sourceRefCode = refCode;
            var forReplace = refCode.indexOf('&') > 0 ? refCode.substr(0, refCode.length - 1) : refCode;
            refCode = '?' + curHref[1].replace(forReplace, forReplace + 'l' + config.id);
        } else {
            refCode = '?' + curHref[1];
        }
    }

    if(config.refCode) {
        //config.refCode += 'l' + config.id;
        if(refCode) {
            refCode = refCode.match(pattern) ? refCode.replace(pattern, config.refCode+'&') : config.refCode + refCode.replace('?', '&');
        } else {
            refCode = config.refCode;
        }
    }

    window.getRefCode = function() {
        return refCode;
    };

    var urlParams = {};
    if(!!curHref[1])
        curHref[1].split("&").forEach(function(part) {
            var item = part.split("=");
            urlParams[item[0]] = decodeURIComponent(item[1]);
        });
    var subId = '';
    if(urlParams.subid)
        subId = urlParams.subid;
    if(urlParams.promo)
        subId = urlParams.promo;

    window.getSubId = function() {
        return subId;
    };

    window.getLink = function(relativeUrl, needBaseLink) {
        if(needBaseLink === undefined)
            needBaseLink = true;
        if(!!relativeUrl && relativeUrl.length && relativeUrl.substr(0, 1) === '/') {
            relativeUrl = relativeUrl.substr(1, relativeUrl.length);
        }
        var base = (needBaseLink ? config.baseUrl : '');
        if(!!relativeUrl && relativeUrl.indexOf('#') !== -1) {
            return base + relativeUrl.replace('#', refCode + '#');
        }
        else if(!!relativeUrl && relativeUrl.indexOf('?') !== -1) {
            return base + relativeUrl.replace('?', refCode+'&') + config.addToUrl;
        } else {
            return base + relativeUrl + refCode + config.addToUrl;
        }
    };

    window.redirectUrl = getLink('');

    window.redirectUser = function(url) {
        preventUnloadPrompt = true;
        document.location.href = url;
    };

    var replaceMark = function(url) {
        var refCodeSimple = match ? match[0].replace('=', '').replace('&','') : '';
        url = url.replace('\{promocode\}', refCodeSimple);
        url = url.replace('\{subid\}', getSubId());
        for(var key in urlParams) {
            url = url.replace(RegExp('\{'+key+'\}','g'), urlParams[key]);
        }

        url = url.replace(/[\?|\&][a-z]+?=\{.*?\}/g, '');

        return url;
    };

    $(document).ready(function(){
        $("a[href]")
            .each(function(){
                var href = $(this).attr('href');
                if(href && href.substr(0, 1) !== '#' && href.substr(0, 10) !== 'javascript' && !$(this).hasClass('noTrack') && !$(this).hasClass('localLink') && href.substr(0, 4) !== 'http') {
                    $(this).attr('href', getLink(href));
                }

                if(href.substr(0, 4) == 'http' && !$(this).hasClass('replacementLink')) {
                    if(href.indexOf('?') !== -1)
                        $(this).attr('href', href.replace('?', refCode+'&'));
                    else
                        $(this).attr('href', href+refCode);
                }

                if(href.substr(0, 4) == 'http' && $(this).hasClass('replacementLink'))
                    $(this).attr('href', replaceMark(href));

                if($(this).hasClass('hardRedirect')) $(this).attr('href', href+refCode);

            })
            .click(function(e){
                preventUnloadPrompt = true;
                var href = $(this).attr('href');
                if(
                    config.dmp.sendClickEvent &&
                    href && href.substr(0, 1) !== '#' && href.substr(0, 10) !== 'javascript' && !$(this).hasClass('noTrack') && !$(this).hasClass('localLink')
                ) {
                    e.preventDefault();
                    _ggcounter.push({
                        event: "click",
                        callback: function() {
                            document.location.href = href;
                        }
                    });
                }
            });
        $(".localLink").each(function(){
            var href = $(this).attr('href'),
                curHref = window.location.href.split('?');
            if(!!curHref[1])
                $(this).attr('href', href + '?' + curHref[1]);
        });
        $("form").each(function(){
            var action = location.href;
            $(this).attr('action', action);
        });

        $(".giftBtn").click(function(){
            var id = $(this).data('giftId');
            $("input[name=gift_id]").val(id);
            $("#giftHolder").removeClass('gift-1').removeClass('gift-2').removeClass('gift-3').addClass('gift-'+id);
        });

        $(".allowExit")
            .submit(function(){
                preventUnloadPrompt = true;
            }).click(function(){
            preventUnloadPrompt = true;
        });
        $(".clickable").click(function(e){
            preventUnloadPrompt = true;
            e.preventDefault();
            document.location.href = getLink('/');
        });
    });

    window.onbeforeunload = function() {
        if (!preventUnloadPrompt && !!config.exitMessage) {
            return config.exitMessage;
        }
    };

    window.sendUser = function(url) {
        console.log();
        if(config.newTab) window.open(url, '_blank');
        else document.location.href = url;
    };

    function ajax_send(form, content) {
        $.ajax({
            method: 'post',
            url: form.prop('action'),
            data: form.serialize(),
            dataType: 'json',
            success: function (res) {
                if (res.ok) {
                    preventUnloadPrompt = true;
                    sendUser(res.url);
                } else {
                    content.html(res.html);
                    $("form", content).each(function(){
                        $(this).attr('action', location.href);
                    });
                }
            }
        });
    }

    $(document).on('submit', '.registerForm', function (e) {
        ajax_send($(this), $("#registerFormHolder"));
        $('.registerForm button,input[type=submit]').attr('disabled', 'disabled');
        e.preventDefault();
    });
    $(document).on('submit', '.loginForm', function (e) {
        ajax_send($(this), $("#loginFormHolder"));
        e.preventDefault();
    });

    function getQueryParams(qs) {
        qs = qs.split("+").join(" ");

        var params = {}, tokens,
            re = /[?&]?([^=]+)=([^&]*)/g;

        while (tokens = re.exec(qs)) {
            params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
        }
        return params;
    }
}(jQuery);


//dmp counter
var _ggcounter = _ggcounter || [];
var _ggcounterSettings = {
    prod: config.dmp.prod,
    pc: config.dmp.pc
};
(function(){
    var tc = document.createElement('script'); tc.type = 'text/javascript'; tc.async = true;
    tc.src = document.location.protocol + '//cdn.dmpcounter.com/s/dmp.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(tc, s);
})();
