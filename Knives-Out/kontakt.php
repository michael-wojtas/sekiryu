<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="kontakt.css">
    <title>Sekiryu</title>
</head>
<body>
<nav class="sticky">
    <?php
    session_start();
    if (isset($_SESSION['login']) && strlen($_SESSION['login']) > 1) {
        $avatar = strtoupper(substr($_SESSION['login'],0,2));
    }

    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);


    ?>
    <h2 onclick="location.href='index.php'"> <img src="images/ikonka-sigma.png" alt="sss"> <span> Sekiryu ほぎを </span> </h2>

    <div class="right-items">
        <div id="czas"></div> <input type="search" placeholder="Wpisz szukaną fraze" name="search" class="search">   
        <button id="lupa"></button>
        <button onclick="location.href='login.php'" id="konto"></button>
        <button onclick="location.href='koszyk.php'" id="koszyk"></button>

        <?php
        if ($avatar) {
            echo '<div onclick="location.href=\'profil.php\'" class="user-avatar">' . $avatar . '</div>';
        }
        ?>
        <div class="burger-menu">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
</nav>


<div class="nav-menu">

    <ul>
        <li><a href="produkty.php">PRODUKTY</a></li>
        <li><a href="kontakt.php">KONTAKT</a></li>
        <li><a href="regulamin.php">REGULAMIN</a></li>
        <li><a href="historia.php">HISTORIA</a></li>
        <li><a href="aktualnosci.php">AKTUALNOŚCI</a></li>
        <li><a href="koszyk.php">KOSZYK</a></li>
        <li><a href="login.php">KONTO</a></li>
    </ul>
    

    <div id="mob-sigma">
    <input type="text" placeholder="Wyszukaj" name="search" id="mob-search">
        <button id="lupa-mob"></button>
    </div>

</div>

<div class="gorna-sigma">
    <a href="index.php">Strona Główna</a> <p> > </p> <a href="kontakt.php">Kontakt</a>
</div>

<section class="kontakt"> 

    <h2 class="letter-spacing">KONTAKT</h2>    

    <p>Firma OMC jest dystrybutorem produktów marki MASAHIRO w Polsce. 
        <br>
        Zapraszamy do współpracy odbiorców hurtowych, sklepy z nożami, kucharzy, restauratorów, hotelarzy, blogerów, dekoratorów wnętrz i projektantów.
    </p>

    <div class="pasek-informacyjny">

        <h1>ほぎを</h1>

        <div class="inter">
            <div class="czerw"><img id="ma" src="images/icons/lokalpng.png" alt="remenmrf"></div>
            <div class="plus-info">
            <strong>Sekiryu International</strong>
            <p>1 rue Rohan 67790 STEINBOURG, France</p>
            </div>
        </div>

        <div class="pisz">
            <div class="czerw"><img id="mai" src="images/icons/Vector.png" alt="rem"></div>
            <div class="plus-info">
            <strong>Napisz do nas</strong>
            <p>meilleur@couteau.info</p>
            </div>
        </div>

    </div>

</section>

<h2 class="siu">Formularz Kontaktowy</h2>

<div class="smok-na-prawo">

<form action="#">

    <div class="row">
<div>
    <label for="imie">Imie i Nazwisko:</label>
    <input id="imie" name="imie" type="text">
</div>

    <div>
    <label for="adress">Adres e-mail</label>
    <input id="adress" name="mail" type="email">
    </div>

    <div>
    <label for="tel">Telefon</label>
    <input id="tel" name="tel" type="tel">
    </div>
    </div>


    <label for="wiad">Wiadomość</label>
    <textarea id="wiad" cols="30" rows="10"></textarea>

    <strong>Udowodnij, że nie jesteś robotem</strong>

    <div class="cap-row">
    <div class="captcha"> </div>
    <input id="obrazek" type="text" placeholder="Przepisz kod z Obrazka">
    </div>

    <div class="checkbox"> <input type="checkbox" name="check" id="JCDW"> <p>Aenean accumsan magna id dapibus vehicula. Sed viverra mi posuere auctor porttitor. Nullam lectus mauris, tincidunt semper efficitur eu, ullamcorper ac dui. Duis lobortis vitae felis sed interdum. Donec ut blandit mi. Donec sagittis purus at nulla dapibus, vitae ultricies ligula dapibus. Pellentesque lobortis nisl at nibh imperdiet, vitae porttitor turpis malesuada. Pellentesque commodo justo a justo ultricies maximus.</p> </div>

    <div class="kocham-julie-chaber">
    <input type="submit" value="Wyślij Wiadomość">
    </div>


</form>

    <div class="smoczek-right"></div>

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
