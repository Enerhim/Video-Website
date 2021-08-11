<?php
header('Content-Type: application/json');
session_start();

$res = array();

include_once "../../utility/sql_connect.php";

$sql = 'SELECT uid from ggusers WHERE gid = ' . $_POST["g_id"];

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $res["result"] = "Authenticated Successfuly!";
    }
} else {
    if ($stmt = $con->prepare('INSERT INTO ggusers (gid, name, email, pfp_url) VALUES (?, ?, ?, ?)')) {
        $name = htmlspecialchars($_POST["username"]);
        if (isset($_POST["pfp"])) {
            $stmt->bind_param('ssss', $_POST["g_id"], $name, $_POST['email'], $_POST["pfp"]);    
        } else {
            $stmt->bind_param('ssss', $_POST["g_id"], $name, $_POST['email'], "null");
        }
        $stmt->execute();
        $res["result"] = "Created db account and authenticated in!";
    } else {
        $res["error"] = 'Could not prepare db statement for db account creation! ';
    }
}

$con->close(); 
echo json_encode($res);