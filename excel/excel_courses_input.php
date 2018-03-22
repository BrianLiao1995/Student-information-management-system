<?php
require_once 'setup.php';
include '../database/Users_class.php';

echo $filename = $_POST["filename"];

// 检查文件是否存在
/*if (!file_exists($filename)) {
    die($filename . "无法被找到！");
}

$objReader = PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load($filename); //$filename可以是上传的文件 ，或者是指定的文件
$sheet = $objPHPExcel->getSheet(0);
$numOfRow = $sheet->getHighestRow(); // 取得总行数
$numofColumn = $sheet->getHighestColumn(); // 取得总列数
$k = 0;
$users = new Users();

for ($j = 3; $j <= $numOfRow; $j++) {
    $users_id = $objPHPExcel->getActiveSheet()->getCell("A" . $j)->getValue();
    $users_name = $objPHPExcel->getActiveSheet()->getCell("B" . $j)->getValue();
    $users_sex = $objPHPExcel->getActiveSheet()->getCell("C" . $j)->getValue();
    $users_campus = $objPHPExcel->getActiveSheet()->getCell("D" . $j)->getValue();
    $users_school = $objPHPExcel->getActiveSheet()->getCell("E" . $j)->getValue();
    $users_major = $objPHPExcel->getActiveSheet()->getCell("F" . $j)->getValue();
    $users_class = $objPHPExcel->getActiveSheet()->getCell("G" . $j)->getValue();
    $users_length = $objPHPExcel->getActiveSheet()->getCell("H" . $j)->getValue();
    $users_grade = $objPHPExcel->getActiveSheet()->getCell("I" . $j)->getValue();
    $users_type = $objPHPExcel->getActiveSheet()->getCell("J" . $j)->getValue();

    echo $users->register($users_id, $users_name, $users_sex, $users_school, $users_major, $users_class, $users_grade, $users_length, $users_type, $users_campus);
}*/
?>