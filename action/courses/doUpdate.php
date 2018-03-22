<?php
include "../../database/Courses_class.php";
$courses = new Courses();
$courses_id = $_POST['courses_id'];
$courses_name = $_POST['courses_name'];
$courses_credit = $_POST['courses_credit'];
$courses_type = $_POST['courses_type'];
echo $courses->updateACourseInfo($courses_id, $courses_name, $courses_credit, $courses_type);
?>