<?php
header("Content-type:text/html;charset=utf-8");
include "../../database/Structure_class.php";
$structure = new Structure();
$campus = $_POST["campus"];
$data = $structure->getSchools($campus);
$html = '';
foreach ($data as $v) {
    $html .= "<option value='" . $v . "'>" . $v . "</option>";
}
echo $html;
?>