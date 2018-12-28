<script src="<?PHP echo $root_path;?>function/jquery-2.1.0.min.js"></script>
<!--<script src="<?PHP echo $root_path;?>function/ui/jquery.blockUI.js"></script>-->
<SCRIPT language=JavaScript src="<?PHP echo $root_path;?>function/ui/jquery.form.js"></SCRIPT> 
<SCRIPT language=JavaScript src="<?PHP echo $root_path;?>function/ajax_function.js"></SCRIPT> 
<script language="JavaScript" src="<?PHP echo $root_path;?>function/script_en.js"></script>
<!--<script language="JavaScript" src="<?PHP echo $root_path;?>function/ui/jquery.jqplugin.1.0.2.js"></script>-->
<script language="javascript">
function open_layer_detail(div_name,width,height){
	if(width==''){
		width=0;
	}
	if(height==''){
		height=0;
	}
	$.blockUI({
	message:$('#'+div_name),
		css:{ 
		cursor:'default',
		width: width + 'px',
		height:height+ 'px',
		padding:'0px',
		top:($(window).height()-height)/2 + 'px',
		left:($(window).width()-width)/2 + 'px'
		}
	});		
}


function open_loading_status(loading_name){
	width=$('#'+loading_name).css('width').replace("px","");
	height=$('#'+loading_name).css('height').replace("px","");
	$.blockUI({
	message:$('#'+loading_name),
		css:{ 
		cursor:'default',
		border:'',
		backgroundColor:'',
		width: width + 'px',
		height:height+ 'px',
		padding:'0px',
		top:($(window).height()-height)/2 + 'px',
		left:($(window).width()-width)/2 + 'px'
		}
	});
}
function close_layer_detail(){
	$.unblockUI();
}
function close_top_layer_detail(){
	top.$.unblockUI();
}
function wirte_iframe(){
	$('#iframe_string').empty();
	$('#iframe_string').html("<iframe height='0' name='rundata_action' id='rundata_action' frameborder='0' scrolling='no' width='0' style='display:none'  title='程式資料處理的位置'></iframe>");
}
//建立執行的div
$(function(){
	//$('body').prepend("<span id='iframe_string'></span>");
	$('body').prepend('<div id="waiting" style="position:absolute; left:0px; top:200px; width:100%; height:80px; z-index:999999;  display: none;"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><img src="<?PHP echo $root_path;?>function/wait.gif" width="300" height="80" /></td></tr></table></div><div id="waiting_type" style="display: none;" onClick="close_layer_detail()"><img src="<?PHP echo $root_path;?>function/wait.gif" width="300" height="80" /></div>');
	
});
//end
</script>