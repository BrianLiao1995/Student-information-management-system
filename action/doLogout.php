<?php
//退出
setcookie("lib_users_id", "", time() - 3600, "/");
setcookie("lib_users_type", "", time() - 3600, "/");
setcookie("lib_users_school", "", time() - 3600, "/");
echo "<script> window.location.href='../';</script>";
?>