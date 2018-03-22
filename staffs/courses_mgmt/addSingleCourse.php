<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>添加一个新课程</title>
    <link href="../../css/css.css" rel="Stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/addACourse.js"></script>
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
                <h3>★ 添加一个新课程</h3>
                <h2 align="center">添加一个新课程</h2>
                <div style="padding: 5px;" align="center">
                    <table align="center" border="0"><br/>
                        <tr>
                            <td>课程编号：<input id="courses_id" name="courses_id" type="text" size="50"
                                            maxlength="100"
                                            onkeyup="this.value=this.value.replace(/\D/g,'')"
                                            onafterpaste="this.value=this.value.replace(/\D/g,'')"/>
                            <td/>
                        </tr>

                        <tr>
                            <td>课程名称：<input id="courses_name" name="courses_name" type="text" size="50"
                                            maxlength="50"/></td>
                        </tr>

                        <tr>
                            <td>课程学分：<input id="courses_credit" name="courses_credit" type="text" size="50"
                                            maxlength="3" onkeyup="this.value=this.value.replace(/\D/g,'')"
                                            onafterpaste="this.value=this.value.replace(/\D/g,'')"/></td>
                        </tr>

                        <tr>
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
                    <br/>
                    <table align="center" cellspacing="5px" cellpadding="5px" border="0">
                        <tr>
                            <td><input onclick="addACourse()" name="submit" value="添加课程" type="submit"
                                       class="button_style"/>
                            </td>
                            <td>
                                <input onclick="window.history.go(-1);" name="submit" value="返回上页" type="submit"
                                       name="submit" value="导出结果" type="submit" class="button_style"/>
                            </td>
                        </tr>
                    </table>
                    <br/>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include '../templet/templet_footer.php' ?>
</div>
</body>
</html>