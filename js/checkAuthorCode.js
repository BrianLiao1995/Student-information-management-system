function checkAuthorCode() {
    authocode = document.getElementById("authocode").value;

    $.ajax({
        type: "POST",
        url: "../action/doCheckAuthorCode.php",
        cache: false,
        data: {
            authocode: authocode
        },
        success: function (ret) {//请求成功
            if (ret == true) {
                window.location.href = "inputNewPassword.php";
            }
            else alert("验证码输入错误！");
        },
        error: function (e) { //请求异常
            alert("异常：" + e);
        }
    })
}