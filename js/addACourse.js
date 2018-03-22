var courses_id = "";
var courses_name = "";
var courses_type = "";
var courses_credit = "";

function addACourse() {
    courses_id = document.getElementById("courses_id").value;
    courses_name = document.getElementById("courses_name").value;
    courses_type = document.getElementById("courses_type").value;
    courses_credit = document.getElementById("courses_credit").value;

    $.ajax({
        type: "POST",
        url: "../../action/courses/doInsert.php",
        cache: false,
        data: {
            courses_name: courses_name,
            courses_id: courses_id,
            courses_type: courses_type,
            courses_credit: courses_credit,
        },
        success: function (data) { //查询请求成功
            if (data == true) {
                alert("新课程添加成功！");
                history.go(0);
            }
            else if (data == false) {
                alert("新课程添加失败！");
            }
            else alert(data);
        }
        ,
        error: function (e) { //查询请求异常
            alert("异常：" + e);
        }
    })
}