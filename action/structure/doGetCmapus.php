<?php
header("Content-type:text/html;charset=utf-8");
include "../../database/Structure_class.php";
$structure = new Structure();
echo $structure->getCampus();
?>