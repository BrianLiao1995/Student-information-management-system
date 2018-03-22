<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>个人信息修改</title>
    <link href="../css/css.css" rel="Stylesheet" type="text/css"/>
    <script type="text/javascript" src="../js/changePassword.js"></script>
    <script type="text/javascript" src="../js/changeEmail.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript">
        function init(users_id) {
            //服务器端进行查询
            $.ajax({
                type: "POST",
                url: "../action/profile/others.php",
                cache: false,
                data: {
                    users_id: users_id,
                },
                dataType: 'json',
                success: function (ret) { //查询请求成功
                    $("#users_id").val(ret.users_id);
                    $("#users_name").val(ret.users_name);
                    $("#users_campus").val(ret.users_campus);
                    $("#users_type").val(ret.users_type);
                    $("#users_length").val(ret.users_length);
                    $("#users_email").val(ret.users_email);
                    $("#users_class").val(ret.users_class);
                    $("#users_grade").val(ret.users_grade);
                    $("#users_school").val(ret.users_school);
                    $("#users_major").val(ret.users_major);

                    if (ret.users_type != "学生") {
                        $("#users_school_tr").css({"display": "none"});
                        $("#users_class_tr").css({"display": "none"});
                        $("#users_grade_tr").css({"display": "none"});
                        $("#users_major_tr").css({"display": "none"});
                        $("#users_length_tr").css({"display": "none"});
                    }
                },
                error: function (e) { //查询请求异常
                    alert("异常：" + e);
                }
            })
        }
    </script>
</head>
<body onload="init(<?php echo $_GET['users_id'] ?>)">
<div class="wrap">
    <?php include 'templet/templet_top.php' ?>
    <div class="contain">
        <div class="side">
            <?php include 'templet/templet_left.php' ?>
        </div>

        <div class="main">
            <div class="photos">
                <h3>★ 用户信息管理</h3>
                <div align="center">
                    <table cellpadding="5px" cellspacing="5px">
                        <tr>
                            <td>用户编号：<input readonly="readonly" id="users_id" name="users_id" type="text" size="50"/>
                            </td>
                        </tr>
                        <tr>
                            <td>用户名称：<input id="users_name" name="users_name" readonly="readonly" size="50"/></td>
                        </tr>

                        <tr id="users_grade_tr">
                            <td>用户年级：<input id="users_grade" readonly="readonly" name="users_grade" size="50"
                                            type="text"/></td>
                        </tr>

                        <tr>
                            <td>用户邮箱：<input id="users_email" readonly="readonly" size="50" name="users_email"
                                            type="text"/></td>
                        </tr>

                        <tr>
                            <td>用户校区：<input id="users_campus" size="50" readonly="readonly" name="users_campus"
                                            type="text"/></td>
                        </tr>

                        <tr id="users_school_tr">
                            <td>用户学院：<input id="users_school" size="50" readonly="readonly" name="users_school"
                                            type="text"/></td>
                        </tr>

                        <tr id="users_major_tr">
                            <td>用户专业：<input id="users_major" size="50" readonly="readonly" name="users_major"
                                            type="text"/></td>
                        </tr>

                        <tr id="users_class_tr">
                            <td>用户班级：<input id="users_class" size="50" readonly="readonly" name="users_class"
                                            type="text"/></td>
                        </tr>

                        <tr id="users_length_tr">
                            <td>用户学制：<input id="users_length" size="50" readonly="readonly" name="users_length"
                                            type="text""/>
                            </td>
                        </tr>

                        <tr>
                            <td>用户类型：<input id="users_type" size="50" readonly="readonly" name="users_type"
                                            type="text"/></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <input onclick="changePassword(document.getElementById('users_id').value);" name="submit"
                                       value="进行密码修改" type="submit"
                                       class="button_style"/>
                            </td>
                            <td>
                                <input onclick="changeEmail(document.getElementById('users_id').value);" name="submit"
                                       value="进行邮箱修改" type="submit"
                                       class="button_style"/>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <?php include 'templet/templet_footer.php' ?>
</div>
</body>
</html>