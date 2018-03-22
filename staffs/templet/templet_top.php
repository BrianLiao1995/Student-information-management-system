<div class="top_box">
    <div class="logo">广州大学学生学业管理系统 - <?php echo $_COOKIE["lib_users_type"] . "页面" ?></div>
    <div class="top_right">
        您好，<?php echo $_COOKIE["lib_users_id"] ?>。欢迎您。<br/><a href="../../action/doLogout.php">退出登录</a>&nbsp;&nbsp;&nbsp;<a
                href="../../profile/index.php">个人资料</a>
    </div>
    <div class="clear"></div>
</div>

<?php
if (!isset($_COOKIE["lib_users_type"]) || $_COOKIE["lib_users_type"] == "学生") {
    echo "<script>window.location.href = '../../index.php'</script>;";
}
?>