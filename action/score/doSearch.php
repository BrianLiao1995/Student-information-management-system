<?php
include("../../database/Score_class.php");
$score = new Score();
$courses_id = trim($_POST["courses_id"]);
$users_id = trim($_POST["users_id"]);
$result_array = $score->searchScore($users_id, $courses_id);

if (!empty($result_array)) {
    $html = "<table width='100%' border='1' cellpadding='5' cellspacing='5'>";
    $html .= "<tr>
						<td>课程编号</td>
						<td>课程名称</td>
						<td>学生编号</td>
						<td>学生姓名</td>
						<td>课程类型</td>
						<td>开课学年</td>
						<td>开课学期</td>
						<td>成绩</td>
						<td>课程类型</td>
						<td>删除</td>
				 </tr>";
    $data = '';
    foreach ($result_array as $v) {
        $data .= "<tr>
						<td>" . $v['courses_id'] . "</td>
						<td>" . $v['courses_name'] . "</td>
						<td>" . $v['users_id'] . "</td>
						<td>" . $v['users_name'] . "</td>
						<td>" . $v['courses_type'] . "</td>
						<td>" . $v['score_year'] . "</td>
						<td>" . $v['score_semester'] . "</td>
						<td>" . $v['score_num'] . "</td>
						<td>" . $v['courses_type'] . "</td>
						<td><a href = '../../action/score/doDelete.php?score_id=" . $v['score_id'] . "'> 删除</a></td>
            </tr > ";
    }
    echo $html . $data . "</table > ";
} else {
    echo "没有查询到任何结果！";
}
?>