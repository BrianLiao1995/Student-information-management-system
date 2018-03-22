<?php
if (!isset($_COOKIE["lib_passwordRecov_users_id"]) || !isset($_COOKIE["lib_passwordRecov_authorcode"])) {
    echo "<script type='text/javascript'>alert('您的验证码已经过期！');window.location.href='../'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>广州大学学生学业管理系统 —— 密码找回</title>
    <script type="text/javascript" src="../js/checkAuthorCode.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <link href="../css/login.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div id="loginWrapper">
    <div class="leftContent">
        <img src="../images/login/gzhu-logo.png" alt="logo"/>
        <h1>广州大学学生学业管理系统！<br>密码找回</h1>
        <div class="rightContent">
            <div class="loginForm">
                <p>验证码：</p><input id="authocode" maxlength="5" size="20"/>
                <div>
                    <button onclick="checkAuthorCode()" class="loginButton">提交验证</button>
                </div>
            </div>
        </div>
</body>
</html>