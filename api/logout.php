<?php
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
    echo json_encode(session_destroy());
}
else echo json_encode(false);
session_commit();
?>