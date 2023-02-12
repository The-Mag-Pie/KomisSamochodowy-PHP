<?php
session_start();
if (isset($_SESSION["login"]) == false || $_SESSION["login"] == false) {
    die(json_encode(false));
}
session_commit();

require_once("db-connection.php");
require_once("models.php");

$result = $db->query("SELECT * FROM Messages;") or die("ERROR<br>".$db->error);

$messages = array();
$i = 0;
while ($row = $result->fetch_object("Message")) {
    $messages[$i++] = $row;
}

echo json_encode($messages);

$db->close();
?>