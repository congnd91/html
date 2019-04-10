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
        //image
        var reader;
        $("#db_image_file").change(function () {
            if (this.files && this.files[0]) {
                reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
        var pictureURL;

        function imageIsLoaded(e) {
            pictureURL = e.target.result;
            // $(".preview").empty().append(picture);
        }
        db.createImage = function () {
            if (pictureURL == null) {
                alert("Chua chon anh");
            } else {
                var index = elements.length;
                var width = $('#db_image_width').val();
                var height = $('#db_image_height').val();
                var top = "30%";
                var left = "30%";
                var img = document.createElement("img");
                img.setAttribute("src", pictureURL);
                img.style.width = width;
                img.style.height = height;
                img.style.top = top;
                img.style.left = left;
                var id = uuidv4();
                var span = document.createElement("span");
                img.setAttribute("data-index", index);
                img.setAttribute("data-type", "image");
                img.setAttribute("id", id);
                $(".db-preview").append(img);
                db.moving(id);
                element = {
                    "index": index,
                    "width": width,
                    "height": height,
                    "id": id,
                    "top": top,
                    "left": left,
                };
                elements.push(element);
            }
        }
        db.selectImage = function (index) {
            $('#db_image_width').val(elements[index].width);
            $('#db_image_height').val(elements[index].height);
            $('#db_image_index').text(index);
        }
        db.updateImage = function (index) {
            var width = $('#db_image_width').val();
            var height = $('#db_image_height').val();
            var img = document.querySelectorAll("[data-index='" + index + "']");
            $(img).css({
                "width": width,
                "height": height,
            });
            elements[index].width = width;
            elements[index].height = height;
            //console.log(elements[index]);
        }
        document.body.querySelector('.db-preview').onmousedown = function (e) {
            $(".db-active").removeClass("db-active");
            e = e || window.event;
            var elementId = (e.target || e.srcElement).id;
            if (elementId != "db-preview") {
                $("#" + elementId).addClass("db-active");
                db.moving(elementId);
                var data_index = $("#" + elementId).attr("data-index");
                var data_type = $("#" + elementId).attr("data-type");
                console.log("type: " + data_type);
                if (data_type == "text") {
                    db.selectText(data_index);
                }
                if (data_type == "image") {
                    db.selectImage(data_index);
                }
            }
        }

        function saveAs(uri, filename) {
            var link = document.createElement('a');
            if (typeof link.download === 'string') {
                link.href = uri;
                link.download = filename;
                //Firefox requires the link to be in the body
                document.body.appendChild(link);
                //simulate click
                link.click();
                //remove the link when done
                document.body.removeChild(link);
            } else {
                window.open(uri);
            }
        }
        db.downloadImage = function () {
            html2canvas(document.querySelector('#db-preview')).then(function (canvas) {
                console.log(canvas);
                saveAs(canvas.toDataURL(), 'file-name.png');
            });
        }
        //text
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
        //image
        $('#db-add-image').click(function () {
            db.createImage();
        });
        $('#db-update-image').click(function () {
            db.updateImage($('#db_image_index').text());
        });
        $('#db-delete-image').click(function () {
            var img = document.querySelectorAll("[data-index='" + $('#db_image_index').text() + "']");
            $(img).remove();
        });
        //background
        $('#db-update-background').click(function () {
            var width = $('#db_background_width').val();
            var height = $('#db_background_height').val();
            var color = $('#db_background_color').val();
            var div = $('.db-preview');
            $(div).css({
                "width": width,
                "height": height,
                "background-color": color,
            });
        });
        //download
        $('.db-btn-download').click(function () {
            db.downloadImage();
        });
    });
})(jQuery);
