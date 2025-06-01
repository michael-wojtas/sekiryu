<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="produkty.css">
    <link rel="stylesheet" href="produkt.css">

    <title>Sekiryu</title>
</head>
<body>
<nav class="sticky">
    <?php
    session_start();
    if (isset($_SESSION['login']) && strlen($_SESSION['login']) > 1) {
        $avatar = strtoupper(substr($_SESSION['login'],0,2));
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {

        if (!isset($_SESSION['login'])) {
            echo '<script>
            alert("Musisz być zalogowany, aby dodać produkt do koszyka!");
            window.location.href = "login.php";
        </script>';
            exit;
        }

        if (isset($_POST['ilosc']) && is_numeric($_POST['ilosc']) && $_POST['ilosc'] > 0) {
            $ilosc = $_POST['ilosc'];
        }
        else {
            $ilosc = 1;
        }

        $id = $_SESSION['selected_product_id'];

        if (!isset($_SESSION['cart_products'])) {
            $_SESSION['cart_products'] = [];
        }

        $_SESSION['cart_products'][$id] = $ilosc;

        header('Location: koszyk.php');
        exit;

    }

    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);

    $id = $_SESSION['selected_product_id'];

    $conn = mysqli_connect('localhost', 'root', '', 'noze');
    $sql = "SELECT * FROM produkty WHERE id = $id";
    $wynik = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($wynik);

    $nazwa = $row['nazwa'];
    $cena = $row['cena'];
    $oldCena = $row['cena'] + 150;
    $hrc = $row['hrc'];
    $typ_stali = $row['typ_stali'];
    $material_rekojesci = $row['material_rekojesci'];
    $sposob_ostrzenia =  $row['sposob_ostrzenia'];
    $dlugosc_calkowita = $row['dlugosc_calkowita'];
    $dlugosc_ostrza = $row['dlugosc_ostrza'];
    $szerokosc = $row['szerokosc'];
    $grubosc = $row['grubosc'];
    $waga = $row['waga'];
    $imgSrc = $row['nazwa_zdjecia'];
    $opis = $row['opis'];


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
    <a href="index.php">Strona Główna</a> <p> > </p> <a href="produkty.php">Produkty</a> <p> > </p> <a href="produkt.php">Kurochi</a>
</div>
<div class="kontener-wszytsko">
    <div class="side-left">
        <div class="grid-zdjecia">
            <div class="duze" style="background-image: url('<?php echo $imgSrc; ?>'); background-size:contain; background-position:center;"></div>
            <div class="male-filmik"></div>
            <div class="male-zdj"></div>
        </div>
    </div>
    <div class="side-right">
        <h2><?php echo $nazwa; ?></h2>
        <div class="info-cena">
            <div class="cena">
                <div class="center">
                    <h3 id="new-cena"><?php echo $cena; ?> zł</h3>
                    <div class="old-cena-holder">
                        <h3 id="old-cena"><?php echo $oldCena; ?> zł</h3>
                        <img src="images/icons/ifoczka.png" alt="sigiemka">
                    </div>
                </div>
                <p>Najniższa cena w ciągu ostatnich 30 dni</p>
            </div>
            <form class="guziki-container" method="post">
                <input id="ilosc" type="number" name="ilosc" min="1" value="1">
                <button type="submit" name="add_to_cart" class="JP"><img src="images/icons/koszyk.png" alt="koszyk"> Dodaj do koszyka</button>
            </form>
        </div>
        <div class="informacje-produkt">
            <div class="gorne-info">
                <h3>Informacje o Produkcie </h3>
                <p class="strzalka-w-gore"></p>
            </div>
            <span class="linia"></span>
            <div class="srednie-info">
                <?php echo $opis; ?>
            </div>
            <div class="gorne-info">
                <h3>Specyfikacja produktu </h3>
                <p class="strzalka-w-gore"></p>
            </div>
            <span class="linia"></span>
            <div class="srednie-specyfikacja">
                <p>Typ stali: <strong><?php echo $typ_stali; ?></strong></p>
                <p>HRC: <strong><?php echo $hrc; ?></strong></p>
                <p>Materiał Rękojeści: <strong><?php echo $material_rekojesci; ?></strong></p>
                <p>Sposób Ostrzenia: <strong><?php echo $sposob_ostrzenia; ?></strong></p>
                <p>Wymiary: <img src="images/specyfikacja.png" alt="sigiemka"></p>
                <p>Długość całkowita (A): <strong><?php echo $dlugosc_calkowita; ?></strong></p>
                <p>Dlugosć Ostrza (B): <strong><?php echo $dlugosc_ostrza; ?></strong></p>
                <p>Szerokość (C): <strong><?php echo $szerokosc; ?></strong></p>
                <p>Grubosć (D): <strong><?php echo $grubosc; ?></strong></p>
                <p>Waga: <strong><?php echo $waga; ?></strong></p>
            </div>
            <div class="gorne-info">
                <h3>Przydatne informacje </h3>
                <p class="strzalka-w-gore"></p>
            </div>
            <span class="linia"></span>
            <div class="srednie-przydatne">
                <ul>
                    <li>Wszystkie noże Masahiro są ekstremalnie ostre, zalecamy zatem użytkowanie z należytą ostrożnością.</li>
                    <li>Noży Masahiro nie należy używać to krojenia zamrożonych produktów (z wyjątkiem serii do tego przeznaczonej).</li>
                    <li>Nie używaj noży do innych celów niż spożywcze.</li>
                    <li>Do krojenia używaj drewnianych lub wykonanych z tworzywa desek do krojenia.</li>
                    <li>Nie należy myć noży w zmywarkach, które niszczą krawędź tnącą.</li>
                    <li>Myj nóż w ciepłej wodzie z dodatkiem płynu do mycia naczyń.</li>
                    <li>Po umyciu wytrzyj nóż do sucha.</li>
                </ul>
                <button onclick="location.href='produkty.php'"  class="JC">Powrót do listy</button>
            </div>
        </div>
    </div>
</div>

<span class="line"></span>
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
        <p>Właścicielem serwisu jest firma Nazwa Firmy, wpisana w Centralnej Ewidencji i Informacji o Działalności
            Gospodarczej, posiadającą adres miejsca głównego wykonywania działalności ul. Przykładowa 00, 00-000 Miasto,
            NIP: 0000000000, REGON: 000000000, adres poczty elektronicznej: michal.wojtas2211@gmail.com, numer telefonu:
            516 021 759</p>
    </div>
</footer>

<script src="script2.js"></script> <script src="zegarek.js"></script>

</body>
</html>
