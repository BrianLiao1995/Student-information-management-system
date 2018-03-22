<?php
include("../database/Users_class.php");
include("../passwordRecov/setup.php");
$users = new Users();
$users_id = $_POST["users_id"];
$users_email = $_POST["users_email"];
if ($users->checkExistedUsers($users_email, $users_id)) {
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $result = "";
    for ($i = 0; $i <= 4; $i++) {
        $num[$i] = rand(0, 25);
        $result .= $str[$num[$i]];
    }

    if (!isset($_COOKIE["lib_passwordRecov_users_id"])) {
        setcookie("lib_passwordRecov_users_id", $users_id, time() + 60, "/");
    }
    $_COOKIE["lib_passwordRecov_users_id"] = $users_id;
    if (!isset($_COOKIE["lib_passwordRecov_authorcode"])) {
        setcookie("lib_passwordRecov_authorcode", $result, time() + 60, "/");
    }
    $_COOKIE["lib_passwordRecov_authorcode"] = $result;
    $flag = sendMail($users_email, '广州大学学生学业管理系统——密码找回', '广州大学学生学业管理系统——密码找回，验证码：' . $result . '。请及时登录系统进行密码修改！');
    echo $flag;
} else echo false;
?>