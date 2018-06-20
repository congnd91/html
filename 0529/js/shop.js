$(".compGo").click(function(event) {
    $('.popShow').toggleClass('popHide');
    $('.pop_07').toggleClass('pop_active');
    $('body').addClass('bodyNOmove');



    var query = Modernizr.mq('(max-width: 767px)');
    if (query) {
        $('.pop_07 .popBg').attr('src', 'image/pop_bg02.png');
        $('.pop_07 .text01').hide();
        $('.pop_07 .text02').hide();
        $('.pop_07 .text00').show();
        $('.pop_07 .leftComp').show();
        $('.pop_07 .rightComp').hide();
        $('.pop_07 .subBottom').hide();
        $('.pop_07 h3').hide();
    } else {
        $('.pop_07 .popBg').attr('src', 'image/pop_bg.png')
        $('.pop_07 .text01').show();
        $('.pop_07 .text02').hide();
        $('.pop_07 .text00').hide();
        $('.pop_07 .leftComp').show();
        $('.pop_07 .rightComp').show();
        $('.pop_07 h3').show();
    }

});
$('.pop_07 .text00').click(function(event) {
    $(this).hide();
    $('.pop_07 .text01').show(300);
    $('.pop_07 .leftComp').hide();
    $('.pop_07 .rightComp').show();
    $('.pop_07 h3').show();
    $('.pop_07 .popBt').css('top','-50px');
});
$('.compGo').click(function(event) {
    $('.compGo img').attr('src', 'image/shop/go_right_on.jpg');
});

// $('.searchShow button').click(function(event) {
//  $('.searchShow').toggleClass('searchHide');
// });
