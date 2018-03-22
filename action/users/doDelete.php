<?php
include("../../database/Users_class.php");
$users = new Users();
$users_id = trim($_GET["users_id"]);
$result = $users->deleteAUser($users_id);
echo "<script>alert('$result');window.history.go(-1);</script>";
?>