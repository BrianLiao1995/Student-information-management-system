function updateACourseInfo() {
    var courses_id = document.getElementById("courses_id").value;
    var courses_name = document.getElementById("courses_name").value;
    var courses_type = document.getElementById("courses_type").value;
    var courses_credit = document.getElementById("courses_credit").value;

    $.ajax({
        type: "POST",
        url: "../../action/courses/doUpdate.php",
        cache: false,
        data: {
            courses_id: courses_id,
            courses_name: courses_name,
            courses_type: courses_type,
            courses_credit: courses_credit,
        },
        success: function (ret) { //查询请求成功
            if (ret == true) {
                alert("课程修改成功！");
                window.history.go(-1);
            }
            else if (ret == false) {
                alert("课程修改失败！");
            }
            else alert(ret);
        }

        ,
        error: function (e) { //查询请求异常
            alert("异常：" + e);
        }
    })
}