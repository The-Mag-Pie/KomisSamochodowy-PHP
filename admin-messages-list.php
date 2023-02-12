<?php
$title = "Lista wiadomości";
$file = "admin-messages-list";
require_once("header.php");

if (isset($_SESSION["login"]) == false || $_SESSION["login"] == false) {
?>
<script>alert("Musisz być zalogowany, aby przeglądać daną stronę."); location.href = "./index.php";</script>
<?php
    die("Musisz być zalogowany, aby przeglądać daną stronę.");
}
?>

<div class="main-content">
    <h1>Lista wiadomości</h1>
    <h1 id="loadingInfo">Ładowanie danych...</h1>
    <table id="messagesTable">
        <tr>
            <th>Data i godzina</th>
            <th>Imię</th>
            <th>E-mail</th>
            <th>Temat</th>
            <th>Treść</th>
        </tr>
    </table>
</div>

<?php require_once("footer.php"); ?>