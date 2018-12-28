<?php
//global $phpmailer;
//引入文件
// (Re)create it, if it's gone missing
//if ( !is_object( $phpmailer ) || ! $phpmailer instanceof PHPMailer ) {
if ( !is_object( $phpmailer )) {
	include("class.phpmailer.php");
	//宣告一個PHPMailer物件
	$phpmailer = new PHPMailer();
}
$phpmailer->IsMail();
//設定使用SMTP發送
$phpmailer->IsSMTP(); 
$phpmailer->Mailer = "smtp";
//設定為安全驗證方式
$phpmailer->SMTPAuth =$phpmail_smtpauth;
$phpmailer->SMTPSecure = $phpmail_smtpsecure; // Gmail的SMTP主機需要使用SSL連線 
$phpmailer->Host = $phpmail_host; //Gamil的SMTP主機 
$phpmailer->Port = $phpmail_port; //Gamil的SMTP主機的SMTP埠位為465埠。 
//SMTP的帳號
$phpmailer->Username = $phpmail_user;
//SMTP的密碼
$phpmailer->Password = $phpmail_password;
//設定信件字元編碼
$phpmailer->CharSet=$phpmail_charset;
//設定信件編碼，大部分郵件工具都支援此編碼方式
$phpmailer->Encoding = "base64";
//設置郵件格式為HTML
$phpmailer->IsHTML(true);
//每50自斷行
//$phpmailer->WordWrap = 50;//郵件標題
$phpmailer->Subject=$phpmail_subject;
//郵件內容
$phpmailer->Body =$phpmail_body;
//寄件人Email
$phpmailer->From =$phpmail_frommail;
//寄件人名稱
$phpmailer->FromName =$phpmail_fromname;//收件人Email   $phpmail_address_list寄送email陣列
if(count($phpmail_address_list)>0){
	for($phpmail_num=0;$phpmail_num<count($phpmail_address_list);$phpmail_num++){
		if(trim($phpmail_address_list[$phpmail_num])!=""){
			$phpmailer->AddAddress(trim($phpmail_address_list[$phpmail_num]));
		}
	}
}
//設定收件人的另一種格式("Email","收件人名稱")
//$phpmailer->AddAddress("yuyu@ibest.com.tw","柚子");
//設定密件副本
//$phpmailer->AddBCC("bignostriltao@gmail.com");
//回信Email及名稱
if(trim($phpmail_addreplyto)!=""){
	$phpmailer->AddReplyTo($phpmail_addreplyto);
}//附加內容
//$phpmailer->AltBody = '';//傳送附檔
//$phpmailer->AddAttachment("upload/temp/filename.zip");
//傳送附檔的另一種格式，可替附檔重新命名
//$phpmail_files_list檔案陣列 陣列 array("檔案位置","檔案名稱");
//$phpmail_files_data 檔案位置(包含虛擬路徑) ,$phpmail_files_name(傳送後的所顯示的檔名)
if(count($phpmail_files_list)>0){
	for($phpmail_num=0;$phpmail_num<count($phpmail_files_list);$phpmail_num++){
		if(trim($phpmail_files_list[$phpmail_num][0])!=""){
			$phpmail_files_data=trim($phpmail_files_list[$phpmail_num][0]);
			$phpmail_files_name=trim($phpmail_files_list[$phpmail_num][1]);
			if(trim($phpmail_files_name)!=""){
				$phpmailer->AddAttachment($phpmail_files_data,$phpmail_files_name);
			}else{
				$phpmailer->AddAttachment($phpmail_files_data);
			}
		}
	}
}//寄送郵件
if(!$phpmailer->Send())
{
	echo "寄送郵件有問題。";
	//exit;
}else{
	//清空剛才的設定
	$phpmailer->ClearAddresses();
	$phpmailer->ClearAllRecipients();
	$phpmailer->ClearAttachments();
	$phpmailer->ClearBCCs();
	$phpmailer->ClearCCs();
	$phpmailer->ClearCustomHeaders();
	$phpmailer->ClearReplyTos();
}
?>