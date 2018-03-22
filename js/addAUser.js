function addAUser() {
    var users_id = "";
    var users_name = "";
    var users_major = "";
    var users_grade = "";
    var users_school = "";
    var users_email = "";
    var users_campus = "";
    var users_type = "";
    var users_sex = "";
    var users_class = "";
    var users_length = "";

    users_id = document.getElementById("users_id").value;
    users_name = document.getElementById("users_name").value;
    users_major = document.getElementById("users_major").value;
    users_grade = document.getElementById("users_grade").value;
    users_school = document.getElementById("users_school").value;
    users_campus = document.getElementById("users_campus").value;
    users_type = document.getElementById("users_type").value;
    users_sex = document.getElementById("users_sex").value;
    users_class = document.getElementById("users_class").value;
    users_email = document.getElementById("users_email").value;
    users_length = document.getElementById("users_length").value;

    $.ajax({
        type: "POST",
        url: "../../action/users/doInsert.php",
        cache: false,
        data: {
            users_id: users_id,
            users_name: users_name,
            users_email: users_email,
            users_major: users_major,
            users_grade: users_grade,
            users_school: users_school,
            users_campus: users_campus,
            users_type: users_type,
            users_sex: users_sex,
            users_class: users_class,
            users_length: users_length,
        },
        success: function (data) { //查询请求成功
            if (data == true) {
                alert("注册成功！");
                history.go(0);
            }
            else if (data == false) {
                alert("注册失败！");
            }
            else alert(data);
        }
        ,
        error: function (e) { //查询请求异常
            alert("异常：" + e);
        }
    })
}