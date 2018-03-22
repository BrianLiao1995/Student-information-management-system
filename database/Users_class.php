<?php
include 'Database_class.php';
header("Content-Type: text/html; charset=UTF-8");

class Users extends Database
{ // 继承基类

    // 返回所有用户数据
    function returnAllData()
    {
        $sql = "SELECT * FROM users";
        $rs = Database::query($sql);
        $ret = Database::fetch_all($rs);
        return $ret;
    }

    function changePassword($users_id, $users_password)
    {
        if ($users_id != "" && $users_password != "") {
            $query = "UPDATE users SET users.users_password = PASSWORD('$users_password') WHERE users.users_id = '$users_id'";
            $rs = Database::query($query);
            if ($rs) return true;
            else return false;
        }
    }

    function changeEmail($users_id, $users_email)
    {
        if ($users_id != "" && $users_email != "") {
            $query = "UPDATE users SET users.users_email = '$users_email' WHERE users.users_id = '$users_id'";
            $rs = Database::query($query);
            if ($rs) return true;
            else return false;
        }
    }

    function checkOldPassword($users_password)
    {
        $users_id = $_COOKIE["lib_users_id"];
        if ($users_id != "" && $users_password != "") {
            $sql = "SELECT * FROM users WHERE users.users_id = '$users_id' AND users.users_password = PASSWORD('$users_password')";
            $rs = Database::query($sql);
            if (mysql_num_rows($rs) > 0) return true;
            else return false;
        }
    }

    function checkExistedId($users_id)
    {
        $sql = "SELECT * FROM users WHERE users.users_id = '$users_id'";
        $rs = Database::query($sql);
        if (mysql_num_rows($rs) > 0) return true;
        else return false;
    }

    function checkExistedUsers($users_email, $users_id)
    {
        $sql = "SELECT * FROM users WHERE users.users_id = '$users_id' AND users_email = '$users_email'";
        $rs = Database::query($sql);
        if (mysql_num_rows($rs) > 0) return true;
        else return false;
    }

    // 用户查询
    function returnStudentsInfo($users_id, $users_email, $users_name, $users_grade, $users_major, $users_school, $users_campus, $users_class)
    {
        $sql = "SELECT * FROM users";
        $condition = "1 = 1 ";
        // 判断相应条件
        if (!empty($users_id)) $condition = $condition . "AND users_id LIKE '%$users_id%' ";
        if (!empty($users_name)) $condition = $condition . "AND users_name LIKE '%$users_name%' ";
        if (!empty($users_email)) $condition = $condition . "AND users_email LIKE '%$users_email%' ";
        if (!empty($users_school)) $condition = $condition . "AND users_school LIKE '%$users_school%' ";
        if (!empty($users_major)) $condition = $condition . "AND users_type = '学生' AND users_major LIKE '%$users_major%' ";
        if (!empty($users_grade)) $condition = $condition . "AND users_type = '学生' AND users_grade LIKE '%$users_grade%' ";
        if (!empty($users_campus)) $condition = $condition . "AND users_type = '学生' AND users_campus LIKE '%$users_campus%' ";
        if (!empty($users_class)) $condition = $condition . "AND users_type = '学生' AND users_class LIKE '%$users_class%' ";
        $sql = $sql . " WHERE " . $condition;
        // 进行查询
        $rs = Database::query($sql);
        $data = Database::fetch_all($rs);
        return $data;
    }

    function getUsers_type($users_id)
    {
        $sql = "SELECT users.users_type FROM users WHERE users.users_id = '$users_id' LIMIT 1";
        $rs = Database::query($sql);
        $data = Database::fetch_all($rs);
        foreach ($data as $v) {
            return $v['users_type'];
        }
    }

// 登录
    function login($users_id, $users_password)
    {
        if (!empty($users_id) && !empty($users_password)) {
            if ($this->getUsers_type($users_id) != "学生")
                $sql = "SELECT users.users_id, users.users_name, users.users_type, users.users_school FROM users WHERE users.users_id = '$users_id' AND users.users_password = PASSWORD('$users_password') AND users.users_type != '学生' LIMIT 1";
            else {
                $sql = "SELECT users.users_id, users.users_name, users.users_type, users.users_school FROM users WHERE users.users_id = '$users_id' AND users.users_password = PASSWORD('$users_password') AND users.users_grade+users.users_length = DATE_FORMAT(NOW(), '%Y') AND users.users_type = '学生' LIMIT 1";
            }
            $rs = Database::query($sql);
            $ret = Database::fetch_one($rs);
            if ($ret) {
                return $ret;
            }
            return false;
        }
        return false;
    }

// 注册新用户
    function register($users_id, $users_name, $users_sex, $users_school, $users_major, $users_email, $users_class, $users_grade, $users_length, $users_type, $users_campus)
    {
        if ($this->checkExistedId($users_id)) {
            return "已经存在了编号为" . $users_id . "该用户！";
        } else {
            $sql = "INSERT INTO brian_lib.users (users_id, users_password, users_name, users_sex, users_email, users_school, users_major, users_class, users_grade, users_length, users_type, users_campus) VALUES ('$users_id', PASSWORD('111111'), '$users_name', '$users_sex', '$users_email', '$users_school', '$users_major', '$users_class', '$users_grade', '$users_length', '$users_type', '$users_campus')";
            $rs = Database::query($sql);
            if ($rs) return true;
            else return false;
        }
    }

// 删除用户信息
    function deleteAUser($users_id)
    {
        if ($users_id != "") {
            $query = "DELETE FROM users WHERE users.users_id = '$users_id'";
            $rs = Database::query($query);
            if ($rs) return "已经成功删除该用户！";
            else return "删除失败！";
        } else return "无法获取到要删除的用户的编号！";
    }

// 更新用户信息
    function updateAUsersInfo($users_id, $users_password, $users_name, $users_sex, $users_email, $users_school, $users_major, $users_class, $users_grade, $users_length, $users_type, $users_campus)
    {
        if (!empty($users_school) && !empty($users_id) && !empty($users_name) && !empty($users_sex) && !empty($users_type) && !empty($users_password) && !empty($users_email)) {

            $sql = "UPDATE users SET users_password = '$users_password' ,users_name = '$users_name', users_sex = '$users_sex' , users_email = '$users_email' , users_school = '$users_school' , users_major = '$users_major' , users_class = '$users_class' , users_grade = '$users_grade' , users_length = '$users_length' , users_type = '$users_type' , users_campus = '$users_campus' WHERE users_id = '$users_id'";

            $rs = Database::query($sql);
            if ($rs) return "已经成功修改该用户！";
            else return "修改失败！";
        } else return "修改信息不完整，请重新输入！";
    }
}

?>