function initStudentInfo() {
    //服务器端进行查询
    $.ajax({
        type: "POST",
        url: "../action/profile/myself.php",
        cache: false,
        data: {},
        dataType: 'json',
        success: function (ret) { //查询请求成功
            var users_id = ret.users_id;
            var users_name = ret.users_name;
            var users_school = ret.users_school;
            var users_campus = ret.users_campus;
            var users_class = ret.users_class;
            var users_major = ret.users_major;
            str = "学号：" + users_id + "&nbsp;&nbsp;姓名：" + users_name + "&nbsp;&nbsp;学院：" + users_campus + "&nbsp;&nbsp;专业： " + users_major + "&nbsp;&nbsp;行政班：" + users_major + users_class;
            $("#stuInfo").html(str);
        }
        ,
        error: function (e) { //查询请求异常
            alert("异常：" + e);
        }
    })
}