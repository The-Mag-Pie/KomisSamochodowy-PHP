<?php
session_start();
if (isset($_SESSION["login"]) == false || $_SESSION["login"] == false) {
    die("ERROR");
}
session_commit();

$_POST = json_decode(file_get_contents('php://input'), true);

if ($_POST == NULL) {
    header("HTTP/1.1 400 Bad Request");
    die("ERROR");
}
else {
    require_once("models.php");

    $car = new Car();
    foreach ($_POST as $key => $value) $car->$key = $value;

    if ($car->validate() == false) {
            header("HTTP/1.1 400 Bad Request");
            die("ERROR");
        }
    else {
        require_once("db-connection.php");

        $querystring = "INSERT INTO Cars (Category, Image, Brand, Model, YearProduction, Mileage, FuelType, DriveType, EngineDisplacement, EnginePower, Transmission, FuelConsumption, Body, Doors, Price) VALUES (";
        $querystring = $querystring . "'{$car->Category}', ";
        $querystring = $querystring . "'{$car->Image}', ";
        $querystring = $querystring . "'{$car->Brand}', ";
        $querystring = $querystring . "'{$car->Model}', ";
        $querystring = $querystring . "{$car->YearProduction}, ";
        $querystring = $querystring . "{$car->Mileage}, ";
        $querystring = $querystring . "'{$car->FuelType}', ";
        $querystring = $querystring . "'{$car->DriveType}', ";
        $querystring = $querystring . "{$car->EngineDisplacement}, ";
        $querystring = $querystring . "{$car->EnginePower}, ";
        $querystring = $querystring . "'{$car->Transmission}', ";
        $querystring = $querystring . "{$car->FuelConsumption}, ";
        $querystring = $querystring . "'{$car->Body}', ";
        $querystring = $querystring . "{$car->Doors}, ";
        $querystring = $querystring . "{$car->Price});";
        $db->query($querystring);
        
        if ($db->errno) echo json_encode(false);
        else echo json_encode($db->insert_id);

        $db->close();
    }
}
?>