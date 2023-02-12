function formValidate() {
    let isEmpty = false;
    let message = "";
    let elem = null;

    if (loginText.value == "") {
        isEmpty = true;
        message = "BŁĄD! Nie wpisano loginu!";
        elem = loginText;
    }
    else if (passwordPassword.value == "") {
        isEmpty = true;
        message = "BŁĄD! Nie wpisano hasła!";
        elem = passwordPassword;
    }

    if (isEmpty && message != "" && elem != null) {
        alert(message);
        elem.focus();
        return false;
    }
    else {
        return true;
    }
}