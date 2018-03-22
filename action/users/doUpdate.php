<?php
include("../../database/Users_class.php");
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
?>