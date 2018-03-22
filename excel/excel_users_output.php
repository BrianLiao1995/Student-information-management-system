<?php
error_reporting(E_ALL);
date_default_timezone_set('Europe/London');
/** PHPExcel */
require_once 'setup.php';
include "../database/Users_class.php";

$users_id = trim($_GET["users_id"]);
$users_name = trim($_GET["users_name"]);
$users_grade = trim($_GET["users_grade"]);
$users_major = trim($_GET["users_major"]);
$users_school = trim($_GET["users_school"]);
$users_class = trim($_GET["users_class"]);
$users_campus = trim($_GET["users_campus"]);
$users_email = trim($_GET["users_email"]);

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
    ->setCellValue('A1', '用户信息表格')
    ->setCellValue('A2', '用户编号')
    ->setCellValue('B2', '用户名称')
    ->setCellValue('C2', '用户性别')
    ->setCellValue('D2', '用户邮箱')
    ->setCellValue('E2', '所在校区')
    ->setCellValue('F2', '所在学院')
    ->setCellValue('G2', '所学专业')
    ->setCellValue('H2', '所在年级')
    ->setCellValue('I2', '所在班级')
    ->setCellValue('J2', '用户类型');

$users = new Users();
$result_array = $users->returnStudentsInfo($users_id, $users_email, $users_name, $users_grade, $users_major, $users_school, $users_campus, $users_class); // 查询数据并返回
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
        $l7 = "G" . "$count";
        $l8 = "H" . "$count";
        $l9 = "I" . "$count";
        $l10 = "J" . "$count";

        if ($data["users_type"] != "学生") {
            $data['users_major'] = "无";
            $data["user_class"] = "无";
            $data["users_length"] = "无";
        }

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($l1, $data['users_id'])
            ->setCellValue($l2, $data['users_name'])
            ->setCellValue($l3, $data['users_sex'])
            ->setCellValue($l4, $data['users_email'])
            ->setCellValue($l5, $data['users_campus'])
            ->setCellValue($l6, $data['users_school'])
            ->setCellValue($l7, $data['users_major'])
            ->setCellValue($l8, $data['users_grade'])
            ->setCellValue($l9, $data["users_class"])
            ->setCellValue($l10, $data["users_type"]);
    }
}
// 重新命名工作表
$objPHPExcel->getActiveSheet()->setTitle('已查询到用户信息导出');

// 设置一些其他的属性
$objPHPExcel->setActiveSheetIndex(0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="已查询到用户信息导出.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>