function passwordRecov() {
    var users_id = $("#users_id").val();
    var users_email = $("#users_email").val();

    // 前端验证
    if (users_id == "") {
        alert("用户编号必须填写！");
        return;
    }
    if (users_email == "") {
        alert("用户邮箱必须填写！");
        return;
    }
    // 服务端验证
    $.ajax({
        type: "POST",
        url: "../action/doGetAuthorCode.php",
        cache: false,
        data: {
            users_id: users_id,
            users_email: users_email
        },
        success: function (ret) {//请求成功
            if (ret == true) {
                window.location.href = "inputAuthorCode.php";
            }
            else alert("用户名或邮箱输入错误！");
        },
        error: function (e) { //请求异常
            alert("异常：" + e);
        }
    })
}