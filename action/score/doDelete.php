<?php
include("../../database/Score_class.php");
$score = new Score();
$score_id = trim($_GET["score_id"]);
$result = $score->deleteScoreInfo($score_id);
echo "<script>alert('$result');window.history.go(-1);</script>";
?>