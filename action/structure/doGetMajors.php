<?php
header("Content-type:text/html;charset=utf-8");
include "../../database/Structure_class.php";
$structure = new Structure();
$school = $_POST["school"];
$data = $structure->getMajors($school);
$html = '';
foreach ($data as $v) {
    $html .= "<option value='" . $v . "'>" . $v . "</option>";
}
echo $html;
?>