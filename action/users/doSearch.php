<?php
include("../../database/Users_class.php");
$users = new Users();
$users_id = trim($_POST["users_id"]);
$users_name = trim($_POST["users_name"]);
$users_grade = trim($_POST["users_grade"]);
$users_major = trim($_POST["users_major"]);
$users_school = trim($_POST["users_school"]);
$users_class = trim($_POST["users_class"]);
$users_campus = trim($_POST["users_campus"]);
$users_email = trim($_POST["users_email"]);
$result_array = $users->returnStudentsInfo($users_id, $users_email, $users_name, $users_grade, $users_major, $users_school, $users_campus, $users_class); // 查询相关用户
if (!empty($result_array)) {
    $html = "<table border='1' cellpadding='5' cellspacing='5'>";
    $html .= "<tr>
						<td>用户编号</td>
						<td>用户名称</td>
						<td>用户班级</td>
						<td>用户邮箱</td>
						<td>用户专业</td>
						<td>用户性别</td>
						<td>用户校区</td>
						<td>用户学院</td>
						<td>用户专业</td>
						<td>用户年级</td>
						<td>用户类型</td>";

    if ($_COOKIE["lib_users_type"] == "管理员") {
        $html = $html . "<td>详细</td><td>删除</td>";
    }
    $html = $html . "</tr>";
    $data = '';
    foreach ($result_array as $v) {
        $data .= "<tr>
						<td>" . $v['users_id'] . "</td>
						<td>" . $v['users_name'] . "</td>
						<td>" . $v['users_class'] . "</td>
						<td>" . $v['users_email'] . "</td>
						<td>" . $v['users_major'] . "</td>
						<td>" . $v['users_sex'] . "</td>
						<td>" . $v['users_campus'] . "</td>
						<td>" . $v['users_school'] . "</td>
						<td>" . $v['users_major'] . "</td>
						<td>" . $v['users_grade'] . "</td>
						<td>" . $v['users_type'] . "</td>";
        if ($_COOKIE["lib_users_type"] == "管理员") {
            $data = $data . "<td>" . "<a href='../../profile/others.php?users_id=" . $v['users_id'] . "'>详细</a>" . "</td>";
            $data = $data . "<td>" . "<a href='../../action/users/doDelete.php?users_id=" . $v['users_id'] . "'>删除</a>" . "</td>";
        }
        $data = $data . "</tr>";
    }
    echo $html . $data . "</table>";
} else {
    echo "没有查询到任何结果！";
}
?>