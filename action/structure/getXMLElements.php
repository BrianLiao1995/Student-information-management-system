<?php
header("Content-type:text/html;charset=utf-8");
$xml = simplexml_load_string(file_get_contents("structure.xml"));
echo "输出校区：";
$r = $xml->xpath('//campus');
foreach ($r as $a) {
    echo $a["name"];
}
echo PHP_EOL;

echo "大学城校区有什么学院：";
$r = $xml->xpath('//campus[@name="大学城校区"]/school');
foreach ($r as $a) {
    echo $a["name"] . PHP_EOL;
}
echo PHP_EOL;

echo "工商管理学院有什么专业：";
$r = $xml->xpath('//school[@name="工商管理学院"]/majors/major');
foreach ($r as $a) {
    echo $a["name"] . PHP_EOL;
}
echo PHP_EOL;

echo "房地产开发与管理有那些班级：";
$r = $xml->xpath('//major[@name="房地产开发与管理"]/classes/class');
foreach ($r as $a) {
    echo $a . PHP_EOL;
}
?>