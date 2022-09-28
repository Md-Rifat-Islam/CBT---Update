<?php

$moduleId = $_POST['module']; 

$db = mysqli_connect("localhost", "root", "mysql", "cbt-db");
$questions = mysqli_query($db, "SELECT * FROM QUESTION_BANK WHERE TRADE_ID= '$moduleId' AND HIDDEN = 0");
$question_count = mysqli_num_rows($questions);

// encoding array to json format
echo json_encode($question_count);

?>