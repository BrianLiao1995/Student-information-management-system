<?php
header("Content-type:text/html;charset=utf-8");
include("../../database/Score_class.php");
$score = new Score();
$courses_id = trim($_POST["courses_id"]);
$users_id = trim($_POST["users_id"]);
// 查询信息
$data = $score->searchScore($users_id, $courses_id);
$ret['courses_id'] = $data[0]["courses_id"];
$ret['courses_name'] = $data[0]["courses_name"];
$ret['users_id'] = $data[0]["users_id"];
$ret['users_name'] = $data[0]["users_name"];
$ret['courses_type'] = $data[0]["courses_type"];
$ret['score_year'] = $data[0]["score_year"];
$ret['score_semester'] = $data[0]["score_semester"];
$ret['score_num'] = $data[0]["score_num"];
$ret['courses_type'] = $data[0]["courses_type"];
die(json_encode($ret));
?>