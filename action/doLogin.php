<?php
// 利用ajax进行登录
$users_id = trim($_POST["users_id"]);
$users_password = trim($_POST["users_password"]);

$ret = array();
//接收参数验证
if (empty($users_id)) {
    $ret['code'] = 'ng';
    die(json_encode($ret));
}
if (empty($users_password)) {
    $ret['code'] = 'ng';
    die(json_encode($ret));
}
//数据库验证
include '../database/Users_class.php';//引入类
$users = new Users();
$ret = $users->login($users_id, $users_password);
if ($ret != false) {
    $expire_time = 24 * 3600;//24小时
    setcookie("lib_users_id", $ret['users_id'], time() + $expire_time, "/");
    setcookie("lib_users_type", $ret['users_type'], time() + $expire_time, "/");
    setcookie("lib_users_school", $ret['users_school'], time() + $expire_time, "/");

    $ret['code'] = 'ok';
    $ret['msg'] = $ret['users_type'];
    die(json_encode($ret));
} else {
    $ret['code'] = 'ng';
    $ret['msg'] = '登录失败，用户名或密码错误或您的账户已经过期！';
    die(json_encode($ret));
}
?>