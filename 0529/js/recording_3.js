     var sectionNum = 0; //第幾個畫面的記錄
     var constrolX = 1; //控制是否切換畫面效果
     // var activeX = 1; //控制延遲避免一直執行切換畫面導致亂跳
     var footerX = 0;
     var wei_li_num = 0;
     var wei_li_old = 0;
     var monthArray = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
     var nowMonth = 3;
     var nowMonthB = 0;
     var nowMonthC = 0;
     var rightDateNum = 0;
     init();

     function teststr(str, searchstr) {
         return str.search(searchstr) != -1 ? true : false;
     }
     var web_name = location.href;
     if (teststr(web_name, '#record')) {
         var query = Modernizr.mq('(max-width: 1024px)');
         if (query) {
             page_04_lft_go();
         } else {
             topslider();
         }
     }
   $('.record_go').click(function(event) {
      var query = Modernizr.mq('(max-width: 1024px)');
         if (query) {
             page_04_lft_go();
         } else {
             topslider();
         }
   });

     function init() {

         mouseMoive();
     }
     $('.strokeThitle').click(function(event) {
         $(this).closest('.stroke').toggleClass('stroke_active');
         $('.cortlab').toggleClass('phoneNo');
     });
     $('.sectBScheduleMonth .sectBmoonth').click(function(event) {
         $(this).closest('.sectBSchedule').toggleClass('sectBSchedule_active');
         $('.cortlab').toggleClass('phoneNo');
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
     $('.strokeContain_add').click(function(event) {
             activeX=0;
         $('.popShow').removeClass('popHide');
         $('.pop_12').addClass('pop_active');
     });
     $('.pop_08 .popBt').click(function(event) {
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
     $('.sectBSchedule ul li').click(function(event) {
         $('.sectBSchedule ul li').removeClass('sectBScheduleLi_active');
         $(this).addClass('sectBScheduleLi_active');
     });
     $('.leftDateMain').click(function(event) {
         $('.leftDateMain').removeClass('leftDateMain_active');
         $(this).addClass('leftDateMain_active');
     });
     $('.rightDateMain').click(function(event) {
         $('.rightDateMain').removeClass('rightDateMain_active');
         $(this).addClass('rightDateMain_active');
     });
     $('.dateTitleLeft').click(function(event) {
         if (nowMonth > 0) {
             nowMonth--;

         } else {
             nowMonth = 11;
         }
         moonthAdd();
     });
     $('.dateTitleRight').click(function(event) {
         if (nowMonth < 11) {
             nowMonth++;

         } else {
             nowMonth = 0;
         }
         moonthAdd();
     });
     $('.sectBSchedule .fa-angle-double-left').click(function(event) {
         if (nowMonthB > 0) {
             nowMonthB--;

         } else {
             nowMonthB = 11;
         }
         moonthAddB();
     });
     $('.sectBSchedule .fa-angle-double-right').click(function(event) {
         if (nowMonthB < 11) {
             nowMonthB++;

         } else {
             nowMonthB = 0;
         }
         moonthAddB();
     });


     $('.leftDate  .fa-angle-double-down').click(function(event) {
         nowMonthC++;
         if (nowMonthC == 12) {
             nowMonthC = 0;
         }
         moonthAddC();
     });
     $('.leftDate  .fa-angle-double-up').click(function(event) {
         nowMonthC--;
         if (nowMonthC == -1) {
             nowMonthC = 11;
         }
         moonthAddC();
     });

     $('.rightDate  .fa-angle-double-down').click(function(event) {
         rightDateNum++;
         if (rightDateNum == $('.rightDate ul li').length) {
             rightDateNum = 0;
         }
         rightDateAddLi();
     });
     $('.rightDate  .fa-angle-double-up').click(function(event) {
         rightDateNum--;
         if (rightDateNum == -1) {
             rightDateNum = $('.rightDate ul li').length - 1;
         }
         rightDateAddLi();
     });

     function page_04_go() {

         wei_li_num++;
         if (wei_li_num > 0) {
             wei_li_old = wei_li_num - 1;
         } else {
             wei_li_old = $('article section').length - 1;
         }
         if (wei_li_num > 2) {
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
         $('.stroke').removeClass('stroke_active')
         $('.sectBSchedule').removeClass('sectBSchedule_active')
         $('.cortlab').removeClass('phoneNo')
         $('article section').removeClass('sect_active');
         $('article section').removeClass('sect_active_old');
         $('article section').eq(x).addClass('sect_active');
         $('article section').eq(y).addClass('sect_active_old');
         $('article .cortlab label').removeClass('lab_active');
         $('article .cortlab label').eq(x).addClass('lab_active');
         $('.chatContent').hide();
         $('.chatMune').fadeIn(300);
         if (x == 2) {
             $('.cortlab').css('bottom', '11%');
         } else {
             $('.cortlab').css('bottom', '22%');
         }
     }

     $(window).resize(function() {
         var query = Modernizr.mq('(max-width: 1024px)');
         if (query) {
             $(".sectA").css("margin-top", "0px");
         } else {
             $(".sectA").css("margin-top", "215px");
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
                 }
             }
         })
     }

     function botslider() {

         sectionNum++;
         if (sectionNum == 3) {
             sectionNum = 0;
         }
         var winodwH = $('.sectA').height();
         var overH = sectionNum * winodwH * -1 + 215;
         // alert(overH)
         $(".sectA").css("margin-top", overH + "px");
         // if (sectionNum == 3) {
         //     $("html").addClass("free");
         //     constrolX = 0;
         // }
         // activeX = 1;
         setTimeout(function() {
             activeX = 1;
         }, 400)
     }

     function topslider() {
         sectionNum--;
         var winodwH = $('.sectA').height();
         var overH = sectionNum * winodwH * -1 + 215;
         if (sectionNum == -1) {
             sectionNum = 2;
             overH = sectionNum * winodwH * -1 + 215;
             // $("html").addClass("free");
             // constrolX = 0;
         }
         $(".sectA").css("margin-top", overH + "px");
         // activeX = 1;
         setTimeout(function() {
             activeX = 1;
         }, 400)
     }

     function moonthAdd() {
         if (nowMonth > 0) {
             $('.dateTitleLeft').text(monthArray[nowMonth - 1])
         } else {
             $('.dateTitleLeft').text(monthArray[11]);
         }
         $('.dateTitleH1').text(monthArray[nowMonth])
         if (nowMonth < 11) {
             $('.dateTitleRight').text(monthArray[nowMonth + 1])
         } else {
             $('.dateTitleRight').text(monthArray[0]);
         }
     }

     function moonthAddB() {

         $('.sectBmoonth').text(monthArray[nowMonthB])

     }

     function moonthAddC() {
         var li_hieght = $('.leftDateMain').outerHeight();
         var li_move = li_hieght * nowMonthC;
         $('.leftDateMain_first').css('margin-top', '-' + li_move + 'px');
     }

     function rightDateAddLi() {
         var li_hieght = $('.rightDateMain').outerHeight();
         var li_move = li_hieght * rightDateNum;
         $('.rightDateMain_first').css('margin-top', '-' + li_move + 'px');
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
