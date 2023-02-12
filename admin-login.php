<?php
$title = "Logowanie do panelu administratora";
$file = "admin-login";
require_once("header.php");
?>

<h1 class="login-title">Panel administratora - Logowanie</h1>

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

        $user->encode_password();
        $result = $db->query("SELECT ID FROM Users WHERE Username LIKE '{$user->Username}' AND PasswordHash LIKE '{$user->PasswordHash}';");

        if ($result->num_rows == 1) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $user->Username;
            echo "<script>alert(\"Pomyślnie zalogowano.\"); location.href = \"./index.php\";</script>";
        }
        else {
            echo "<h1 style=\"text-align: center; color: red;\">Niepoprawne dane logowania.</h1>";
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
                    <td><input name="Username" id="loginText" type="text" placeholder="Podaj swój login"></td>
                </tr>
                <tr>
                    <td>Hasło:</td>
                    <td><input name="Password" id="passwordPassword" type="password" placeholder="Podaj swoje hasło"></td>
                </tr>
                <tr>
                    <td colspan="2"><button class="button-button" name="submit" value="submit" type="submit">Zaloguj się</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php require_once("footer.php"); ?>