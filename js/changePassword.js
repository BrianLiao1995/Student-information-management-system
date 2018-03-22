function changePassword(users_id) {
    var users_id = users_id;
    var oldPassword = prompt("请输入您的旧密码：");
    var NewPassword1 = prompt("请输入您的新密码：");
    var NewPassword2 = prompt("请确认您的新密码：");
    if (oldPassword == "" || NewPassword1 == "" || NewPassword2 == "") {
        alert("没有输入需要输入的所有项，修改失败！");
    }
    else {
        if (NewPassword1 == NewPassword2) {
            // 服务器端进行查询
            $.ajax({
                    type: "POST",
                    url: "../action/profile/changePassword.php",
                    cache: false,
                    data: {
                        users_id: users_id,
                        oldPassword: oldPassword,
                        newPassword: NewPassword1,
                    },
                    success: function (ret) { // 查询请求成功
                        if (ret == true) { // 旧密码输入正确
                            alert("密码修改成功！");
                            location.reload()
                        }
                        else if (ret == false) {
                            alert("密码修改失败！");
                        }
                        else alert(ret);
                    },
                    error: function (e) { //查询请求异常
                        alert("异常：" + e);
                    }
                }
            )
        }
        else
            alert("您两次新密码输入不一致，请重新输入！");
    }
}