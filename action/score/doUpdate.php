<?php
include("../../database/Score_class.php");
$score = new Score();
$score_id = trim($_POST["score_id"]);
$score_num = trim($_POST["score_num"]);
echo $score->updateScoreInfo($score_id, $score_num);
?>