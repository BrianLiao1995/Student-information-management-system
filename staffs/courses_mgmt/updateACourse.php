<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>个人信息修改</title>
    <script type="text/javascript" src="../../js/updateACourseInfo.js"></script>
    <link href="../../css/css.css" rel="Stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript">
        function init(courses_id) {
            //服务器端进行查询
            $.ajax({
                type: "POST",
                url: "../../action/courses/doSingleSearch.php",
                cache: false,
                data: {courses_id: courses_id,},
                dataType: 'json',
                success: function (ret) { //查询请求成功
                    $("#courses_id").val(ret.courses_id);
                    $("#courses_name").val(ret.courses_name);
                    $("#courses_credit").val(ret.courses_credit);
                    $("#courses_type").val(ret.courses_type);
                },
                error: function (e) { //查询请求异常
                    alert("异常：" + e);
                }
            })
        }
    </script>
</head>
<body onload="init(<?php echo $_GET['courses_id'] ?>)">

<div class="wrap">
    <?php include '../templet/templet_top.php' ?>
    <div class="contain">
        <div class="side">
            <?php include '../templet/templet_left.php' ?>
        </div>

        <div class="main">
            <div class="photos">
                <h3>★ 用户信息管理</h3>
                <div align="center" style="padding: 5px">
                    <h4>以下是你的个人信息：</h4><br/>
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

                    <table align="center" border="0">
                        <tr>
                            <td><input onclick="window.history.go(-1);" name="submit" value="返回到上一页" type="submit"
                                       class="button_style"/>
                            </td>
                            <td>
                                <input onclick="updateACourseInfo()" name="submit" value="进行课程修改" type="submit"
                                       class="button_style"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <?php include '../templet/templet_footer.php' ?>
</div>
</body>
</html>