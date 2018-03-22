<?php
require_once 'setup.php';
include '../database/Score_class.php';
$score = new Score();
$result = '<script>alert("';
// 检查文件是否存在
if (!file_exists($_FILES['fileUpload']['tmp_name'])) {
    $result = $result . $_FILES['fileUpload']['name'] . "无法被找到！";
    goto a;
}
if ($_FILES['fileUpload']['type'] != "application/vnd.ms-excel") {
    $result = $result . "文件类型错误！成绩添加失败！";
} else {
    $objReader = PHPExcel_IOFactory::createReader('Excel5'); // use excel2007 for 2007 format
    $objPHPExcel = $objReader->load($_FILES['fileUpload']['tmp_name']);
    $sheet = $objPHPExcel->getSheet(0);
    $numOfRow = $sheet->getHighestRow(); // 取得总行数
    $numofColumn = $sheet->getHighestColumn(); // 取得总列数
    $k = 0;
// 循环读取excel文件，读取一条，先进行数据检查，如果无误
    for ($j = 3; $j <= $numOfRow; $j++) {
        $students_id = $objPHPExcel->getActiveSheet()->getCell("A" . $j)->getValue(); // 获取A列的值
        $courses_id = $objPHPExcel->getActiveSheet()->getCell("B" . $j)->getValue();
        $year = $objPHPExcel->getActiveSheet()->getCell("C" . $j)->getValue();
        $semester = $objPHPExcel->getActiveSheet()->getCell("D" . $j)->getValue();
        $num = $objPHPExcel->getActiveSheet()->getCell("E" . $j)->getValue();
        if ($num != "" && $num >= 0 && $num <= 100) {
            if ($score->checkCourseId($courses_id) && $score->checkStudentId($students_id)) {
                if ($score->checkRepetition($students_id, $courses_id, $year, $semester)) {
                    $score->electiveACourse($students_id, $courses_id, $year, $semester, $num);
                } else {
                    $result = $result . "数据库中已有第" . $j . "条记录，不可重复添加。添加中断！";
                    goto a;
                }
            } else {
                $result = $result . "第" . $j . "行学生编号或课程编号不存在于数据库中，请修改！添加中断！";
                goto a;
            }
        } else {
            $result = $result . "第" . $j . "行数据输入不完整，成绩输入必须在0到100之间！添加中断！";
            goto a;
        }
    }
    $result = $result . "全部添加成功！";
}
a:
echo $result = $result . '");window.history.go(-1);</script>';
?>