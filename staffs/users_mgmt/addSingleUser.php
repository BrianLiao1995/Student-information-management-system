<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>添加用户</title>
    <link href="../../css/css.css" rel="Stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/getClasses.js"></script>
    <script type="text/javascript" src="../../js/getMajors.js"></script>
    <script type="text/javascript" src="../../js/getSchools.js"></script>
    <script type="text/javascript" src="../../js/addAUser.js"></script>
</head>
<body onload="getSchools('桂花岗校区');getMajors('旅游学院（中法旅游学院）');getClasses('房地产开发与管理')">
<div class="wrap">
    <?php include '../templet/templet_top.php' ?>
    <div class="contain">
        <div class="side">
            <?php include '../templet/templet_left.php' ?>
        </div>

        <div class="main">
            <div class="photos" align="center">
                <h3 align="left">★ 新用户添加（成功注册后，除了密码之外不可修改其他信息！请注意！）</h3>
                <table>
                    <tr>
                        <td>用户编号（必填项）：<input id="users_id" name="users_id" type="text" size="50" maxlength="100"
                                             onkeyup="this.value=this.value.replace(/\D/g,'')"
                                             onafterpaste="this.value=this.value.replace(/\D/g,'')"/></td>
                    </tr>


                    <tr>
                        <td>用户名称（必填项）：<input id="users_name" name="users_name" type="text" size="50" maxlength="50"/>
                        </td>
                    </tr>

                    <tr>
                        <td>用户邮箱（必填项）：<input id="users_email" name="users_email" type="text" size="50" maxlength="50"/>
                        </td>
                    </tr>
                    <tr>
                        <td>用户性别（必填项）：
                            <select id="users_sex" name="users_sex">
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>学生学制（学生项）：
                            <input id="users_length" name="users_length" type="text" size="50" maxlength="50"/></td>
                    </tr>

                    <tr>
                        <td>用户年级（学生项）：
                            <input id="users_grade" name="users_grade" type="text" size="50" maxlength="100"
                                   onkeyup="this.value=this.value.replace(/\D/g,'')"
                                   onafterpaste="this.value=this.value.replace(/\D/g,'')"/></td>
                    </tr>

                    <tr>
                        <td>用户校区（必填项）：
                            <select  onchange="getSchools(this.options[this.options.selectedIndex].value);"
                                    id="users_campus" name="users_campus">
                                <option value="桂花岗校区">桂花岗校区</option>
                                <option value="大学城校区">大学城校区</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>用户学院（必填项）：
                            <select onchange="getMajors(this.options[this.options.selectedIndex].value)"
                                    id="users_school" name="users_school">
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>用户专业（学生项）：
                            <select onchange="getClasses(this.options[this.options.selectedIndex].value)" id="users_major" name="users_major">
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>用户班级（学生项）：
                            <select id="users_class" name="users_class">
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>用户类型（必填项）：

                            <select id="users_type" name="users_type">
                                <option value="教师">教师</option>
                                <option value="学生">学生</option>
                            </select>
                        </td>
                    </tr>

                </table>
                <table width="500" border="0">
                    <tr>
                        <td><input onclick="addAUser()" name="submit" value="开始添加" type="submit"
                                   class="button_style"/>
                        </td>
                        <td><input onclick="history.go(0);" name="submit" value="清空内容" type="submit"
                                   class="button_style"/>
                        </td>
                        <td><input onclick="window.history.go(-1);" name="submit" value="返回上页" type="submit"
                                   class="button_style"/>
                        </td>
                </table>
                <br/>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <?php include '../templet/templet_footer.php' ?>
</div>
</body>
</html>