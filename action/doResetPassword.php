<?php
include "../database/Users_class.php";
$users = new Users();
setcookie("lib_passwordRecov_users_id", "", time() - 60, "/");
setcookie("lib_passwordRecov_authorcode", "", time() - 60, "/");
$newPassword = $_POST["newPassword"];
$users_id = $_POST["users_id"];
if ($newPassword != "" && $users_id != "") {
    echo $users->changePassword($users_id, $newPassword);
} else echo false;
?>