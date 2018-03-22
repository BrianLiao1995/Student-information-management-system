function searchScoreByStudent(searchWay) {
    way = searchWay;
    year = document.getElementById("year").value;
    semester = document.getElementById("semester").value;

    $.ajax({
        type: "POST",
        url: "../action/score/doSearchByStudents.php",
        cache: false,
        data: {
            way: way,
            year: year,
            semester: semester,
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