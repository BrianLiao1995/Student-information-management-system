function getMajors(school) {
    var school = school;
    $.ajax({
        type: "POST",
        url: "../../action/structure/doGetMajors.php",
        cache: false,
        data: {
            school: school,
        },
        success: function (html) { //查询请求成功
            $('#users_major').html(html)
        }
        ,
        error: function (e) { //查询请求异常
            alert("异常：" + e);
        }
    });
}