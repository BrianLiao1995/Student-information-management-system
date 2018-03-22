<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>批量添加用户</title>
    <link href="../../css/css.css" rel="Stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/uploadCoursesExcel.js"></script>
    <script type="text/javascript">
        function download() {
            window.location.href = "courses_example.xlsx";
        }
    </script>
</head>
<body>
<div class="wrap">
    <?php include '../templet/templet_top.php' ?>
    <div class="contain">
        <div class="side">
            <?php include '../templet/templet_left.php' ?>
        </div>
        <div class="main">
            <div class="photos" align="center">
                <h3 align="left">★ 批量添加用户</h3>
                请先下载模板→→→→<input type="button" onclick="download()" class="button_style" value="点击下载模板"/><br/>
                完成修改文件之后可以上传了→→→→
                <input style="color: white;" class="button_style" type="file" id="fileUpload" name="fileUpload">
                <input onclick="uploadCoursesExcel()" type="submit" name="submit">
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <?php include '../templet/templet_footer.php' ?>
</div>
</body>
</html>