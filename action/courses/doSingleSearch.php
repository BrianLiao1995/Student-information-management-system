<?php
header("Content-type:text/html;charset=utf-8");
include("../../database/Courses_class.php");
$courses = new Courses();
$courses_id = trim($_POST["courses_id"]);
// 查询信息
$data = $courses->returnCoursesInfo($courses_id, "", "");
$ret['courses_id'] = $data[0]["courses_id"];
$ret['courses_name'] = $data[0]["courses_name"];
$ret['courses_credit'] = $data[0]["courses_credit"];
$ret['courses_type'] = $data[0]["courses_type"];
die(json_encode($ret));
?>