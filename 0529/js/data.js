
$(".dataCotrl label").click(function(event) {
  var labelNum= $(".dataCotrl label").index(this);
  $('.dataContain').removeClass('dataContain_active');
   $('.dataContain').eq(labelNum).addClass('dataContain_active');
   $(this).siblings('label').removeClass('dataCotrl_active')
   $(this).addClass('dataCotrl_active');


});

var year=1953;
for(var i=0; i<49;i++)
{ 
	
	var year_option=document.createElement("option");
	year_option.value=year;
	year_option.textContent=year;
   $('.data_year .brthSelect').append(year_option);
   year++;
}

$('.dataUl li').click(function(event) {
	$(this).toggleClass('dataUl_active');
});

// $('.searchShow button').click(function(event) {
// 	$('.searchShow').toggleClass('searchHide');
// });
