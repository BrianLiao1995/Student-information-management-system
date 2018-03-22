function getACourseInfo(courses_id) {
    //服务器端进行查询
    $.ajax({
        type: "POST",
        url: "../../action/courses/getACourseInfo.php",
        cache: false,
        data: {
            courses_id: courses_id,
        },
        dataType: 'json',
        success: function (ret) { //查询请求成功
            $("#courses_id").val(ret.courses_id);
            $("#courses_name").val(ret.courses_name);
            $("#courses_credit").val(ret.courses_credit);
            $("#courses_type").val(ret.courses_type);
        }

        ,
        error: function (e) { //查询请求异常
            alert("异常：" + e);
        }
    })
}