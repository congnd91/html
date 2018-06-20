
$(".accountCtorl label").click(function(event) {
  var labelNum= $(".accountCtorl label").index(this);
  $('.accountCtorl label').removeClass('accountCtorl_active');
   $('.account_page').removeClass('account_active');
   $(this).addClass('accountCtorl_active');
   $('.account_page').eq(labelNum).addClass('account_active');

});
$('.Inquire div').click(function(event) {
	$('.Inquire div').removeClass('Inquire_active')
$(this).toggleClass('Inquire_active');

});

// $('.searchShow button').click(function(event) {
// 	$('.searchShow').toggleClass('searchHide');
// });
