function changeEmail(users_id) {
    var users_id = users_id;
    var newEmail = prompt("请输入您要修改的邮箱：");
    if (newEmail == "") {
        alert("没有输入需要输入的所有项，修改失败！");
    }
    else {
        $.ajax({
                type: "POST",
                url: "../action/profile/changeEmail.php",
                cache: false,
                data: {
                    users_id: users_id,
                    newEmail: newEmail,
                },
                success: function (ret) { // 查询请求成功
                    if (ret == true) {
                        alert("邮箱修改成功！");
                        location.reload();
                    }
                    else if (ret == false) {
                        alert("邮箱修改失败！");
                    }
                    else alert(ret);
                },
                error: function (e) { //查询请求异常
                    alert("异常：" + e);
                }
            }
        )
    }
}