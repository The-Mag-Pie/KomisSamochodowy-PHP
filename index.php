<?php
$title = "";
$file = "index";
require_once("header.php");
?>

<div class="main-content">
    <div class="left-element">
        <img src="./images/car2-index.jpg" alt="Samochód sportowy">
    </div>
    <div class="right-element">
        <img src="./images/car-index.webp" alt="Samochód sportowy">
    </div>
    <div class="center-content">
        <span>
            <h3>Witaj na stronie naszego komisu samochodowego!</h3>
        </span>
        <p>Potrzebujesz niezawodnego auta <span style="color: green;">w dobrej cenie</span>? Chcesz mieć <span style="color: red;">gwarancję przebiegu</span>? Nie chcesz tracić zbędnego czasu <span style="color: blue;">przebywając u mechanika</span>? A może potrzebujesz auto, które sprawdzi się na <span style="color: maroon;" >długich trasach przewożąc kilka ton cennego towaru</span>? Jeśli tak, to <b>dobrze trafiłeś</b>! Zapraszamy do zapoznania się z naszą ofertą <a href="./cars.php?type=osobowe">samochodów osobowych</a> lub <a href="./cars.php?type=dostawcze">samochodów dostawczych</a>.</p>
        <div class="buttons-flex-container">
            <div class="button-container">
                <a class="a-button" href="./cars.php?type=osobowe" class="button-osobowe">Samochody osobowe</a>
            </div>
            <div class="button-container">
                <a class="a-button" href="./cars.php?type=dostawcze" class="button-dostawcze">Samochody dostawcze</a>
            </div>
        </div>
    </div>
</div>

<?php require_once("footer.php"); ?>