<?php
include("../../database/Courses_class.php");
$courses = new Courses();
$courses_id = trim($_POST["courses_id"]);
$courses_name = trim($_POST["courses_name"]);
$courses_type = trim($_POST["courses_type"]);

$result_array = $courses->returnCoursesInfo($courses_id, $courses_name, $courses_type);
if (!empty($result_array)) {
    $html = "<table border='1' align='center' width='100%' cellpadding='5' cellspacing='5'>";
    $html .= "<tr>
						<td>课程编号</td>
						<td>课程名称</td>
						<td>课程学分</td>
						<td>课程类型</td>
						<td>删除</td>
						<td>修改</td>
				 </tr>";
    $data = '';
    foreach ($result_array as $v) {
        $data .= "<tr>
						<td>" . $v['courses_id'] . "</td>
						<td>" . $v['courses_name'] . "</td>
						<td>" . $v['courses_credit'] . "</td>
						<td>" . $v['courses_type'] . "</td>";
        if ($_COOKIE["lib_users_type"] == "管理员") {
            $data = $data . "<td>" . "<a href='../../action/courses/doDelete.php?courses_id=" . $v['courses_id'] . "'>删除</a>" . "</td>
						<td>" . "<a href='../courses_mgmt/updateACourse.php?courses_id=" . $v['courses_id'] . "'>修改</a>" . "</td>";
        }
        $data = $data . " </tr > ";
    }
    echo $html . $data . "</table > ";
} else {
    echo "没有查询到任何结果！";
}
?>