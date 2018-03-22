function searchCourses() {
    if (document.getElementById("checkbox_courses_id").checked) {
        courses_id = document.getElementById("courses_id").value;
    }
    if (document.getElementById("checkbox_courses_name").checked) {
        courses_name = document.getElementById("courses_name").value;
    }
    if (document.getElementById("checkbox_courses_type").checked) {
        courses_type = document.getElementById("courses_type").value;
    }

    if (courses_id == "" && courses_name == "" && courses_type == "") {
        alert("请至少选择一个查询结果！");
    }
    else {
        $.ajax({
            type: "POST",
            url: "../../action/courses/doSearch.php",
            cache: false,
            data: {
                courses_name: courses_name,
                courses_id: courses_id,
                courses_type: courses_type,
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