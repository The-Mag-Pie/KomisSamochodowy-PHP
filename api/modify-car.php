<?php
session_start();
if (isset($_SESSION["login"]) == false || $_SESSION["login"] == false) {
    die(json_encode(false));
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

    if ($car->validate_id() == false || $car->validate() == false) {
            header("HTTP/1.1 400 Bad Request");
            die("ERROR");
        }
    else {
        require_once("db-connection.php");

        $querystring = "UPDATE Cars SET ";
        $querystring = $querystring . "Category = '{$car->Category}', ";
        $querystring = $querystring . "Image = '{$car->Image}', ";
        $querystring = $querystring . "Brand = '{$car->Brand}', ";
        $querystring = $querystring . "Model = '{$car->Model}', ";
        $querystring = $querystring . "YearProduction = {$car->YearProduction}, ";
        $querystring = $querystring . "Mileage = {$car->Mileage}, ";
        $querystring = $querystring . "FuelType = '{$car->FuelType}', ";
        $querystring = $querystring . "DriveType = '{$car->DriveType}', ";
        $querystring = $querystring . "EngineDisplacement = {$car->EngineDisplacement}, ";
        $querystring = $querystring . "EnginePower = {$car->EnginePower}, ";
        $querystring = $querystring . "Transmission = '{$car->Transmission}', ";
        $querystring = $querystring . "FuelConsumption = {$car->FuelConsumption}, ";
        $querystring = $querystring . "Body = '{$car->Body}', ";
        $querystring = $querystring . "Doors = {$car->Doors}, ";
        $querystring = $querystring . "Price = {$car->Price}";
        $querystring = $querystring . " WHERE ID = {$car->ID};";
        $db->query($querystring);
        
        if ($db->errno || $db->affected_rows != 1) echo json_encode(false);
        else echo json_encode(true);

        $db->close();
    }
}
?>