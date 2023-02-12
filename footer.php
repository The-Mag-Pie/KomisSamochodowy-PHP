        <div class="footer">
            <div class="footer-info">
                <div>
                    <p>Imię i nazwisko: <span>Bartosz XXXXXX</span></p>
                    <p>Numer indeksu: <span>012345</span></p>
                    <p>Grupa zajęciowa (projektowa): <span>0</span></p>
                    <p>Email: <span><a href="mailto:b.soroczynski@student.po.edu.pl">XXXXXX@student.po.edu.pl</a></span></p>
                    <p><span></span></p>
                </div>
            </div>
            <div class="footer-po-logo">
                <a target="_blank" href="https://po.edu.pl/">
                    <img src="./images/po_logo.jpg" alt="Politechnika opolska">
                </a>
            </div>
        </div>
        <div class="login-link">
            <?php
            if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
            ?>
                Użytkownik: <?= $_SESSION["username"] ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void()" onclick="logout()">Wyloguj się</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="./admin-add-user.php">Dodaj nowego użytkownika</a>
            <?php
            }
            else {
            ?>
                <a href="./admin-login.php">Logowanie</a>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
<?php session_commit(); ?>