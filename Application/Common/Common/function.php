<?php
	
function SendMail($address,$title,$message)
{
require_once("./PHPMailer/class.phpmailer.php");
$mail=new PHPMailer();
// 设置PHPMailer使用SMTP服务器发送Email
$mail->IsSMTP();
// 设置邮件的字符编码，若不指定，则为'UTF-8'
$mail->CharSet='UTF-8';
// 添加收件人地址，可以多次使用来添加多个收件人
$mail->AddAddress($address);
// 设置邮件正文
$mail->Body=$message;
// 设置邮件头的From字段。
$mail->From=C('MAIL_ADDRESS');
// 设置发件人名字
$mail->FromName='Lan456 注册邮件，请查阅验证码';
// 设置邮件标题
$mail->Subject=$title;
// 设置SMTP服务器。
$mail->Host=C('MAIL_SMTP');
// 设置为“需要验证”
$mail->SMTPAuth=true;
// 设置用户名和密码。
$mail->Username=C('MAIL_LOGINNAME');
$mail->Password=C('MAIL_PASSWORD');
// 发送邮件。
return($mail->Send());
}

/**
 * 验证码检查
 */
function verify($code, $id = ""){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

//运费计算接口
function yfjs($tweight,$peisong,$province,$city,$county){
	if($peisong=='顺丰'){
		return 15;
	}else{
		return 20;
	}
}
