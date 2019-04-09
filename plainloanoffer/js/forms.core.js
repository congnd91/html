(function () {
    function createLoader() {
        var div, img, container;
        el = document.getElementById('leadsb2cformsrc');
        if (el != null) {
            container = el.parentNode;
            div = document.createElement("DIV");
            div.className = 'b2cloader';
            div.style.position = 'relative';
            div.style.maxWidth = '740px';
            div.style.minHeight = '525px';
            div.style.border = '1px solid #eeeeee';
            div.style.margin = '0 auto';
            div.style.background = '#fff';
            div.style.display = 'none';
            div.id = "pd_loader";
            container.appendChild(div);

            img = document.createElement('IMG');
            img.src = '../content/themes/images/loader.gif'.replace('../', lmpost.options.domain);
            img.width = '100';
            img.height = '100';
            img.style.position = 'absolute';
            img.style.top = '50%';
            img.style.left = '50%';
            img.style.margin = '-50px 0 0 -50px';
            //div.appendChild(img);
        }
    }

    createLoader();
    lmpost.collect = function() {
        
    };

    function loadScript(url, id, onload) {
        var script = document.createElement('script'),
            stime = new Date();
        script.setAttribute('type', 'text/javascript');
        if (url.indexOf('../') == 0) {
            url = url.replace('../', lmpost.options.domain);
            url += (url.indexOf('?') > -1) ? '&' : '?';
            if (lmpost.coreCheck) url += 'fcv=' + lmpost.coreCheck;
        }

        script.setAttribute('src', url);
        script.setAttribute('async', 'async');

        if (id != undefined)
            script.setAttribute('id', id);
        if (onload != undefined) {
            script.onreadystatechange = function () {
                var i;
                if (this.readyState == 'complete' || this.readyState == 'loaded') {
                    script.onreadystatechange = script.onload = script.onerror = null;
                    script.setAttribute('elapsed', new Date() - stime);
                    onload();
                }
            };
            script.onload = script.onerror = function () {
                script.onreadystatechange = script.onload = script.onerror = null;
                script.setAttribute('elapsed', new Date() - stime);
                onload();
            };
        }


        document.getElementsByTagName('head')[0].appendChild(script);
    }

    lmpost.loadScript = loadScript;

    loadScript('../scripts/forms-bundle.min.js');

    lmpost.collect('loading', 'init', 'form');
})();
