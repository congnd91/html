$(document).ready(function (){
  $('.page-investor-2 #tab3 tbody tr, .page-investor-4 tbody tr').click(function (){
            var child = $(this).next('tr.sub-row');
            if ($(child).is(":visible")) {

              $(child).css('display','none');
              $(this).removeAttr('style');
            } else {
                $('tr.sub-row').css('display','none');
                $('tbody tr').removeAttr('style');
                $(this).css({'background-color':'#5f89db','color':'white'});
              $(child).css('display','table-row');
            }

       }); 
  $('.table-2 tbody tr').hover(function (){
      $(this).find('.icon-down').attr('src','images/v_img/down-white.png');
    },function(){
        $(this).find('.icon-down').attr('src','images/v_img/down-blue.png');
  });

  $('.nav-item').click(function (){
      let title = $(this).find('a').text();
      $('.set_title').text(title);
  });
});