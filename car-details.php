<?php
if (isset($_GET["id"]) == false || intval($_GET["id"]) == 0) {
?>
<script>
    alert("BŁĄD! Niepoprawne żądanie GET.");
    location.href = "./index.php";
</script>
<?php
    die("BŁĄD! Niepoprawne żądanie GET.");
}

$title = "Szczegóły pojazdu";
$file = "car-details";
require_once("header.php");
?>

<div class="main-content">
    <h1>Szczegóły samochodu - <span id="titleBrandModel" style="color: forestgreen;"></span></h1>
    <h1 id="loadingInfo">Trwa pobieranie danych...</h1>
    <div class="flex-container">
        <div class="left-img">
            <img id="carImage" alt="Zdjęcie samochodu">
        </div>
        <div class="right-details">
            <table>
                <tr>
                    <td>Marka<br><span id="brand"></span></td>
                    <td>Model<br><span id="model"></span></td>
                    <td>Rocznik<br><span id="yearProduction"></span></td>
                </tr>
                <tr>
                    <td>Przebieg<br><span id="mileage"></span></td>
                    <td>Rodzaj paliwa<br><span id="fuelType"></span></td>
                    <td>Rodzaj napędu<br><span id="driveType"></span></td>
                </tr>
                <tr>
                    <td>Pojemność skokowa<br><span id="engineDisplacement"></span></td>
                    <td>Moc silnika<br><span id="enginePower"></span></td>
                    <td>Skrzynia biegów<br><span id="transmission"></span></td>
                </tr>
                <tr>
                    <td>Spalanie (cykl mieszany)<br><span id="fuelConsumption"></span></td>
                    <td>Rodzaj nadwozia<br><span id="body"></span></td>
                    <td>Ilość drzwi<br><span id="doors"></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Cena<br><span id="price"></span></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="contact-button-container">
        <a id="contactButton" class="a-button" href>Skontaktuj się z nami w sprawie tego samochodu</a>
    </div>
    <?php
    if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
    ?>
    <div class="admin-buttons-container">
        <div class="button">
            <a class="a-button" href="./admin-modify-car.php?id=<?= $_GET["id"] ?>">Modyfikuj dane</a>
        </div>
        <div class="button">
            <button onclick="deleteCarClick()" class="button-button">Usuń pojazd</button>
        </div>
    </div>
    <?php
    }
    ?>
</div>

<?php require_once("footer.php"); ?>