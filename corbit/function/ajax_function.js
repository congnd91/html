function  jq_post(url_link,qstr,divname,loadingname){
		$('#'+loadingname).show();
		$.ajax(
		{
		url:url_link,
		type:"post",
		data:qstr,
		cache:false,
		dataType:"text",
		success:	function(mydata){
				$("#"+divname).html(mydata);
				$('#'+loadingname).hide();
			}
		});
}
//noloading
function  jq_post_noloading(url_link,qstr,divname){
		$().ajaxStart(function(){
		//$('#'+loadingname).show();
		});
		$.ajax(
		{
		url:url_link,
		type:"post",
		data:qstr,
		cache:false,
		dataType:"text",
		success:	function(mydata){
				$("#"+divname).html(mydata);
				//$('#'+loadingname).hide();
			}
		});
		$().ajaxComplete(function(){
		//$('#'+loadingname).hide();
		});	
}

//noloading top
function  jq_post_block(url_link,qstr,divname,loading_name){
		width=$('#'+loading_name).css('width').replace("px","");
		height=$('#'+loading_name).css('height').replace("px","");
		$.blockUI({
		message:$('#'+loading_name),
			css:{ cursor:'default',
			width: width + 'px',
			height:height+ 'px',
			padding:'0px',
			top:($(window).height()-height)/2 + 'px',
			left:($(window).width()-width)/2 + 'px'
			}
		});
		
		$().ajaxStart(function(){
			width=$('#'+loading_name).css('width').replace("px","");
			height=$('#'+loading_name).css('height').replace("px","");
			$.blockUI({
			message:$('#'+loading_name),
				css:{ cursor:'default',
				width: width + 'px',
				height:height+ 'px',
				padding:'0px',
				top:($(window).height()-height)/2 + 'px',
				left:($(window).width()-width)/2 + 'px'
				}
			});
		});
		$.ajax(
		{
		url:url_link,
		type:"post",
		data:qstr,
		cache:false,
		dataType:"text",
		success:	function(mydata){
				$("#"+divname).html(mydata);
				//$('#'+loadingname).hide();
				$.unblockUI();
			}
		});
		$().ajaxComplete(function(){
			$.unblockUI();
		});	
}
//noloading top
function  jq_post_noloading_top(url_link,qstr,divname){
		$().ajaxStart(function(){
		//$('#'+loadingname).show();
		});
		$.ajax(
		{
		url:url_link,
		type:"post",
		data:qstr,
		cache:false,
		dataType:"text",
		success:	function(mydata){
				top.$("#"+divname).html(mydata);
				//$('#'+loadingname).hide();
			}
		});
		$().ajaxComplete(function(){
		//$('#'+loadingname).hide();
		});	
}

function  jq_post_effect(url_link,qstr){
	var check_value = $.ajax({
		url: url_link,
		data: qstr,
		type:"post",
		async: false,
		success:	function(mydata){
			//alert(mydata);
		}
	}).responseText;
	return check_value;
}

