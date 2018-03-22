<?php
$authocode = $_POST["authocode"];
echo $authocode == $_COOKIE["lib_passwordRecov_authorcode"];
?>