window.onload = function () {
    $("#ContactUs").click(function () {

        $("html, body").animate({
            scrollTop: $('html, body').get(0).scrollHeight
        }, 1000);
    })

    $(".email_button").click(function () {
        // window.location.href = "https://outlook.office365.com/owa/calendar/SOASPteLtd@soas.com.sg/bookings/"
        window.open("https://outlook.office365.com/owa/calendar/SOASPteLtd@soas.com.sg/bookings/")
    })



    showCard('card1', 0, 'Corporate services');

    $(".backTop").click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    })

    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    $(document).scroll(function () {
        var scroH = $(document).scrollTop(); //滚动高度
        var viewH = $(window).height(); //可见高度 
        var contentH = $(document).height(); //内容高度

        if (scroH > 100) { //距离顶部大于100px时
            $(".backTop").show()
        }else{
            $(".backTop").hide()
        }
        
    });

    this.console.log( $(".lay_footer").offset().left);

    $(".backTop").css("right",$(".lay_footer").offset().left+20)

}

window.onresize=function(){
    $(".backTop").css("right",$(".lay_footer").offset().left+20)
}


function getTop(text) {
    if (text == "ServicesCard") {
        var top = $(".ServicesCard").offset().top - 30;
    } else {
        var top = $(".ManagementCard").offset().top - 30;
    }

    $("body,html").animate({
        scrollTop: top
    }, 500);
}



function showCard(ele, index, text) {
    $(".card_icon_list").hide();
    $("." + ele).show();

    $(".card_title").text(text)

    $(".select_ico").children("p").css("color", "#404040");
    $(".select_ico").eq(index).find("p").css("color", "#f4b65b");
}

function showManagementCard(ele, index, text) {
    $(".AC_card_icon_list").hide();
    $("." + ele).show();

    $(".maneg_Card_title").text(text)

    $(".manege_select_ico").children("p").css("color", "#404040");
    $(".manege_select_ico").eq(index).find("p").css("color", "#f4b65b");
}

function showSelectBox(ele) {
    $(".serOrMange").hide();
    $(".AC_card_icon_list").hide();
    $(".card_icon_list").hide();

    $(".white_button").css("color", "#000")

    if (ele == "ServicesCard") {
        showCard('card1', 0, 'Corporate services')
        $(".ServiceBtn").css("color", "#ff6a02")
    } else {
        $(".ManageBtn").css("color", "#ff6a02")
        showManagementCard('card1', 0, 'Deal making')
    }

    $("." + ele).show();

    getTop(ele)
}