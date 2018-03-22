<?php
include 'Database_class.php';
header("Content-Type: text/html; charset=UTF-8");

class Score extends Database
{ // 继承基类

    // 返回所有成绩数据
    function returnAllData()
    {
        $sql = "SELECT * FROM score";
        $rs = Database::query($sql);
        $ret = Database::fetch_all($rs);
        return $ret;
    }

    function searchScore($users_id, $courses_id)
    {
        $sql = "SELECT courses.courses_id, courses.courses_type, users.users_id, courses.courses_id, courses.courses_name, users.users_name, score.score_semester, score.score_id, score.score_year, score.score_num FROM users, score, courses WHERE courses.courses_id = score.score_course_id AND score.score_student_id = users.users_id";
        if ($users_id != "") $sql = $sql . " AND users.users_id LIKE '%$users_id%'";
        if ($courses_id != "") $sql = $sql . " AND courses.courses_id LIKE '%$courses_id%'";
        $rs = Database::query($sql);
        $ret = Database::fetch_all($rs);
        return $ret;
    }

    function searchByStudents($way, $year, $semester)
    {
        $sql = "SELECT courses.courses_type, users.users_school, users.users_class, users.users_major,courses.courses_id, courses.courses_name, courses.courses_credit, score.score_semester, score.score_year, score.score_num, score.score_id FROM users, score, courses WHERE score_student_id = '" . $_COOKIE["lib_users_id"] . "'AND courses.courses_id = score.score_course_id AND score.score_student_id = users.users_id";
        if ($way == "year") {
            if ($year != "") {
                $sql = $sql . " AND score.score_year = '$year'";
            } else return "请选择要查询的年份！";
        } else if ($way == "semester") {
            if ($year != "" || $semester != "") {
                $sql = $sql . " AND score.score_year = '$year' AND score.score_semester = '$semester'";
            } else return "请选择要查询的年份和学期！";
        }

        $rs = Database::query($sql);
        $ret = Database::fetch_all($rs);
        return $ret;
    }

// 检查数据库中是不是已经有了相关记录
    function checkRepetition($students_id, $courses_id, $year, $semester)
    {
        $sql = "SELECT * FROM score WHERE score.score_course_id = '$courses_id' AND score.score_semester = '$semester' AND score.score_student_id = '$students_id' AND score.score_year = '$year'";
        $rs = Database::query($sql);
        if (mysql_num_rows($rs) > 0) return false;
        else return true;
    }

    function checkStudentId($students_id)
    {
        return $sql = "SELECT * FROM users WHERE users_id = '$students_id'";
        $rs = Database::query($sql);
        if (mysql_num_rows($rs) > 0) return true;
        else return false;
    }

    function checkCourseId($courses_id)
    {
        $sql = "SELECT * FROM courses WHERE courses_id = '$courses_id'";
        $rs = Database::query($sql);
        if (mysql_num_rows($rs) > 0) return true;
        else return false;
    }

// 添加一条课程学习记录
    function electiveACourse($students_id, $courses_id, $year, $semester, $num)
    {
        $sql = "insert  into `score`(`score_id`,`score_course_id`,`score_student_id`,`score_num`,`score_year`,`score_semester`) VALUES(MD5(RAND()), '$courses_id', '$students_id', '$num', '$year', '$semester')";
        $rs = Database::query($sql);
        if ($rs) return "学生选课成功！";
        else return "学生选课失败！";
    }

// 给成绩表中的记录添加或者修改成绩
    function updateScoreInfo($score_id, $score_num)
    {
        if ($score_id != "" && $score_num != "") {
            $sql = "UPDATE brian_lib . score SET score_num = '$score_num' WHERE score_id = '$score_id'";
            $rs = Database::query($sql);
            if ($rs) return "成绩添加成功！";
            else return "成绩添加失败！";
        } else return "你有应输入的项目没有输入，请检查后重新提交！";
    }

// 删除成绩表中的相关记录
    function deleteScoreInfo($score_id)
    {
        if ($score_id != "") {
            $sql = "DELETE FROM score WHERE score.score_id = '$score_id'";
            $rs = Database::query($sql);
            if ($rs) return "成绩删除成功！";
            else return "成绩删除失败！";
        }
    }
}

?>