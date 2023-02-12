<?php
if (isset($_GET["type"]) == false || ($_GET["type"] != "osobowe" && $_GET["type"] != "dostawcze")) {
    header("HTTP/1.1 400 Bad Request");
    die("ERROR");
}

require_once("db-connection.php");
require_once("models.php");

$result = $db->query("SELECT * FROM Cars WHERE Category LIKE '{$_GET["type"]}';") or die("ERROR<br>".$db->error);

$cars = array();
$i = 0;
while ($row = $result->fetch_object("Car")) {
    $cars[$i++] = $row;
}

echo json_encode($cars);

$db->close();
?>