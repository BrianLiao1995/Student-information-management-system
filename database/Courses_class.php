<?php
include 'Database_class.php';
header("Content-Type: text/html; charset=UTF-8");

class Courses extends Database
{ // 继承基类

    // 返回所有成绩数据
    function returnAllData()
    {
        $sql = "SELECT * FROM courses";
        $rs = Database::query($sql);
        $ret = Database::fetch_all($rs);
        return $ret;
    }

    function checkExistedId($courses_id)
    {
        $sql = "SELECT * FROM courses WHERE courses.courses_id =  '$courses_id'";
        $rs = Database::query($sql);
        if (mysql_num_rows($rs) > 0) return true;
        else return false;
    }

    function returnCoursesInfo($courses_id, $courses_name, $courses_type)
    {
        $sql = "SELECT * FROM brian_lib.courses";
        $condition = " WHERE 1 = 1";
        if ($courses_id != "") $condition = $condition . " AND courses_id LIKE '%$courses_id%'";
        if ($courses_name != "") $condition = $condition . " AND courses_name LIKE '%$courses_name%'";
        if ($courses_type != "") $condition = $condition . " AND courses_type LIKE '%$courses_type%'";
        $sql = $sql . $condition;
        // 进行查询
        $rs = Database::query($sql);
        $data = Database::fetch_all($rs);
        return $data;
    }

    function addANewCourse($courses_id, $courses_name, $courses_credit, $courses_type)
    {
        if ($courses_id != "" && $courses_name != "" && $courses_credit != "") {
            if ($this->checkExistedId($courses_id)) {
                return "课程编号为" . $courses_id . "已经存在，请换一个课程编号！";
            }
            $sql = "INSERT INTO brian_lib.courses (courses_id, courses_name, courses_credit, courses_type) VALUES('$courses_id', '$courses_name', '$courses_credit', '$courses_type')";
            $rs = Database::query($sql);
            if ($rs) return true;
            else return false;
        } else return "你有应输入的项目没有输入，请检查后重新提交！";
    }

    function updateACourseInfo($courses_id, $courses_name, $courses_credit, $courses_type)
    {
        if (!empty($courses_id) && !empty($courses_name) && !empty($courses_credit) && !empty($courses_type)) {
            $sql = "UPDATE courses SET courses.courses_credit = '$courses_credit', courses.courses_name = '$courses_name', courses.courses_type = '$courses_type' WHERE courses.courses_id = '$courses_id'";
            $rs = Database::query($sql);
            if ($rs) return true;
            else return false;
        } else return "你有应输入的项目没有输入，请检查后重新提交！！";
    }

    function deleteACourse($courses_id)
    {
        if ($courses_id != "") {
            $sql = "DELETE FROM brian_lib.courses WHERE courses_id = '$courses_id'";
            $rs = Database::query($sql);
            if ($rs) return "已经成功删除该课程！";
            else return "课程删除失败！";
        } else return "你有应输入的项目没有输入，请检查后重新提交！！";
    }
}

?>