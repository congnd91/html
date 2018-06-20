 var activeX = 1;

$(".NavShow").click(function(event) {
    $(this).toggleClass('NavShowOn');
    activeX = !activeX;
    if ($("header").attr("class") == "index") {
        $(".phonefooter").toggleClass('phoneNavShow');
    } else {
        $("footer").toggleClass('phoneNavShow');
    }

});
$('.shop_main button').click(function(event) {
$('.shop_main button img').attr('src','image/shop/go_right_on.jpg');
});
$('.shop_main_plan button').click(function(event) {
$('.shop_main button img').attr('src','image/shop/go_right_ok.jpg');
$('.subtext_footer').show(200);
});
$('.searchGo').click(function(event) {
    $('.searchShow').toggleClass('searchHide');
});
$('body').click(function(evt) {

                if(evt.target.className != "rwdH searchGo" && evt.target.className != "searchShow"   && evt.target.type != "text"  ) {
               
                    $('.searchShow').addClass('searchHide');
                }
            });
$('.memberGo').click(function(event) {
    activeX = 0;
    $('body').addClass('bodyNOmove');
    $('.memberShow').toggleClass('memberHide');
});

$('.member_03 .run').click(function(event) {
   $('body').addClass('bodyNOmove');
     activeX = 0;
    $('.memberShow').toggleClass('memberHide');
       $('.popShow').removeClass('popHide');
    $('.pop_11').addClass('pop_active');
});
$('.pop_07 .text01').click(function(event) {
  $('.pop_07 .text01').hide();
  $('.pop_07 .text02').show();
});
$('.pop_07 .text02').click(function(event) {
close()
});
$('.pop_10 .pop_right_arrow').click(function(event) {
  $('.popClose img').hide();
  $('.popClose span').show(300);
});
$('.shareGo').click(function(event) {
   $('body').addClass('bodyNOmove');
    activeX = 0;
    $('.popShow').toggleClass('popHide');
    $('.pop_invite').toggleClass('pop_active');
});

$('.fastRegister').click(function(event) {
    $('.member_02').toggleClass('member_active');
    $('.member_01').removeClass('member_active');
});

$('.member_01 .forget_pass').click(function(event) {
    $('.member_04').toggleClass('member_active');
    $('.member_01').removeClass('member_active');
});

$('.member_04 .send').click(function(event) {
    $('.member_05').toggleClass('member_active');
    $('.member_04').removeClass('member_active');
});

$('.send').click(function(event) {
    $('.member_03').toggleClass('member_active');
    $('.member_02').removeClass('member_active');
});

$('.popClose').click(function(event) {
    close()
});;
$('.closeVedio').click(function(event) {
    close()
});;
$('.pop_cover').click(function(event) {
    if($('.pop_invite').css('display')=='block')
    {
    close()
    }
});;
$('.payin_show').click(function(event) {
    activeX = 0;
     $('body').addClass('bodyNOmove');
    $('.popShow').removeClass('popHide');
    $('.pop_09').addClass('pop_active')
});
$('.pop_pay_go_10').click(function(event) {
    $('.pop_09').removeClass('pop_active');
    $('.pop_10').addClass('pop_active')
});
$('.HiitShow').click(function(event) {
   $('body').addClass('bodyNOmove');
    activeX = 0;
  $('.popShow').removeClass('popHide');
    $('.pop_11').addClass('pop_active')
});

// $('.pop_12 .next_step').click(function(event) {
//    $('.pop_12').removeClass('pop_active');
//     $('.pop_11').addClass('pop_active')
// });
$('.pop_pay_01').click(function(event) {
$(this).toggleClass('pop_pay_01_active');
});
$('.pop_pay_02').click(function(event) {
$(this).toggleClass('pop_pay_02_active');
});

$('.pop_12 .next_step').click(function(event) {


   if( $("input[id='schedule_hiit']:checked").val()  == 'on')
   {
    $('.pop_12').removeClass('pop_active');
    $('.pop_11').addClass('pop_active')
   }
   else if( $("input[id='schedule_str']:checked").val()  == 'on')
   {
      $('.pop_12').removeClass('pop_active');
    $('.pop_13').addClass('pop_active')

   }
    else if( $("input[id='schedule_cha']:checked").val()  == 'on')
   {
      location.href= ('HIIT_2.html'); 
   }
    else if( $("input[id='schedule_rec']:checked").val()  == 'on')
   {
    $('.pop_12').removeClass('pop_active');
    $('.pop_01').addClass('pop_active')
   }
});

function close() {
    meunInit();
    $('.memberShow').addClass('memberHide');
    $('.popShow').addClass('popHide');
    $('.pop_page').removeClass('pop_active');
    $('.pop_invite').removeClass('pop_active');
      activeX = 1;
      $('body').removeClass('bodyNOmove');
  $('.pop_07 .text01').show();
  $('.pop_07 .text02').hide();
  $('.pop_07 h3').show();
   $('.popClose img').show();
  $('.popClose span').hide();
  $('.pop_07 .popBt').css('top','0px');
    $(".pop_10").css("bottom","0"); 

}

function meunInit() {
    $('.member_page').removeClass('member_active');
    $('.member_01').addClass('member_active')
}

var u = navigator.userAgent;
var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
$('.pop_10 input').focus(function(event) {
 if(isiOS)
{
    $(".pop_10").css("bottom","10%"); 
}

}).blur(function(event) {
 if(isiOS)
{
     $(".pop_10").css("bottom","0"); 
}
});
$('.searchShow button').click(function(event) {
	$('.searchShow').toggleClass('searchHide');
});

var oHeight = $(document).height(); //浏览器当前的高度

// $(window).resize(function(){
//  if(isiOS) 
//     if($(document).height() < oHeight){ 
//           $(".pop_10").css("bottom","50%"); 
//     }else{ 
//           $(".pop_10").css("bottom","0");
//     } 
//   }
// });
