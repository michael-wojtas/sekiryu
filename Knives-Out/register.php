<?php

$conn = mysqli_connect("localhost", "root", "", "noze");

$errors = [];
$success = "";
$redirect = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $login = $_POST['login'];
    $mail = $_POST['mail'];
    $haslo = $_POST['haslo'];

    if ( empty($imie) || empty($nazwisko) || empty($login) || empty($mail) || empty($haslo) ) {
        $errors[] = "Wszystkie pola muszą być wypełnione.";
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Nieprawidłowy email.";
    }

    if (strlen($haslo) < 8) {
        $errors[] = "Hasło musi mieć co najmniej 8 znaków.";
    }

    $sql_login = "SELECT * FROM uzytkownicy WHERE login='$login'";
    $result_login = mysqli_query($conn, $sql_login);

    if (mysqli_num_rows($result_login) > 0) {
        $errors[] = "Login jest już zajęty.";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO uzytkownicy (imie, nazwisko, login, mail, haslo) VALUES ('$imie', '$nazwisko', '$login', '$mail', '$haslo')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $success = "Rejestracja udana!";
            $redirect = true;
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if ($redirect) { ?>
        <meta http-equiv="refresh" content="3;url=login.php">
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="register.css">
    <title>Sekiryu</title>
</head>
<body>
<nav class="sticky">
    <h2 onclick="location.href='index.php'"> <img src="images/ikonka-sigma.png" alt="sss"> <span>Sekiryu ほぎを </span></h2>


</nav>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($errors)) {
            echo '<div class="form-error">';
            foreach ($errors as $e) {
                echo $e . "<br>";
            }
            echo '</div>';
        }
        if ($success) {
            echo '<div class="form-succes">' . $success . '<br>' . 'Zaloguj się aby przejść dalej' .'</div>';
        }
    }
    ?>


 
<div class="form-handler">

    <form action="#" method="POST">

        <input type="text" name="imie" id="imie" placeholder="imie"> <br>
        <input type="text" name="nazwisko" id="nazwisko" placeholder="nazwisko"> <br>
        <input type="text" name="login" id="login" placeholder="login"> <br>
        <input type="text" name="mail" id="mail" placeholder="mail"> <br>
        <input type="password" name="haslo" id="haslo" placeholder="haslo"> <br>

        <input onclick="location.href='index.php'" type="submit" value="Zarejerstruj się">       

        <a class="siemanko" href="login.php">Zaloguj się</a>
    </form>



</div>

<footer>
    <div class="footer-left">
        <h2>Sekiryu ほぎを</h2>
    </div>

    <div class="footer-center">
        <div class="informacje">
            <h3>Informacje</h3>
            <div class="lists">
                <ul>
                    <li><a href="#">Regulamin</a></li>
                    <li><a href="#">Kontakt</a></li>
                    <li><a href="#">Wysyłka</a></li>
                    <li><a href="#">Reklamacje</a></li>
                </ul>
                <ul>
                    <li><a href="#">Oferta</a></li>
                    <li><a href="#">Płatności</a></li>
                    <li><a href="#">Wystąpnienie</a></li>
                    <li><a href="#">Odbiór</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-adres">
        <div class="adres">
            <h3>Sekiryu International</h3>
            <p>1 rue Rohan</p>
            <p>67790 STEINBOURG, France</p>
            <p>Napisz do nas:</p>
            <p id="whiteboycarl"> mail@gmail.com</p>
        </div>
    </div>

    <div class="footer-right">
        <h3>Dostawa i Płatność</h3>
        <div class="placenie">
            <img src="images/przelewy24.png" alt="Przelewy24">
            <img src="images/blik.png" alt="BLIK">
            <img src="images/dpd.png" alt="DPD">
            <img src="images/mastercard.png" alt="Mastercard">
            <img src="images/inpost.png" alt="InPost">
        </div>
    </div>

    <div class="footer-bottom">
        <p>Właścicielem serwisu jest firma Nazwa Firmy, wpisana w Centralnej Ewidencji i Informacji o Działalności Gospodarczej, posiadającą adres miejsca głównego wykonywania działalności ul. Przykładowa 00, 00-000 Miasto, NIP: 0000000000, REGON: 000000000, adres poczty elektronicznej: michal.wojtas2211@gmail.com, numer telefonu: 516 021 759</p>
    </div>
</footer>

<script src="script2.js"></script> <script src="zegarek.js"></script>

</body>
</html>


