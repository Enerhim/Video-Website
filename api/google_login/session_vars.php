<?php
header('Content-Type: application/json');
session_start();

$res = array();

include_once "../../utility/sql_connect.php";

$sql = 'SELECT name, pfp_url, uid from ggusers WHERE gid = ' . $_POST["g_id"];

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION["logged_in"] = true;
        
        $_SESSION["username"] = $row["name"];
        $_SESSION["uid"] = $row["uid"];
        $_SESSION["pfp"] = $row["pfp_url"]; 

        $res["result"] = "Made session Successful!";
    }
} else {
    $res["error"] = 'Could not create session variables!';
}   

$con->close();
echo json_encode($res);