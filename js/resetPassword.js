function resetPassword(users_id) {
    var newPassword1 = $("#newPassword1").val();
    var newPassword2 = $("#newPassword2").val();

    // 前端验证
    if (newPassword1 == "") {
        alert("请输入您要修改的密码！");
        return;
    }
    if (newPassword2 == "") {
        alert("请再次输入您要修改的密码！");
        return;
    }
    // 服务端验证
    $.ajax({
        type: "POST",
        url: "../action/doResetPassword.php",
        cache: false,
        data: {
            users_id: users_id,
            newPassword: newPassword1,
        },
        success: function (ret) {//请求成功
            //return ret;
            if (ret == true) {
                alert("您的密码重置成功！");
                window.location.href = "../";
            }
            else alert("您的密码重置失败！");
        },
        error: function (e) { //请求异常
            alert("异常：" + e);
        }
    })
}