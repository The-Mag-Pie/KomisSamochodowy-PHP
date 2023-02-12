<?php
$_POST = json_decode(file_get_contents('php://input'), true);
if ($_POST == NULL) {
    header("HTTP/1.1 400 Bad Request");
    die("ERROR");
}
else {
    require_once("models.php");

    $message = new Message();
    foreach ($_POST as $key => $value) $message->$key = $value;

    if ($message->validate() == false) {
            header("HTTP/1.1 400 Bad Request");
            die("ERROR");
        }
    else {
        require_once("db-connection.php");

        $querystring = "INSERT INTO Messages (Time, Name, Email, Topic, Content) VALUES (";
        $querystring = $querystring . "'{$message->Time}', ";
        $querystring = $querystring . "'{$message->Name}', ";
        $querystring = $querystring . "'{$message->Email}', ";
        $querystring = $querystring . "'{$message->Topic}', ";
        $querystring = $querystring . "'{$message->Content}');";
        $db->query($querystring);
        
        if ($db->errno) echo json_encode(false);
        else echo json_encode(true);

        $db->close();
    }
}
?>