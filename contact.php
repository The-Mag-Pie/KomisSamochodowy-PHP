<?php
$getRequest = false;
if (isset($_GET["id"]) || isset($_GET["brand"]) || isset($_GET["model"])) {
    if (isset($_GET["id"]) == false || isset($_GET["brand"]) == false || isset($_GET["model"]) == false) {
        ?>
        <script>
            alert("BŁĄD! Niepoprawne żądanie GET.");
            location.href = "./contact.php";
        </script>
        <?php
        die("BŁĄD! Niepoprawne żądanie GET.");
    }
    else {
        $getRequest = true;
    }
}

$title = "Kontakt";
$file = "contact";
require_once("header.php");
?>

<div class="main-content">
    <h1 class="main-title">Skontaktuj się z nami</h1>
    <h1 id="loadingInfo" style="display: none;">Wysyłanie wiadomości...</h1>
    <div class="flex-container">
        <div class="flex-element company-details">
            <p><b>Komis samochodowy BestCars Jan Kowalski S. C.</b></p>
            <p>ul. Oleska 40</p>
            <p>45-123 Opole</p>
            <p>tel. <a href="tel:+48774541234">77 454 12 34</a></p>
            <p>fax: <a href="tel:+48774541233">77 454 12 33</a></p>
            <p>E-mail: <a href="mailto:bestcars@email.pl">bestcars@email.pl</a></p>
            <a class="a-button" target="_blank" href="https://www.google.com/maps/place/Oleska+40,+46-020+Opole">Pokaż na mapie</a>
        </div>
        <div class="flex-element contact-form">
            <form onsubmit="return false;">
                <table>
                    <tr>
                        <th></th>
                        <th><h3>Formularz kontaktowy</h3></th>
                    </tr>
                    <tr>
                        <td>Imię:</td>
                        <td>
                            <input id="nameText" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td>
                            <input id="emailText" type="email">
                        </td>
                    </tr>
                    <tr>
                        <td>Temat:</td>
                        <td>
                            <input id="topicText" type="text" value="<?= $getRequest ? "Dotyczy samochodu {$_GET['brand']} {$_GET['model']} #{$_GET['id']}" : "" ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Treść:</td>
                        <td>
                            <textarea id="contentTextarea"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="button-button" type="submit" onclick="sendMessage()">Wyślij</button>
                            <?php
                            if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
                            ?>
                            <a class="a-button" style="margin: 5px auto;" href="./admin-messages-list.php">Pokaż wiadomości</a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php require_once("footer.php"); ?>