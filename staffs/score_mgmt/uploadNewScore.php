<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>成绩信息添加</title>
    <link href="../../css/css.css" rel="Stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/searchScore.js"></script>
    <script type="text/javascript">
        function download() {
            window.location.href = "score_example.xls";
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
            <div class="photos">
                <h3>★ 成绩信息添加（成绩上传之后不能直接修改，需要删除原有记录才可重新添加，请注意！）</h3>
                <div align="center" style="padding: 5px">
                    <h4>请填写以下信息，支持模糊查询（若您不确定课程编号或用户编号可以先进入相应页面进行查询）：</h4><br/>
                    请先下载模板→→→→<input type="button" onclick="download()" class="button_style" value="点击下载模板"/><br/>
                    <form action="../../excel/excel_score_input.php" method="post" enctype="multipart/form-data">
                        完成修改文件之后可以上传了→→→→<input
                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                style="color: white;" class="button_style" type="file" id="fileUpload"
                                name="fileUpload">
                        <input value="提交" type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <?php include '../templet/templet_footer.php' ?>
</div>
</body>
</html>