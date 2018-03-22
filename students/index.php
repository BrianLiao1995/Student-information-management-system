<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>学生成绩查询</title>
    <link href="../css/css.css" rel="Stylesheet" type="text/css"/>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/initStudentInfo.js"></script>
    <script type="text/javascript" src="../js/searchScoreByStudent.js"></script>
    <script type="text/javascript">
        var way;
        var year;
        var semester;

        function outputResult() {
            window.location.href = '../excel/students_score_output.php?way=' + way +
                '&year=' + year + '&semester=' + semester;
        }
    </script>
</head>

<body onload="initStudentInfo()">
<div class="wrap">
    <?php include 'templet/templet_top.php' ?>
    <div class="contain">
        <div class="side">
            <?php include 'templet/templet_left.php' ?>
        </div>

        <div class="main">
            <div class="photos">
                <h3>★ 学生成绩查询</h3>
                <div style="padding: 10px;">
                    <span id="stuInfo"></span>
                    开课学年：<select id="year">
                        <?php
                        for ($x = 2006; $x <= 2020; $x++) {
                            echo "<option value='" . $x . "-" . ++$x . "'>" . --$x . "-" . ++$x . "</option>";
                            $x--;
                        }
                        ?>
                    </select>
                    开课学期：<select id="semester">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <br/>
                    <input type="submit" value="查询所有成绩" class="button_style" onclick="searchScoreByStudent('all')"
                           name="saerch_all" id="search_all"/>
                    <input type="submit" value="按学年查询成绩" class="button_style" onclick="searchScoreByStudent('year')"
                           name="saerch_year" id="search_year"/>
                    <input type="submit" value="按学期查询成绩" class="button_style" onclick="searchScoreByStudent('semester')"
                           name="saerch_semester" id="search_semester"/>
                    <input type="submit" value="导出已查询成绩" class="button_style" onclick="outputResult()"
                           name="outputResult" id="outputResult"/>
                    <br/>
                    <div id="result"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <?php include 'templet/templet_footer.php' ?>
</div>
</body>
</html>