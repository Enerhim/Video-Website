<?php
header('Content-Type: application/json');
session_start();

$res = array();

include_once "../utility/sql_connect.php";
$comment_text = htmlspecialchars($_REQUEST["comment_text"]);    
$sql = 'INSERT INTO comments (comment_text, likes, commenter_uid) VALUES ("'. $comment_text .'",'.'0,'. $_SESSION["uid"].')';

if ($con->query($sql) === TRUE) {
    $res["result"] = "Uploaded Comment Successfuly"; 
} else {
    $res["error"] = "Error: " . $sql . "<br>" . $con->error; 
}

$res["sql"] = $sql; 

echo json_encode($res);
$con->close();
?>