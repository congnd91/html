(function ($) {
    $(document).on('ready', function () {
        function uuidv4() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
                var r = Math.random() * 16 | 0,
                    v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }
        var db = new Object();
        var elements = [];
        db.moving = function (id) {
            var offset = [0, 0];
            var divOverlay = document.getElementById(id);
            var isDown = false;
            divOverlay.addEventListener('mousedown', function (e) {
                isDown = true;
                offset = [
        divOverlay.offsetLeft - e.clientX,
        divOverlay.offsetTop - e.clientY
    ];
            }, true);
            document.addEventListener('mouseup', function () {
                isDown = false;
            }, true);
            document.addEventListener('mousemove', function (e) {
                event.preventDefault();
                if (isDown) {
                    divOverlay.style.left = (e.clientX + offset[0]) + 'px';
                    divOverlay.style.top = (e.clientY + offset[1]) + 'px';
                }
            }, true);
        }
        db.createText = function () {
            var index = elements.length;
            //
            var font = $('#db_text_font').val();
            var size = $('#db_text_size').val();
            var style = $('#db_text_style').val();
            var color = $('#db_text_color').val();
            var value = $('#db_text').val();
            var id = uuidv4();
            var top = "50%";
            var left = "50%";
            var span = document.createElement("span");
            span.setAttribute("data-index", index);
            span.setAttribute("data-type", "text");
            span.setAttribute("id", id);
            span.style.setProperty("font-family", font, "important");
            span.style.fontWeight = style;
            span.style.fontSize = size;
            span.style.top = top;
            span.style.left = left;
            span.style.color = color;
            span.innerHTML = value;
            document.getElementById("db-preview").appendChild(span);
            db.moving(id);
            element = {
                "index": index,
                "font": font,
                "size": size,
                "style": style,
                "color": color,
                "value": value,
                "id": id,
                "top": top,
                "left": left,
            };
            elements.push(element);
            console.log(elements[0].font + "/" + elements[index].index);
        }
        db.selectText = function (index) {
            $('#db_text').val(elements[index].value);
            $('#db_text_color').val(elements[index].color);
            $('#db_text_size').val(elements[index].size);
            $('#db_text_font').val(elements[index].font);
            $('#db_text_style').val(elements[index].style);
            $('#db_text_index').text(index);
        }
        db.updateText = function (index) {
            var font = $('#db_text_font').val();
            var size = $('#db_text_size').val();
            var style = $('#db_text_style').val();
            var color = $('#db_text_color').val();
            var value = $('#db_text').val();
            var span = document.querySelectorAll("[data-index='" + index + "']");
            $(span).css({
                "font-family": font,
                "font-size": size,
                "color": color,
                "font-weight": style,
            });
            $(span).text(value);
            elements[index].font = font;
            elements[index].size = size;
            elements[index].style = style;
            elements[index].color = color;
            elements[index].value = value;
            console.log(elements[index]);
        }

        document.body.querySelector('.db-preview').onmousedown = function (e) {
            $(".db-active").removeClass("db-active");
            e = e || window.event;
            var elementId = (e.target || e.srcElement).id;
            if (elementId != "db-preview") {
                $("#" + elementId).addClass("db-active");
                db.moving(elementId);
                var data_index = $("#" + elementId).attr("data-index");
                console.log("id: " + data_index);
                var data_type = $("#" + elementId).attr("data-type");
                if (data_type == "text") {
                    db.selectText(data_index);
                }
            }
        }




        db.downloadImage = function () {
            html2canvas(document.querySelector('#db-preview')).then(function (canvas) {
                console.log(canvas);
                saveAs(canvas.toDataURL(), 'file-name.png');
            });
        }
        $('#db-add-text').click(function () {
            db.createText();
        });
        $('#db-update-text').click(function () {
            db.updateText($('#db_text_index').text());
        });
        $('#db-delete-text').click(function () {
            var span = document.querySelectorAll("[data-index='" + $('#db_text_index').text() + "']");
            $(span).remove();
        });
        $('.db-btn-save').click(function () {
            db.downloadImage();
        });

    });
})(jQuery);
