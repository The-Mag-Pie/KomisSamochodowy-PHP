<?php
if (isset($_GET["id"]) == false || intval($_GET["id"]) <= 0) {
    header("HTTP/1.1 400 Bad Request");
    die("ERROR");
}

require_once("db-connection.php");
require_once("models.php");

$result = $db->query("SELECT * FROM Cars WHERE ID = {$_GET["id"]};") or die("ERROR<br>".$db->error);

if ($result->num_rows == 1) echo json_encode($result->fetch_object("Car"));
else die("ERROR");

$db->close();
?>