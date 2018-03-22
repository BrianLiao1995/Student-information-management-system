var users_id = "";
var courses_id = "";

function searchScore() {
    if (document.getElementById("checkbox_users_id").checked) {
        users_id = document.getElementById("users_id").value;
    }
    if (document.getElementById("checkbox_courses_id").checked) {
        courses_id = document.getElementById("courses_id").value;
    }
    if (users_id == "" && courses_id == "") {
        alert("请至少选择一个查询结果！");
    } else {
        $.ajax({
            type: "POST",
            url: "../../action/score/doSearch.php",
            cache: false,
            data: {
                users_id: users_id,
                courses_id: courses_id,
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