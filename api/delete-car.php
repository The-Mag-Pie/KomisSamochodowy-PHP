<?php
session_start();
if (isset($_SESSION["login"]) == false || $_SESSION["login"] == false) {
    die(json_encode(false));
}
session_commit();

if (isset($_GET["id"]) == false || intval($_GET["id"]) == 0) {
    header("HTTP/1.1 400 Bad Request");
    die();
}

require_once("db-connection.php");

$db->query("DELETE FROM Cars WHERE ID = {$_GET["id"]};");
if ($db->affected_rows == 1) {
    echo json_encode(true);
}
else {
    echo json_encode(false);
}

$db->close();
?>