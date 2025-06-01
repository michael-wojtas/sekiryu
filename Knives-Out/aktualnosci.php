<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="aktualnosci.css">
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
    <a href="index.php">Strona Główna</a> <p> > </p> <a href="aktualnosci.php.html">Aktualności</a>
</div>

<section class="historia">

    <h2 class="letter-spacing">AKTUALNOŚCI</h2>

    <div class="smoczek-left"> </div>
    <div class="right">

        <h3>Tradition and Inncoavtion</h3>
        <p>
            Since the 1990s, Haiku has conquered the European market with its Japanese knives with wooden handles, mixing Japanese and Western shapes. Made in a small family-run factory for over a century, these knives combine tradition and modernity, thanks to a complex alchemy of materials and ancestral know-how. Haiku knives offer convenience, perfect balance and a pleasant grip, thanks to a handle assembly inspired by katanas, and an easy-to-clean edge.

        </p>
        <button  onclick="location.href='aktualnosc.php'" class="JC">Zobacz więcej</button>
    </div>

</section>


<section class="historia-2">

    <div class="smoczek-left"> </div>
    <div class="right">

        <h3>Tradition and Inncoavtion</h3>
        <p>
            Since the 1990s, Haiku has conquered the European market with its Japanese knives with wooden handles, mixing Japanese and Western shapes. Made in a small family-run factory for over a century, these knives combine tradition and modernity, thanks to a complex alchemy of materials and ancestral know-how. Haiku knives offer convenience, perfect balance and a pleasant grip, thanks to a handle assembly inspired by katanas, and an easy-to-clean edge.

        </p>
        <button  onclick="location.href='aktualnosc.php'" class="JC">Zobacz więcej</button>
    </div>

</section>

<section class="historia">

    <div class="smoczek-left"> </div>
    <div class="right">

        <h3>Tradition and Inncoavtion</h3>
        <p>
            Since the 1990s, Haiku has conquered the European market with its Japanese knives with wooden handles, mixing Japanese and Western shapes. Made in a small family-run factory for over a century, these knives combine tradition and modernity, thanks to a complex alchemy of materials and ancestral know-how. Haiku knives offer convenience, perfect balance and a pleasant grip, thanks to a handle assembly inspired by katanas, and an easy-to-clean edge.

        </p>
        <button  onclick="location.href='aktualnosc.php'" class="JC">Zobacz więcej</button>
    </div>

</section>


<section class="historia-2">

    <div class="smoczek-left"> </div>
    <div class="right">

        <h3>Tradition and Inncoavtion</h3>
        <p>
            Since the 1990s, Haiku has conquered the European market with its Japanese knives with wooden handles, mixing Japanese and Western shapes. Made in a small family-run factory for over a century, these knives combine tradition and modernity, thanks to a complex alchemy of materials and ancestral know-how. Haiku knives offer convenience, perfect balance and a pleasant grip, thanks to a handle assembly inspired by katanas, and an easy-to-clean edge.

        </p>
        <button  onclick="location.href='aktualnosc.php'" class="JC">Zobacz więcej</button>
    </div>

</section>


<div class="szybkie-numerki">
    <button class="left-arrow">←</button>
    <ul>
        <li><a href="#">01</a></li>
        <li><a href="#">02</a></li>
        <li><a href="#">03</a></li>
        <li><a href="#">04</a></li>
        <li><a href="#">05</a></li>
        <li class="dots">...</li>
        <li><a href="#">10</a></li>
        <li><a href="#">11</a></li>
        <li><a href="#">12</a></li>
        <li><a href="#">13</a></li>
    </ul>
    <button class="right-arrow">→</button>
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
