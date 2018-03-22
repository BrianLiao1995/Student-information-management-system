<?php
if (isset($_COOKIE["lib_users_type"])) {
    if ($_COOKIE["lib_users_type"] == '学生') echo "<script>window.location.href='students'</script>";
    else echo "<script>window.location.href='staffs/users_mgmt/index.php'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type="text/javascript" src="js/login.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>广州大学学生学业管理系统 —— 登录页</title>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link href="css/login.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div id="loginWrapper">
    <div class="leftContent">
        <img src="images/login/gzhu-logo.png" alt="logo"/>
        <h1>您好，欢迎您登录<br>广州大学学生学业管理系统！</h1>
        <div class="rightContent">
            <div class="loginForm">
                <p>用户学号（工号）:</p><input id="users_id" maxlength="12" size="20"/>
                <p>用户登录密码:</p><input type="password" id="users_password" maxlength="12" size="20"/>
                <div>
                    <button onclick="login()" class="loginButton">开始登录</button><button onclick="window.location.href='passwordRecov'" class="loginButton">忘记密码</button>
                </div>
            </div>
        </div>
</body>
</html>
