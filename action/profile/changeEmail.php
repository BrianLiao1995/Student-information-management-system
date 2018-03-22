<?php
header("Content-type:text/html;charset=utf-8");
include "../../database/Users_class.php";
include "../checkEmailFormat.php";
$users_id = $_POST["users_id"];
$newEmail = $_POST["newEmail"];
$users = new Users();
if (is_email($newEmail)) {
    if ($users->changeEmail($users_id, $newEmail)) {
        echo true;
    } else echo false;
} else return false;
?>