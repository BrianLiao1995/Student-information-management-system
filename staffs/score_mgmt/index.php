<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>课程管理</title>
    <link href="../../css/css.css" rel="Stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/searchScore.js"></script>
    <script type="text/javascript">
        function uploadNewScore() {
            window.location.href = "uploadNewScore.php";
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
                <h3>★ 成绩信息管理</h3>
                <div align="center" style="padding: 5px">
                    <h4>请填写以下信息，支持模糊查询（若您不确定课程编号或用户编号可以先进入相应页面进行查询）：</h4><br/>
                    <table align="center" border="0">
                        <tr>
                            <td><input id="checkbox_users_id" name="checkbox_users_id" type="checkbox"
                                       value=""/></td>
                            <td>课程编号：<input id="users_id" name="users_id" type="text" size="50"
                                            maxlength="100"
                                            onkeyup="this.value=this.value.replace(/\D/g,'')"
                                            onafterpaste="this.value=this.value.replace(/\D/g,'')"/>
                            <td/>
                        </tr>
                        <tr>
                            <td><input name="checkbox_courses_id" id="checkbox_courses_id" type="checkbox"
                                       value=""/>
                            </td>
                            <td>课程名称：<input id="courses_id" name="courses_id" type="text" size="50"
                                            maxlength="50"/></td>
                        </tr>
                    </table>

                    <table align="center" cellspacing="5px" cellpadding="5px" border="0">
                        <tr>
                            <td><input onclick="searchScore()" name="submit" value="开始查询" type="submit"
                                       class="button_style"/>
                            </td>
                            <td><input onclick="uploadNewScore()" name="submit" value="批量添加" type="submit"
                                       class="button_style"/>
                            </td>
                        </tr>
                    </table>
                    <div id="result"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <?php include '../templet/templet_footer.php' ?>
</div>
</body>
</html>