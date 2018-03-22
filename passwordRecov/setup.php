<?php
include("PHPMailer/class.phpmailer.php");
include("PHPMailer/class.smtp.php");
function sendMail($to, $title, $content)
{
    $mail = new PHPMailer(); // 实例化PHPMailer核心类
    $mail->isSMTP(); // 使用smtp鉴权方式发送邮件
    $mail->SMTPAuth = true; //smtp需要鉴权，这个必须是true
    $mail->Host = 'smtp.qq.com'; // 链接qq域名邮箱的服务器地址
    $mail->SMTPSecure = 'ssl'; // 设置使用ssl加密方式登录鉴权
    $mail->Port = 465; // 设置ssl连接smtp服务器的远程服务器端口号
    $mail->Hostname = 'localhost'; // 设置发件人的主机域
    $mail->CharSet = 'UTF-8'; // 设置发送的邮件的编码，可选GB2312
    $mail->FromName = '广州大学学生学业信息管理系统'; // 设置发件人姓名（昵称）任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
    $mail->Username = '942770373@qq.com'; // smtp登录的账号
    $mail->Password = 'gaxunzkwzprfbfei'; // smtp登录的密码
    $mail->From = '942770373@qq.com'; // 设置发件人的邮箱地址
    $mail->isHTML(true); // 邮件正文是否为html编码，注意此处是一个方法，不再是属性
    $mail->addAddress($to, '尊敬的老师/学生'); // 设置收件人邮箱地址，该方法有两个参数，第一个参数为收件人的邮箱地址，第二个参数为给该地址设置的昵称
    $mail->Subject = $title; // 添加该邮件的主题
    $mail->Body = $content; // 添加邮件的正文，上面已经将isHTML设置成了true，则可以是完整的html字符串
    if ($mail->send()) return true;
    else return false;
}

?>