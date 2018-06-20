     var sectionNum = 0; //第幾個畫面的記錄
     var constrolX = 1; //控制是否切換畫面效果
     // var activeX = 1; //控制延遲避免一直執行切換畫面導致亂跳
     var hiitBcontorl = 1; //控制B手機板的位移
     var hiitBnum = 0;
     var footerX = 0;
     var wei_li_num = 0;
     var wei_li_old = 0;
     var sectD_1_num = 0;
     var sectD_2_num = 0;
     var sectD_3_num = 0;
     var sectD_4_num = 0;
     var sectD_5_num = 0;
     var equipment_active_num = 0;
     init();

  // alert($('html').height());
     function init() {

         mouseMoive();
     }

     $('.sectE_set').click(function(event) {
         activeX = 0;
         $('.popShow').removeClass('popHide');
         $('.pop_04').addClass('pop_active')
     });


     $('.sectMain .Title_h3').click(function(event) {
         $(this).closest('.sectMain').toggleClass('sectMainHide');
         $('.cortlab').toggleClass('phoneNo');
     });
     $('body').on("swiperight", function() {
            if(hiitBnum>0)
            {
         if (activeX) {
             page_04_lft_go();
         }
            }
     });
     $('body').on("swipeleft", function() {
         if (activeX) {
             page_04_go();
         }
     });

     $('.hiitC_left').click(function(event) {

         if (activeX) {
             page_04_lft_go();
         }
     });
 $('.hiitC_right').click(function(event) {
         if (activeX) {
             page_04_go();
         }
     });
//     $('.hiitB_left').click(function(event) {
//       if(hiitBnum>0)
//             {
//          if (activeX) {
//              page_04_lft_go();
//          }
//             }
//      });
//  $('.hiitB_right').click(function(event) {
//          if (activeX) {
//              page_04_go();
//          }
//      });

 $('.next_tool').click(function(event) {
         if (activeX) {
             page_04_go();
         }
     });
     $('.sectE_sub').click(function(event) {
         cotorlPlay = 0;
         $('.popShow').removeClass('popHide');
         $('.pop_13').addClass('pop_active');
     });
     $('article .cortlab label').click(function(event) {
         wei_li_old = $('article .cortlab .lab_active').index("article .cortlab label");
         wei_li_num = $('article .cortlab label').index(this);
         if (wei_li_num != wei_li_old) {
             page_04(wei_li_num, wei_li_old);
         }
     });
    //  $('.functionB div').click(function(event) {
    //      $('.functionB div').removeClass('fun_active');
    //      $(this).toggleClass('fun_active');

    //  });
    //  $('.hiitB_contant div').click(function(event) {

    //      $('.hiitB_contant div').removeClass('fun_active')
    //      $(this).toggleClass('fun_active');
    //  });
     $('.functionA li').click(function(event) {
         var liNum = $(this).index();

         $('.functionA li').removeClass('fun_active');

         for (var i = 0; i <= liNum; i++) {

             $('.functionA li').eq(i).addClass('fun_active');
         }


     });


     $("#hiit_action").change(function() {
         var chage_num = $('#hiit_action').val();
         var relax = $('#hiit_relax option')
      
        
        if(chage_num==1)
        {
                 relax.eq(0).show();
                 relax.eq(1).hide();
                 relax.eq(2).hide();
                  $('#hiit_relax').val(1); 
        }

         if(chage_num==2)
        {
                 relax.eq(0).show();
                 relax.eq(1).hide();
                 relax.eq(2).hide();
                 $('#hiit_relax').val(1); 
         }
             if(chage_num==3)
        {
                 relax.eq(0).show();
                 relax.eq(1).show();
                 relax.eq(2).hide();
                  $('#hiit_relax').val(1); 
        }
          if(chage_num==4)
        {
                 relax.eq(0).show();
                 relax.eq(1).show();
                 relax.eq(2).hide();
                $('#hiit_relax').val(1); 
        }
          if(chage_num==5)
        {
                 relax.eq(0).hide();
                 relax.eq(1).show();
                 relax.eq(2).show();
           $('#hiit_relax').val(2); 
         }


     });

     function page_04_go() {
         if (hiitBcontorl) {
             hiitBnum++;

             if (hiitBnum < 3) {
                 $('.sectB .hiitB').eq(hiitBnum - 1).addClass('hiitBOne');
             }
         }

         if (!hiitBcontorl || hiitBnum == 3) {
             wei_li_num++;

             if (wei_li_num == $('article section').length) {
                 $('.sectB .hiitB').removeClass('hiitBOne');
                 hiitBnum = 0;
                 hiitBcontorl = 1

             }
             if (wei_li_num == 0) {
                 hiitBcontorl = 1;
             }
             if (wei_li_num == 1) {
                 $('.sectB .hiitB').eq(0).addClass('hiitBOne');
                 $('.sectB .hiitB').eq(1).addClass('hiitBOne');
                 hiitBnum = 2;
                 hiitBcontorl = 0;
             }
             if (wei_li_num > 0) {
                 wei_li_old = wei_li_num - 1;
             } else {
                 wei_li_old = $('article section').length - 1;
             }
             if (wei_li_num > $('article section').length - 1) {
                 wei_li_num = 0;
             }
             page_04(wei_li_num, wei_li_old)
         }


     }

     function page_04_lft_go() {
         if (hiitBcontorl) {
             hiitBnum--;
             $('.sectB .hiitB').eq(hiitBnum).removeClass('hiitBOne');

         }
         if (!hiitBcontorl || hiitBnum == -1) {

             wei_li_num--;
             if (wei_li_num == -1) {
                 $('.sectB .hiitB').removeClass('hiitBOne');
                 hiitBnum = 0;
                 hiitBcontorl = 0;
             }
             if (wei_li_num == 0) {
                 hiitBcontorl = 1;
             }
             if (wei_li_num == 1) {
                 $('.sectB .hiitB').eq(0).addClass('hiitBOne');
                 $('.sectB .hiitB').eq(1).addClass('hiitBOne');
                 hiitBnum = 2;
             }
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
     }

     $(window).resize(function() {
         var query = Modernizr.mq('(max-width: 1024px)');
         if (query) {
             $(".sectC").css("margin-top", "0px");
         } else {
             $(".sectC").css("margin-top", "215px");
         }

     });
     $('.equipment li').click(function(event) {

         if (equipment_active_num < 3) {
             $(this).toggleClass('equipment_active');
             if ($(this).attr('class') == 'equipment_active') {
                 equipment_active_num++;
             } else {
                 equipment_active_num--;
             }
         } else if (equipment_active_num == 3) {
             if ($(this).attr('class') == 'equipment_active') {
                 $(this).removeClass('equipment_active');
                 equipment_active_num--;
             }
         }


     });

     $('.move_check').click(function(event) {
         $(this).toggleClass('move_check_active');
     });

     $('.noTool').click(function(event) {
         $('.equipment li').removeClass('equipment_active');
         botslider();

         page_04_go();
     });

     $('.sectD_1 .move_more').click(function(event) {
         sectD_1_num++;
         if (sectD_1_num == $('.sectD_1 .move_contant_main').length) {
             sectD_1_num = 0;
         }
         $('.sectD_1 .move_contant_main').addClass('no');
         $('.sectD_1 .move_contant_main').eq(sectD_1_num).removeClass('no');
         $('.st01').text(sectD_1_num + 1);

     });
     $('.sectD_2 .move_more').click(function(event) {
         sectD_2_num++;
         if (sectD_2_num == $('.sectD_2 .move_contant_main').length) {
             sectD_2_num = 0;
         }
         $('.sectD_2 .move_contant_main').addClass('no');
         $('.sectD_2 .move_contant_main').eq(sectD_2_num).removeClass('no');
         $('.st02').text(sectD_2_num + 1);
     });
     $('.sectD_3 .move_more').click(function(event) {
         sectD_3_num++;
         if (sectD_3_num == $('.sectD_3 .move_contant_main').length) {
             sectD_3_num = 0;
         }
         $('.sectD_3 .move_contant_main').addClass('no');
         $('.sectD_3 .move_contant_main').eq(sectD_3_num).removeClass('no');
         $('.st03').text(sectD_3_num + 1);
     });
  $('.sectD_4 .move_more').click(function(event) {
         sectD_4_num++;
         if (sectD_4_num == $('.sectD_4 .move_contant_main').length) {
             sectD_4_num = 0;
         }
         $('.sectD_4 .move_contant_main').addClass('no');
         $('.sectD_4 .move_contant_main').eq(sectD_4_num).removeClass('no');
         $('.st04').text(sectD_4_num + 1);
     });

  $('.sectD_5 .move_more').click(function(event) {
         sectD_5_num++;
         if (sectD_5_num == $('.sectD_5 .move_contant_main').length) {
             sectD_5_num = 0;
         }
         $('.sectD_5 .move_contant_main').addClass('no');
         $('.sectD_5 .move_contant_main').eq(sectD_5_num).removeClass('no');
         $('.st05').text(sectD_5_num + 1);
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
                     var newfooterX = $(".sectE").outerHeight() - $(window).height();
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
             setTimeout(botslider, 300)
         });
     }

     function botslider() {

         sectionNum++;
             $('.arrow_main').removeClass('arrow_top_go');
         if (sectionNum == $('article section').length) {
             sectionNum = 0;
         }
         var winodwH = $('.sectC').height();
         var overH = sectionNum * winodwH * -1 + 215;
         // alert(overH)
         $(".sectC").css("margin-top", overH + "px");
         if (sectionNum == ($('article section').length - 1)) {
             $("html").addClass("free");
             constrolX = 0;
             $('.arrow_main').addClass('arrow_top_go');
         }
         // activeX = 1;
         setTimeout(function() {
             activeX = 1;
         }, 400)
     }

     function topslider() {
         sectionNum--;
         var winodwH = $('.sectC').height();
         var overH = sectionNum * winodwH * -1 + 215;
          $('.arrow_main').removeClass('arrow_top_go');
         if (sectionNum == -1) {
             sectionNum = $('article section').length - 1;
             overH = sectionNum * winodwH * -1 + 215;
            $('.arrow_main').addClass('arrow_top_go');
             $("html").addClass("free");
             constrolX = 0;
         }
         $(".sectC").css("margin-top", overH + "px");
         // activeX = 1;
         setTimeout(function() {
             activeX = 1;
         }, 400)
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
     //       $(".sectB").css("margin-top", overH + "vh");
     //       // activeX = 1;
     //       setTimeout(function() {
     //           activeX = 1;
     //       }, 1000)
     //   }
