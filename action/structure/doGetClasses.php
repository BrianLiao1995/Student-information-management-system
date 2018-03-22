<?php
header("Content-type:text/html;charset=utf-8");
include "../../database/Structure_class.php";
$structure = new Structure();
$major = $_POST["major"];
$data = $structure->getClasses($major);
$html = '';
foreach ($data as $v) {
    $html .= "<option value='" . $v . "'>" . $v . "</option>";
}
echo $html;
?>