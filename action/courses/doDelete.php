<?php
include "../../database/Courses_class.php";
$courses = new Courses();
$courses_id = trim($_GET["courses_id"]);
$result = $courses->deleteACourse($courses_id);
echo "<script>alert('$result');window.history.go(-1);</script>";
?>