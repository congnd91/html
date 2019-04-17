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
        var el_stype = window.getComputedStyle(divOverlay);
        var left = el_stype.getPropertyValue('left');
        var top = el_stype.getPropertyValue("top");
        var index = divOverlay.getAttribute("data-index");
        elements[index].top = top;
        elements[index].left = left;
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
    var font = document.getElementById('db_text_font').value;
    var size = document.getElementById('db_text_size').value;
    var style = document.getElementById('db_text_style').value;
    var color = document.getElementById('db_text_color').value;
    var value = document.getElementById('db_text').value;
    var z_index = document.getElementById('db_text_level').value;
    var id = uuidv4();
    var top = "45%";
    var left = "40%";
    var span = document.createElement("span");
    span.setAttribute("data-index", index);
    span.setAttribute("data-type", "text");
    span.setAttribute("id", id);
    span.style.setProperty("font-family", font, "important");
    span.style.fontWeight = style;
    span.style.fontSize = size;
    span.style.top = top;
    span.style.left = left;
    span.style.zIndex = z_index;
    span.style.color = color;
    span.innerHTML = value;
    document.getElementById("db-preview").appendChild(span);
    db.moving(id);
    element = {
        "index": index,
        "type": "text",
        "visible": 1,
        "font": font,
        "size": size,
        "style": style,
        "color": color,
        "value": value,
        "z_index": z_index,
        "id": id,
        "top": top,
        "left": left,
    };
    elements.push(element);
    //  console.log(elements[0].font + "/" + elements[index].index);
}
db.selectText = function (index) {
    document.getElementById('db_text_font').value = elements[index].font;
    document.getElementById('db_text_size').value = elements[index].size;
    document.getElementById('db_text_style').value = elements[index].style;
    document.getElementById('db_text_color').value = elements[index].color;
    document.getElementById('db_text_level').value = elements[index].z_index;
    document.getElementById('db_text').value = elements[index].value;
    document.getElementById('db_text_index').innerHTML = elements[index].id;
}
db.updateText = function (id) {
    var font = document.getElementById('db_text_font').value;
    var size = document.getElementById('db_text_size').value;
    var style = document.getElementById('db_text_style').value;
    var color = document.getElementById('db_text_color').value;
    var z_index = document.getElementById('db_text_level').value;
    var value = document.getElementById('db_text').value;
    var span = document.getElementById(id);
    var el_stype = window.getComputedStyle(span);
    var left = el_stype.getPropertyValue('left');
    var top = el_stype.getPropertyValue("top");
    span.style.fontFamily = font;
    span.style.fontWeight = style;
    span.style.fontSize = size;
    span.style.color = color;
    span.style.zIndex = z_index;
    span.innerHTML = value;
    var index = span.getAttribute("data-index");
    elements[index].font = font;
    elements[index].size = size;
    elements[index].style = style;
    elements[index].color = color;
    elements[index].value = value;
    elements[index].z_index = z_index;
    elements[index].top = top;
    elements[index].left = left;
    console.log(elements[index]);
}
//image
var reader;
document.getElementById('db_image_file').onchange = function (e) {
    if (this.files && this.files[0]) {
        reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
    }
}
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
        var width = document.getElementById('db_image_width').value;
        var height = document.getElementById('db_image_height').value;
        var z_index = document.getElementById('db_image_level').value;
        var style = document.getElementById('db_image_style').value;
        var border = document.getElementById('db_image_border').value;
        var border_color = document.getElementById('db_image_border_color').value;
        var top = "30%";
        var left = "30%";
        var id = uuidv4();
        var img = document.createElement("img");
        img.setAttribute("src", pictureURL);
        img.style.width = width;
        img.style.height = height;
        img.style.top = top;
        img.style.left = left;
        img.style.zIndex = z_index;
        img.style.borderWidth = border;
        img.style.borderColor = border_color;
        img.style.borderRadius = style;
        img.setAttribute("data-index", index);
        img.setAttribute("data-type", "image");
        img.setAttribute("id", id);
        document.getElementById("db-preview").appendChild(img);
        db.moving(id);
        element = {
            "index": index,
            "type": "image",
            "visible": 1,
            "width": width,
            "height": height,
            "id": id,
            "top": top,
            "left": left,
            "z_index": z_index,
            "border": border,
            "border_color": border_color,
            "style": style,
        };
        elements.push(element);
    }
}
db.selectImage = function (index) {
    document.getElementById('db_image_width').value = elements[index].width;
    document.getElementById('db_image_height').value = elements[index].height;
    document.getElementById('db_image_index').innerHTML = elements[index].id;
    document.getElementById('db_image_style').value = elements[index].style;
    document.getElementById('db_image_border_color').value = elements[index].border_color;
    document.getElementById('db_image_border').value = elements[index].border;
    document.getElementById('db_image_level').value = elements[index].z_index;
}
db.updateImage = function (id) {
    var width = document.getElementById('db_image_width').value;
    var height = document.getElementById('db_image_height').value;
    var z_index = document.getElementById('db_image_level').value;
    var style = document.getElementById('db_image_style').value;
    var border = document.getElementById('db_image_border').value;
    var border_color = document.getElementById('db_image_border_color').value;
    var img = document.getElementById(id);
    var el_stype = window.getComputedStyle(img);
    var left = el_stype.getPropertyValue('left');
    var top = el_stype.getPropertyValue('top');
    var index = img.getAttribute("data-index");
    img.style.width = width;
    img.style.height = height;
    img.style.zIndex = z_index;
    img.style.borderWidth = border;
    img.style.borderColor = border_color;
    img.style.borderRadius = style;
    elements[index].width = width;
    elements[index].height = height;
    elements[index].top = top;
    elements[index].left = left;
    elements[index].border = border;
    elements[index].style = style;
    elements[index].border_color = border_color;
    elements[index].z_index = z_index;
}
document.body.querySelector('.db-preview').onmousedown = function (e) {
    // $(".db-active").removeClass("db-active");
    var els = document.getElementsByClassName('db-active')
    while (els[0]) {
        els[0].classList.remove('db-active')
    }
    e = e || window.event;
    var elementId = (e.target || e.srcElement).id;
    if (elementId != "db-preview") {
        var el = document.getElementById(elementId);
        el.classList.add('db-active');
        var data_type = el.getAttribute("data-type");
        var data_index = el.getAttribute("data-index");
        db.moving(elementId);
        if (data_type == "text") {
            db.selectText(data_index);



            $(".db-wrap-image").removeClass("db-block");
            $(".db-wrap-image").addClass("db-hidden");
            $(".db-wrap-text").removeClass("db-hidden");
            $(".db-wrap-text").addClass("db-block");


        }
        if (data_type == "image") {
            db.selectImage(data_index);


            $(".db-wrap-image").removeClass("db-hidden");
            $(".db-wrap-image").addClass("db-block");

            $(".db-wrap-text").removeClass("db-block");
            $(".db-wrap-text").addClass("db-hidden");
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
document.getElementById("db-add-text").onclick = function () {
    db.createText();
};
document.getElementById("db-update-text").onclick = function () {
    db.updateText(document.getElementById('db_text_index').innerHTML);
};
document.getElementById("db-delete-text").onclick = function () {
    var span = document.getElementById(document.getElementById('db_text_index').innerHTML);
    var index = span.getAttribute("data-index");
    span.parentNode.removeChild(span);
    elements[index].visible = 0;
};
//image
document.getElementById("db-add-image").onclick = function () {
    db.createImage();
};
document.getElementById("db-update-image").onclick = function () {
    db.updateImage(document.getElementById('db_image_index').innerHTML);
};
document.getElementById("db-delete-image").onclick = function () {
    var img = document.getElementById(document.getElementById('db_image_index').innerHTML);
    var index = img.getAttribute("data-index");
    img.parentNode.removeChild(img);
    elements[index].visible = 0;
};
//background
document.getElementById("db-update-background").onclick = function () {
    var width = document.getElementById('db_background_width').value;
    var height = document.getElementById('db_background_height').value;
    var color = document.getElementById('db_background_color').value;
    var div = document.getElementById('db-preview');
    div.style.width = width;
    div.style.height = height;
    div.style.backgroundColor = color;
};

document.getElementById("db-btn-download").onclick = function () {

    //console log ra mảng data
    console.log(elements);
    db.downloadImage();
};





//đoạn xử lý hiển thị bằng jquery, sẽ thay thế bằng angular//

$(document).ready(function () {
    $(".db-wrap-image").addClass("db-hidden");
});
document.getElementById("db_choose").onchange = function (e) {
    var choose = document.getElementById("db_choose").value;



    if (choose == "image") {
        $(".db-wrap-image").removeClass("db-hidden");
        $(".db-wrap-image").addClass("db-block");

        $(".db-wrap-text").removeClass("db-block");
        $(".db-wrap-text").addClass("db-hidden");

    }
    if (choose == "text") {

        $(".db-wrap-image").removeClass("db-block");
        $(".db-wrap-image").addClass("db-hidden");

        $(".db-wrap-text").removeClass("db-hidden");
        $(".db-wrap-text").addClass("db-block");




    }
};
