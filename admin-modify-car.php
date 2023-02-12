<?php
$file = "admin-modify-car";
$title = "Modyfikowanie danych samochodu";
require_once("header.php");

if (isset($_SESSION["login"]) == false || $_SESSION["login"] == false) {
?>
<script>alert("Musisz być zalogowany, aby przeglądać daną stronę."); location.href = "./index.php";</script>
<?php
    die("Musisz być zalogowany, aby przeglądać daną stronę.");
}

if (isset($_GET["id"]) == false || intval($_GET["id"]) == 0) {
    ?>
    <script>
        alert("BŁĄD! Niepoprawne żądanie GET.");
        location.href = "./index.php";
    </script>
    <?php
    die("BŁĄD! Niepoprawne żądanie GET.");
}
?>

<div class="main-content">
    <h1>Modyfikowanie danych samochodu <span id="titleBrandModel"></span></h1>
    <h1 id="loadingInfo">Przetwarzanie danych...</h1>
    <form action="" onsubmit="return false;">
        <div class="form-flex-container">
            <div class="left-img">
                <div id="dropArea">
                    <p>Zdjęcie pojazdu:</p>
                    <h1 id="dragdropText">UPUŚĆ ZDJĘCIE TUTAJ</h1>
                    <img id="imagePreview" alt="Dodaj zdjęcie samochodu"><br>
                    <button type="button" id="undoChangesButton">Cofnij zmianę obrazka</button>
                    <input id="inputImage" type="file" accept="image/*">
                    <script>
                        undoChangesButton.onclick = e => {
                            imagePreview.src = defaultImageUrl;
                            inputImage.value = null;
                        };

                        inputImage.onchange = e => {
                            if (inputImage.files.length > 0) {
                                imagePreview.src = URL.createObjectURL(inputImage.files[0]);
                            }
                        };

                        window.addEventListener("paste", e => {
                            if (e.clipboardData.files[0].type.startsWith("image/")) {
                                inputImage.files = e.clipboardData.files;
                                inputImage.dispatchEvent(new Event("change"));
                            }
                        });

                        dropArea.addEventListener("dragenter", e => { dragdropText.style.display = "block"; });
                        dropArea.addEventListener("dragleave", e => { dragdropText.style.display = "none"; });
                        dropArea.addEventListener("dragover", e => { dragdropText.style.display = "block"; });
                        dropArea.addEventListener("drop", e => {
                            if (e.dataTransfer.files[0].type.startsWith("image/")) {
                                inputImage.files = e.dataTransfer.files;
                                inputImage.dispatchEvent(new Event("change"));
                            }
                            dragdropText.style.display = "none";
                        });

                        ["dragenter", "dragleave", "dragover", "drop"].forEach(eventName => {
                            dropArea.addEventListener(eventName, e => {
                                e.preventDefault();
                                e.stopPropagation();
                            })
                        });
                    </script>
                </div>
            </div>
            <div class="right-details">
                <table>
                    <tr>
                        <td></td>
                        <td>
                            <p>Kategoria pojazdu</p>
                            <select id="categorySelect">
                                <option value="osobowe">Samochody osobowe</option>
                                <option value="dostawcze">Samochody dostawcze</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p>Marka</p><input type="text" id="brandText" placeholder="Podaj markę pojazdu..."></td>
                        <td><p>Model</p><input type="text" id="modelText" placeholder="Podaj model pojazdu..."></td>
                        <td><p>Rocznik</p><input type="number" id="yearProductionNumber" placeholder="Podaj rocznik pojazdu..."></td>
                    </tr>
                    <tr>
                        <td><p>Przebieg (km)</p><input type="number" id="mileageNumber" placeholder="Podaj przebieg pojazdu..."></td>
                        <td>
                            <p>Rodzaj paliwa</p>
                            <select id="fuelTypeSelect">
                                <option value="Benzyna">Benzyna</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Benzyna + LPG">Benzyna + LPG</option>
                                <option value="LPG">LPG</option>
                                <option value="Napęd elektryczny">Napęd elektryczny</option>
                                <option value="Wodór">Wodór</option>
                            </select>
                        </td>
                        <td>
                            <p>Rodzaj napędu</p>
                            <select id="driveTypeSelect">
                                <option value="AWD">AWD</option>
                                <option value="4WD">4WD</option>
                                <option value="FWD">FWD</option>
                                <option value="RWD">RWD</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Pojemność skokowa (cm<sup>3</sup>)</p><input type="number" id="engineDisplacementNumber" step="0.1" placeholder="Podaj pojemność silnika..."></td>
                        <td><p>Moc silnika (KM)</p><input type="number" id="enginePowerNumber" placeholder="Podaj moc silnika..."></td>
                        <td>
                            <p>Skrzynia biegów</p>
                            <select id="transmissionTypeSelect">
                                <option value="manualna">manualna</option>
                                <option value="automatyczna">automatyczna</option>
                                <option value="sekwencyjna">sekwencyjna</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Spalanie (l/100km)</p><input type="number" id="fuelConsumptionNumber" step="0.1" placeholder="Podaj spalanie..."></td>
                        <td><p>Rodzaj nadwozia</p><input type="text" id="bodyText" placeholder="Podaj rodzaj nadwozia..."></td>
                        <td><p>Ilość drzwi</p><input type="number" id="doorsNumber" placeholder="Podaj ilość drzwi..."></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><p>Cena (zł)</p><input type="number" id="priceNumber" step="0.01" placeholder="Podaj cenę..."></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <button class="button-button" type="submit" onclick="modifyCar()">Zapisz</button>
    </form>
</div>

<?php require_once("footer.php"); ?>