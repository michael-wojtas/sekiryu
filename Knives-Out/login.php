<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "noze");

$errors = [];
$success = "";
$redirect = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    if (empty($login) || empty($haslo)) {
        $errors[] = "Wszystkie pola muszą być wypełnione";
    }

    if (empty($errors)) {

        $sql = "SELECT id, haslo FROM uzytkownicy WHERE login='$login'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['haslo'] == $haslo) {

                $_SESSION['login'] = $login;
                $_SESSION['user_id'] = $row['id'];
                $success = "Zalogowano poprawnie";
                $redirect = true;
            }

            else {
                $errors[] = "Nieprawidłowe hasło";
            }
        }

        else {
            $errors[] = "Nie znaleziono użytkownika o podanym loginie";
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
    <?php
    if ($redirect) {
       echo' <meta http-equiv="refresh" content="3;url=index.php">';
    }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
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
        echo '<div class="form-succes">' . $success .'</div>';
    }
}
?>



<div class="form-handler">

    <form action="#" method="POST">

        <input type="text" name="login" id="login" placeholder="Login"> <br>
        <input type="password" name="haslo" id="haslo" placeholder="haslo"> <br>

        <input type="submit" value="Zaloguj się">       

        <a class="siemanko" href="register.php">Zarejerstruj się</a>
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


