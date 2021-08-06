<?php
header('Content-Type: application/json');
session_start();

$res = array();

include_once "../utility/sql_connect.php";

$sql = 'SELECT name, pfp_url, uid from ggusers WHERE gid = ' . $_POST["g_id"];

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $res["result"] = "Authenticated Successfuly!";
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $row["name"];
        if (isset($row["pfp_url"])) {
            $_SESSION["pfp"] = $row["pfp_url"];
        } else {
            $_SESSION["pfp"] =  "https://avatar.oxro.io/avatar.svg?name=".$_SESSION["username"];
        }
        $_SESSION["uid"] = $row["uid"];
    }
} else {
    if ($stmt = $con->prepare('INSERT INTO ggusers (gid, name, email, pfp_url) VALUES (?, ?, ?, ?)')) {
        $suser = htmlspecialchars($_POST["username"]);
        $stmt->bind_param('sss', $_POST["g_id"], $suser, $_POST['email'], $_POST["pfp"]);
        $stmt->execute();
        $res["result"] = "Created db account and authenticated in!";
    } else {
        $res["error"] = 'Could not prepare db statement for db account creation! ';
    }
}   

echo json_encode($res);
