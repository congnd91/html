     var sectionNum = 0; //第幾個畫面的記錄
     var constrolX = 1; //控制是否切換畫面效果
     // var activeX = 1; //控制延遲避免一直執行切換畫面導致亂跳
     var footerX = 0;
     var wei_li_num = 0;
     var wei_li_old = 0;
     init();

     function init() {

         mouseMoive();
     }
     
     $('.searchGo_firend').click(function(event) {
    $('.searchShow_firend').toggleClass('searchHide_firend');
});
$('body').click(function(evt) {

                if( evt.target.className != "searchShow_firend"   && evt.target.type != "text" && evt.target.className != "friend_search searchGo_firend" ) {
               
                    $('.searchShow_firend').addClass('searchHide_firend');
                }
            });
            
            
     $('.sectMain .Title_h3').click(function(event) {
         $(this).closest('.sectMain').toggleClass('sectMainHide');
         $('.cortlab').toggleClass('phoneNo');
     });
     $('body').on("swiperight", function() {
        if(activeX)
        {
         page_04_lft_go();
        }
     });
     $('body').on("swipeleft", function() {
       if(activeX)
       {
         page_04_go();
       }
     });
     $('.sctMunu li').click(function(event) {
        $(this).siblings('li').removeClass('sctMunu_active')
        $(this).addClass('sctMunu_active')
     });

     $('article .cortlab label').click(function(event) {
         wei_li_old = $('article .cortlab .lab_active').index("article .cortlab label");
         wei_li_num = $('article .cortlab label').index(this);
         if (wei_li_num != wei_li_old) {
             page_04(wei_li_num, wei_li_old);
         }
     });
     $('.ctorlBt .download').click(function(event) {
             activeX=0;
         $('.popShow').removeClass('popHide');
         $('.pop_08').addClass('pop_active');
     });
          $('.ctorlBt .add_GYM').click(function(event) {
                 activeX=0;
         $('.popShow').removeClass('popHide');
         $('.pop_12').addClass('pop_active');
     });
     $('.pop_08 .popBt').click(function(event) {
             activeX=0;
         $('.pop_08').removeClass('pop_active');
         $('.pop_13').addClass('pop_active');
     });
     $('.sectChat .ChatMain').click(function(event) {
         $('.chatContent').fadeIn(300);
         $('.chatMune').hide();
     });
     $('.chatBack').click(function(event) {
         $('.chatContent').hide();
         $('.chatMune').fadeIn(300);
     });

     function page_04_go() {

         wei_li_num++;
         if (wei_li_num > 0) {
             wei_li_old = wei_li_num - 1;
         } else {
             wei_li_old = $('article section').length - 1;
         }
         if (wei_li_num > 3) {
             wei_li_num = 0;
         }
         page_04(wei_li_num, wei_li_old)
     }

     function page_04_lft_go() {

         wei_li_num--;
         if (wei_li_num >= 0) {
             wei_li_old = wei_li_num + 1;
         } else {
             wei_li_old = 0;
         }
         if (wei_li_num < 0) {
             wei_li_num = $('article section').length - 1;
         }


         page_04(wei_li_num, wei_li_old)
     }

     function page_04(x, y) {

         $('.sectMain').removeClass('sectMainHide')
         $('.sectMain').addClass('sectMainHide')
         $('.cortlab').removeClass('phoneNo')
         $('article section').removeClass('sect_active');
         $('article section').removeClass('sect_active_old');
         $('article section').eq(x).addClass('sect_active');
         $('article section').eq(y).addClass('sect_active_old');
         $('article .cortlab label').removeClass('lab_active');
         $('article .cortlab label').eq(x).addClass('lab_active');
           $('.chatContent').hide();
         $('.chatMune').fadeIn(300);
             if(x==2 || x==3)
         {
            $('.cortlab').css('bottom','14%');
         }
         else
         {
            $('.cortlab').css('bottom','24%');
         }
     }

    $(window).resize(function() {
          var query = Modernizr.mq('(max-width: 1024px)');
             if (query) {
            $(".sectA").css("margin-top","0px");
    }
    else
    {
        $(".sectA").css("margin-top","215px");
    }
    
    });

     function mouseMoive() {
         $(window).mousewheel(function(e) {
            
             var query = Modernizr.mq('(max-width: 1024px)');
             if (!query) {
                 if (constrolX && activeX) {
                     if (e.deltaY == -1) {
                         activeX = 0;
                         setTimeout(botslider, 400)

                     } else {
                         activeX = 0;
                         setTimeout(topslider, 400)
                     }
                 } else {
                     var newfooterX = $(".sectD").outerHeight() - $(window).height();
                     if ((e.deltaY == 1) && ($(window).scrollTop() == 0) && (!constrolX) && activeX) {
                         constrolX = 1;
                         activeX = 0;
                         setTimeout(topslider, 400)
                         $("html").removeClass("free");

                     } else if ((e.deltaY == -1) && ($(window).scrollTop() == newfooterX) && (!constrolX) && activeX) {
                         constrolX = 1;
                         activeX = 0;
                         setTimeout(botslider, 400)
                         $("html").removeClass("free");
                     }
                 }
             }
         })


         $('.arrow_main   img').click(function(event) {
             setTimeout(botslider, 100)
         });
     }

     function botslider() {

         sectionNum++;
          $('.arrow_main').removeClass('arrow_top_go');

         if (sectionNum == 4) {
             sectionNum = 0;
             constrolX=1;
              $("html").removeClass("free");
         }

         var winodwH = $('.sectA').height();
         var overH = sectionNum * winodwH * -1 + 215;
         // alert(overH)
         $(".sectA").css("margin-top", overH + "px");
         if (sectionNum == 3) {
             $("html").addClass("free");
             constrolX = 0;
             $('.arrow_main').addClass('arrow_top_go');
         }
         // activeX = 1;
         setTimeout(function() {
             activeX = 1;
         }, 500)
     }

     function topslider() {
         sectionNum--;
         var winodwH = $('.sectA').height();
        $("html").removeClass("free");
         var overH = sectionNum * winodwH * -1 + 215;
           $('.arrow_main').removeClass('arrow_top_go');
         if (sectionNum == -1) {
             sectionNum = 3;
             overH = sectionNum * winodwH * -1+215;
             $("html").addClass("free");
             $('.arrow_main').addClass('arrow_top_go');
             constrolX = 0;
              $("html").addClass("free");
         }
              
       
         $(".sectA").css("margin-top", overH + "px");
         // activeX = 1;
         setTimeout(function() {
             activeX = 1;
         }, 500)
     }

     // function topsliderX() {
     //       sectionNum--;
     //       var winodwH =$(window).height();
     //       var overH = sectionNum * 100 * -1;
     //       if (sectionNum == -1) {
     //           sectionNum = 3;
     //           overH = sectionNum * 100 * -1;
     //           $("html").addClass("free");
     //           constrolX = 0;
     //       }
     //       $(".sectA").css("margin-top", overH + "vh");
     //       // activeX = 1;
     //       setTimeout(function() {
     //           activeX = 1;
     //       }, 1000)
     //   }
