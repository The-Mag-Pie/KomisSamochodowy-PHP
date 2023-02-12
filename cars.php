<?php
function onerror() {
    ?>
    <script>
        alert("BŁĄD! Niepoprawne żądanie GET.");
        location.href = "./index.php";
    </script>
    <?php
    die("BŁĄD! Niepoprawne żądanie GET.");
}

if (isset($_GET['type'])) {
    switch ($_GET['type']) {
        case "osobowe":
            $title = "Samochody osobowe";
            break;

        case "dostawcze":
            $title = "Samochody dostawcze";
            break;

        default:
            onerror();
            break;
    }
}
else {
    onerror();
}
$file = "cars";
require_once("header.php");
?>

<div class="main-content">
    <h2>Poznaj ofertę na nasze <span style="color: blue;"><?= strtolower($title) ?></span></h2>
    <h5>Podane ceny są cenami do negocjacji!</h5>
    <?php
    if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
    ?>
    <div class="admin-add-car">
        <a class="a-button" href="./admin-add-car.php?type=<?= $_GET["type"] ?>">Dodaj nowy samochód</a>
    </div>
    <?php
    }
    ?>
    <table id="carsTable">
        <tr>
            <th></th>
            <th>Marka</th>
            <th>Model</th>
            <th>Rodzaj paliwa</th>
            <th>Przebieg</th>
            <th>Cena</th>
            <th></th>
        </tr>
    </table>
    <h1 id="loadingInfo">Trwa pobieranie danych...</h1>
</div>

<?php require_once("footer.php"); ?>