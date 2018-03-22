function getFileName(o) {
    var pos = o.lastIndexOf("\\");
    return o.substring(pos + 1);
}

function uploadUsersExcel() {
    var filename = getFileName(document.getElementById("fileUpload").value);
    alert(filename);
    /*$.ajax({
     type: "POST",
     url: "../../excel/excel_users_input.php",
     cache: false,
     data: {
     filename: filename,
     },
     success: function (data) {
     alert(data);
     }
     ,
     error: function (e) { //查询请求异常
     alert("异常：" + e);
     }
     })*/
}