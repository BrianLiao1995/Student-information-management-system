<?php
header("Content-type:text/html;charset=utf-8");
include "../../database/Users_class.php";
$ret = array();
$users_id = $_POST["users_id"];
$users = new Users();
// 查询信息
$data = $users->returnStudentsInfo($users_id, "", "", "", "", "", "", "");
$ret['users_id'] = $data[0]["users_id"];
$ret['users_name'] = $data[0]["users_name"];
$ret['users_grade'] = $data[0]["users_grade"];
$ret['users_major'] = $data[0]["users_major"];
$ret['users_school'] = $data[0]["users_school"];
$ret['users_type'] = $data[0]["users_type"];
$ret['users_class'] = $data[0]["users_class"];
$ret['users_campus'] = $data[0]["users_campus"];
$ret['users_length'] = $data[0]["users_length"];
$ret['users_email'] = $data[0]["users_email"];
// 返回信息
die(json_encode($ret));
?>