function getClasses(major) {
    var major = major;
    $.ajax({
        type: "POST",
        url: "../../action/structure/doGetClasses.php",
        cache: false,
        data: {
            major: major,
        },
        success: function (html) { //查询请求成功
            $('#users_class').html(html);
        }
        ,
        error: function (e) { //查询请求异常
            alert("异常：" + e);
        }
    });
}