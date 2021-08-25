<?php 
header('Content-Type: application/json');
session_start();

$res = array();

if($_REQUEST["logout"]) {
    session_destroy();
    $res["result"] = 'Session Destroyed';
} else {
    $res["error"] = 'No Required Parameters';
}

echo json_encode($res);
?>