<?php
include("../../database/Score_class.php");
$score = new Score();
$way = trim($_POST["way"]);
$year = trim($_POST["year"]);
$semester = trim($_POST["semester"]);
$result_array = $score->searchByStudents($way, $year, $semester);

if (!empty($result_array)) {
    $html = "<table width='100%' border='1' cellpadding='5' cellspacing='5'>";
    $html .= "<tr>
						<td>课程编号</td>
						<td>课程名称</td>
						<td>课程学分</td>
						<td>开课学院</td>
						<td>开课专业</td>
						<td>开课学年</td>
						<td>开课学期</td>
						<td>成绩/成绩</td>
						<td>课程类型</td>
				 </tr>";
    $data = '';
    foreach ($result_array as $v) {
        $data .= "<tr>
						<td>" . $v['courses_id'] . "</td>
						<td>" . $v['courses_name'] . "</td>
						<td>" . $v['courses_credit'] . "</td>
						<td>" . $v['users_school'] . "</td>
						<td>" . $v['users_major'] . "</td>
						<td>" . $v['score_year'] . "</td>
						<td>" . $v['score_semester'] . "</td>
						<td>" . $v['score_num'] . "</td>
						<td>" . $v['courses_type'] . "</td>
				 </tr>";
    }
    echo $html . $data . "</table>";
} else {
    echo "没有查询到任何结果！";
}
?>