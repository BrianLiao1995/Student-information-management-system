<?php
include("../../database/Users_class.php");
include("../checkEmailFormat.php");
$users = new Users();
$users_id = trim($_POST["users_id"]);
$users_name = trim($_POST["users_name"]);
$users_email = trim($_POST["users_email"]);
$users_major = trim($_POST["users_major"]);
$users_grade = trim($_POST["users_grade"]);
$users_school = trim($_POST["users_school"]);
$users_campus = trim($_POST["users_campus"]);
$users_type = trim($_POST["users_type"]);
$users_sex = trim($_POST["users_sex"]);
$users_class = trim($_POST["users_class"]);
$users_length = trim($_POST["users_length"]);

if ($users->checkExistedId($users_id) <= 0) {
    if ($users_school == "" || $users_id == "" || $users_name == "" || $users_sex == "" || $users_type == "" || $users_email == "") die("注册信息不完整，请检查！");
    if (is_email($users_email) == false) die("邮箱格式错误，请修改！");
    if ($users_type == "学生") {
        if ($users_length != "" && $users_class != "" && $users_grade != "" && $users_major != "") {
            echo $users->register($users_id, $users_name, $users_sex, $users_school, $users_major, $users_email, $users_class, $users_grade, $users_length, $users_type, $users_campus);
        } else echo "注册信息不完整，请检查！";
    } else echo $users->register($users_id, $users_name, $users_sex, $users_school, "", $users_email, "", "", "", $users_type, $users_campus);
} else {
    echo "已经存在了该用户编号，请换一个学生编号！";
}
?>