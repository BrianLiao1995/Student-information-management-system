function getSchools(campus) {
    var campus = campus;
    $.ajax({
        type: "POST",
        url: "../../action/structure/doGetSchools.php",
        cache: false,
        data: {
            campus: campus,
        },
        success: function (html) { //查询请求成功
            $('#users_school').html(html)
        }
        ,
        error: function (e) { //查询请求异常
            alert("异常：" + e);
        }
    });
}