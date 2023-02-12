<?php
$file = "admin-add-user";
$title = "Dodawanie nowego użytkownika";
require_once("header.php");

if (isset($_SESSION["login"]) == false || $_SESSION["login"] == false) {
?>
<script>alert("Musisz być zalogowany, aby przeglądać daną stronę."); location.href = "./index.php";</script>
<?php
    die("Musisz być zalogowany, aby przeglądać daną stronę.");
}
?>

<h1 class="login-title">Panel administratora - Dodawanie użytkownika</h1>

<?php
if (isset($_POST["submit"]) && $_POST["submit"] == "submit") {
    require_once("./api/models.php");

    $user = new User();
    foreach ($_POST as $key => $value) $user->$key = $value;

    if ($user->validate() == false) {
        header("HTTP/1.1 400 Bad Request");
        die("ERROR");
    }
    else {
        require_once("./api/db-connection.php");

        $result = $db->query("SELECT * FROM Users WHERE Username LIKE '{$user->Username}';") or die($db->error);
        
        if ($result->num_rows > 0) {
            echo "<h1 style=\"text-align: center; color: red;\">Użytkownik o takim loginie już istnieje.</h1>";
        }
        else {
            $user->encode_password();
            $db->query("INSERT INTO Users (Username, PasswordHash) VALUES ('{$user->Username}', '{$user->PasswordHash}');") or die($db->error);

            if ($db->affected_rows == 1) {
                echo "<script>alert(\"Pomyślnie dodano nowego użytkownika.\");</script>";
            }
            else {
                echo "<script>alert(\"Błąd podczas przetwarzania danych.\");</script>";
            }
        }

        $db->close();
    }
}
?>

<div class="login-form-container">
    <div>
        <form method="post" onsubmit="return formValidate();">
            <table>
                <tr>
                    <td>Login:</td>
                    <td><input name="Username" id="loginText" type="text" placeholder="Podaj login nowego użytkownika"></td>
                </tr>
                <tr>
                    <td>Hasło:</td>
                    <td><input name="Password" id="passwordPassword" type="password" placeholder="Podaj hasło nowego użytkownika"></td>
                </tr>
                <tr>
                    <td colspan="2"><button class="button-button" name="submit" value="submit" type="submit">Dodaj</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php require_once("footer.php"); ?>