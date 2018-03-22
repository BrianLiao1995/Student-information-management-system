<?php
error_reporting(E_ALL);
date_default_timezone_set('Europe/London');
/** PHPExcel */
require_once 'setup.php';
include "../database/Courses_class.php";
$courses = new Courses();
$courses_id = trim($_GET["courses_id"]);
$courses_name = trim($_GET["courses_name"]);
$courses_type = trim($_GET["courses_type"]);

// 创建一个新的PHPExcel实例
$objPHPExcel = new PHPExcel();

// 设置一些基本属性
$objPHPExcel->getProperties()->setCreator("Brian Liao")
    ->setLastModifiedBy("Brian Liao")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");
$objPHPExcel->getActiveSheet()->mergeCells('A1:L1');
$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

// 添加一些基本数据
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '课程查询导出表格')
    ->setCellValue('A2', '课程编号')
    ->setCellValue('B2', '课程名称')
    ->setCellValue('C2', '课程学分')
    ->setCellValue('D2', '课程类型');

$result_array = $courses->returnCoursesInfo($courses_id, $courses_name, $courses_type);
if (sizeof($result_array) > 0) {
    $count = 2;
    foreach ($result_array as $data) {
        $count += 1;
        $l1 = "A" . "$count";
        $l2 = "B" . "$count";
        $l3 = "C" . "$count";
        $l4 = "D" . "$count";
        $l5 = "E" . "$count";
        $l6 = "F" . "$count";
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($l1, $data['courses_id'])
            ->setCellValue($l2, $data["courses_name"])
            ->setCellValue($l3, $data["courses_credit"])
            ->setCellValue($l4, $data["courses_type"]);
    }
}
// 重新命名工作表
$objPHPExcel->getActiveSheet()->setTitle('课程查询导出表格');

// 设置一些其他的属性
$objPHPExcel->setActiveSheetIndex(0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="课程查询导出表格.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>