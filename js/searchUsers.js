function searchUsers() {
    if (document.getElementById("checkbox_users_class").checked) { //判断users_class是否被选中
        users_class = document.getElementById("users_class").value;
    }
    if (document.getElementById("checkbox_users_id").checked) { //判断users_id是否被选中
        users_id = document.getElementById("users_id").value;
    }
    if (document.getElementById("checkbox_users_name").checked) { //判断users_name是否被选中
        users_name = document.getElementById("users_name").value;
    }
    if (document.getElementById("checkbox_users_major").checked) { //判断users_major是否被选中
        users_major = document.getElementById("users_major").value;
    }
    if (document.getElementById("checkbox_users_grade").checked) { //判断users_grade是否被选中
        users_grade = document.getElementById("users_grade").value;
    }
    if (document.getElementById("checkbox_users_school").checked) { //判断users_school是否被选中
        users_school = document.getElementById("users_school").value;
    }

    if (document.getElementById("checkbox_users_campus").checked) { //判断users_campus是否被选中
        users_campus = document.getElementById("users_campus").value;
    }

    if (document.getElementById("checkbox_users_email").checked) { //判断users_email是否被选中
        users_email = document.getElementById("users_email").value;
    }

    if (users_id == "" && users_name == "" && users_grade == "" && users_school == "" && users_campus == "" && users_email == "" && users_class == "") {
        alert("请至少选择一个查询结果！");
    } else {
        $.ajax({
            type: "POST",
            url: "../../action/users/doSearch.php",
            cache: false,
            data: {
                users_id: users_id,
                users_name: users_name,
                users_major: users_major,
                users_grade: users_grade,
                users_school: users_school,
                users_email: users_email,
                users_class: users_class,
                users_campus: users_campus,
            },
            success: function (data) { //查询请求成功
                document.getElementById("result").innerHTML = data;
            }
            ,
            error: function (e) { //查询请求异常
                alert("异常：" + e);
            }
        })
    }
}