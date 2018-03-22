<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>课程管理</title>
    <link href="../../css/css.css" rel="Stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/searchCourses.js"></script>
    <script type="text/javascript">
        var courses_id = "";
        var courses_name = "";
        var courses_type = "";

        function outputResult() {
            window.location.href = '../../excel/excel_courses_output.php?courses_id=' + courses_id + '&courses_name=' + courses_name + '&courses_type=' + courses_type;
        }

        function addCourse() {
            window.location.href = 'addSingleCourse.php';
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
                <h3>★ 课程信息管理</h3>
                <div align="center" style="padding: 5px">
                    <h4>请填写以下信息，支持模糊查询：</h4><br/>
                    <table align="center" border="0">
                        <tr>
                            <td><input id="checkbox_courses_id" name="checkbox_courses_id" type="checkbox"
                                       value=""/></td>
                            <td>课程编号：<input id="courses_id" name="courses_id" type="text" size="50"
                                            maxlength="100"
                                            onkeyup="this.value=this.value.replace(/\D/g,'')"
                                            onafterpaste="this.value=this.value.replace(/\D/g,'')"/>
                            <td/>
                        </tr>
                        <tr>
                            <td><input name="checkbox_courses_name" id="checkbox_courses_name" type="checkbox"
                                       value=""/>
                            </td>
                            <td>课程名称：<input id="courses_name" name="courses_name" type="text" size="50"
                                            maxlength="50"/></td>
                        </tr>

                        <tr>
                            <td><input id="checkbox_courses_type" name="checkbox_courses_type" type="checkbox"
                                       value=""/>
                            </td>
                            <td>课程类型：<select id="courses_type" name="courses_type">
                                    <option value="专业必修课程">专业必修课程</option>
                                    <option value="集中性实践教学环节">集中性实践教学环节</option>
                                    <option value="专业选修课程">专业选修课程</option>
                                    <option value="通识类必修课程">通识类必修课程</option>
                                    <option value="精品通识选修课程">精品通识选修课程</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <table align="center" cellspacing="5px" cellpadding="5px" border="0">
                        <tr>
                            <td><input onclick="searchCourses()" name="submit" value="开始查询" type="submit"
                                       class="button_style"/>
                            </td>
                            <td>
                                <input onclick="outputResult()" name="submit" value="导出结果" type="submit"
                                       class="button_style"/>
                            </td>
                            <?php
                            if ($_COOKIE["lib_users_type"] == "管理员")
                                echo '<td><input onclick="addCourse()" name="submit" value="添加课程" type="submit"
                                       class="button_style"/></td>';
                            ?>
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