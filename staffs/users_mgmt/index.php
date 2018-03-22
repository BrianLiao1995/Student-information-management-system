<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>用户管理</title>
    <link href="../../css/css.css" rel="Stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/getClasses.js"></script>
    <script type="text/javascript" src="../../js/getMajors.js"></script>
    <script type="text/javascript" src="../../js/getSchools.js"></script>
    <script type="text/javascript" src="../../js/searchUsers.js"></script>
</head>
<script type="text/javascript">
    var users_id = "";
    var users_name = "";
    var users_major = "";
    var users_school = "";
    var users_grade = "";
    var users_class = "";
    var users_campus = "";
    var users_email = "";

    function outputResult() {
        window.location.href = '../../excel/excel_users_output.php?users_id=' + users_id +
            '&users_name=' + users_name + ' &users_major=' + users_major + '&users_grade=' +
            users_grade + '&users_school=' + users_school + '&users_class=' + users_class +
            '&users_campus=' + users_campus + '&users_email=' + users_email;
    }

    function addSingleUser() {
        window.location.href = 'addSingleUser.php';
    }

    function addMultipleUsers() {
        window.location.href = 'addMultipleUsers.php';

    }
</script>
<body onload="getSchools('桂花岗校区');getMajors('旅游学院（中法旅游学院）');getClasses('房地产开发与管理')">

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
                    <h4>请填写以下信息，支持模糊查询：</h4><br/>
                    <table align="center" width="639" border="0">
                        <tr>
                            <td width="18"><input id="checkbox_users_id" name="checkbox_users_id" type="checkbox"
                                                  value=""/></td>
                            <td align="right" width="151">用户编号（只允许输入数字）：</td>
                            <td width="352"><input id="users_id" name="users_id" type="text" size="50" maxlength="100"
                                                   onkeyup="this.value=this.value.replace(/\D/g,'')"
                                                   onafterpaste="this.value=this.value.replace(/\D/g,'')"/></td>
                        </tr>
                        <tr>
                            <td><input name="checkbox_users_name" id="checkbox_users_name" type="checkbox" value=""/>
                            </td>
                            <td align="right">用户名称（数字和字符均可）：</td>
                            <td><input id="users_name" name="users_name" type="text" size="50" maxlength="50"/></td>
                        </tr>
                        <tr>
                            <td><input name="checkbox_users_email" id="checkbox_users_email" type="checkbox" value=""/>
                            </td>
                            <td align="right">用户邮箱（数字和字符均可）：</td>
                            <td><input id="users_email" name="users_email" type="text" size="50" maxlength="50"/></td>
                        </tr>
                        <tr>
                            <td><input name="checkbox_users_grade" id="checkbox_users_grade" type="checkbox" value=""/>
                            </td>
                            <td align="right">用户年级（查询学生才需用）：</td>
                            <td><input id="users_grade" name="users_grade" type="text" size="50" maxlength="100"
                                       onkeyup="this.value=this.value.replace(/\D/g,'')"
                                       onafterpaste="this.value=this.value.replace(/\D/g,'')"/></td>
                        </tr>

                        <tr>
                            <td><input name="checkbox_users_campus" type="checkbox" id="checkbox_users_campus"
                                       value=""/></td>
                            <td align="right">用户校区（只允许选择选项）：</td>
                            <td>
                                <select onchange="getSchools(this.options[this.options.selectedIndex].value);"
                                        id="users_campus" name="users_campus">
                                    <option value="桂花岗校区">桂花岗校区</option>
                                    <option value="大学城校区">大学城校区</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><input name="checkbox_users_school" type="checkbox" id="checkbox_users_school"
                                       value=""/></td>
                            <td align="right">用户学院（只允许选择选项）：</td>
                            <td>
                                <select onchange="getMajors(this.options[this.options.selectedIndex].value)"
                                        id="users_school" name="users_school">
                                </select>
                            </td>
                        </tr>
                        </tr>

                        <tr>
                            <td><input id="checkbox_users_major" name="checkbox_users_major" type="checkbox" value=""/>
                            </td>
                            <td align="right">用户专业（查询学生才需用）：</td>
                            <td>
                                <select onchange="getClasses(this.options[this.options.selectedIndex].value)"
                                        id="users_major" name="users_major">
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><input id="checkbox_users_class" name="checkbox_users_class" type="checkbox" value=""/>
                            </td>
                            <td align="right">用户班级（查询学生才需用）：</td>
                            <td>
                                <select id="users_class" name="users_class">
                                </select>
                            </td>
                        </tr>
                    </table>
                    <table cellpadding="5px" cellspacing="5px" align="center">
                        <tr>
                            <td><input onclick="searchUsers()" name="submit" value="开始进行查询" type="submit"
                                       class="button_style"/>
                            </td>
                            <td>
                                <input onclick="outputResult()" name="submit" value="导出查询结果" type="submit"
                                       class="button_style"/>
                            </td>
                            <?php
                            if ($_COOKIE["lib_users_type"] == "管理员")
                                echo '<td><input onclick="addSingleUser()" name="submit" value="添加新的用户" type="submit"
                                       class="button_style"/></td>';
                            ?>
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