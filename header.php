<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($title) && $title != "") ? $title." - " : "" ?>Komis samochodowy BestCars</title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link rel="stylesheet" href="./css/custom-controls.css">
    <link rel="stylesheet" href="./css/header-footer.css">
    <script src="./js/main.js"></script>
    <?php
    switch ($file) {
        case "index":
            echo '<link rel="stylesheet" href="./css/index.css">';
            break;

        case "cars":
            echo '<link rel="stylesheet" href="./css/cars.css">';
            echo '<script src="./js/cars.js"></script>';
            break;

        case "car-details":
            echo '<link rel="stylesheet" href="./css/car-details.css">';
            echo '<script src="./js/car-details.js"></script>';
            break;

        case "contact":
            echo '<link rel="stylesheet" href="./css/contact.css">';
            echo '<script src="./js/contact.js"></script>';
            break;

        case "admin-add-user":
        case "admin-login":
            echo '<link rel="stylesheet" href="./css/admin-login.css">';
            echo '<script src="./js/admin-login.js"></script>';
            break;

        case "admin-add-car":
            echo '<link rel="stylesheet" href="./css/admin-add-modify-car.css">';
            echo '<script src="./js/admin-add-modify-car.js"></script>';
            echo '<script src="./js/admin-add-car.js"></script>';
            break;

        case "admin-modify-car":
            echo '<link rel="stylesheet" href="./css/admin-add-modify-car.css">';
            echo '<script src="./js/admin-add-modify-car.js"></script>';
            echo '<script src="./js/admin-modify-car.js"></script>';
            break;

        case "admin-messages-list":
            echo '<link rel="stylesheet" href="./css/admin-messages-list.css">';
            echo '<script src="./js/admin-messages-list.js"></script>';
            break;
    }
    ?>
</head>
<body>
    <div class="main">
        <div class="header">
            <h1 class="header-title">
                Komis samochodowy <span class="header-title-bold">BestCars</span>
            </h1>
        </div>

        <div class="flex-menu">
            <a href="./index.php" class="flex-menu-entry"><p>Strona główna</p></a>
            <a href="./cars.php?type=osobowe" class="flex-menu-entry"><p>Samochody osobowe</p></a>
            <a href="./cars.php?type=dostawcze" class="flex-menu-entry"><p>Samochody dostawcze</p></a>
            <a href="contact.php" class="flex-menu-entry"><p>Kontakt</p></a>
        </div>