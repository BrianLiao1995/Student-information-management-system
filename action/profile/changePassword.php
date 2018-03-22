<?php
header("Content-type:text/html;charset=utf-8");
include "../../database/Users_class.php";
$users_id = $_POST["users_id"];
$oldPassword = $_POST["oldPassword"];
$newPassword = $_POST["newPassword"];
$users = new Users();
if ($users->checkOldPassword($oldPassword)) {
    if ($users->changePassword($users_id, $newPassword)) {
        echo true;
    } else echo false;
} else echo "您的旧密码输入错误，请检查后重新输入！";
?>