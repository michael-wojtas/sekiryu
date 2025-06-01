<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="aktualnosc.css">
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
    <a href="index.php">Strona Główna</a> <p> > </p> <a href="aktualnosci.php">Aktualności</a>
</div>



<section class="historia">

    <h2 class="letter-spacing">AKTUALNOŚCI</h2>

    <div class="smoczek-left"> </div>
    <div class="right">

        <h3>Lorem ipsum dolor sit amet consectetur turpis nisi nullam at aliquam lectus</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur. Nisl eget imperdiet urna mattis fermentum consequat aliquam nunc. Proin lectus lacus odio diam ac. Tortor augue elementum dui aliquet ac a aliquam. Dictum suspendisse enim leo egestas nec condimentum consequat. Potenti dolor ac congue ut ut. Morbi nulla vestibulum felis sodales enim turpis hendrerit fermentum. Odio faucibus blandit ut egestas tellus. Dis lacus tempor est lobortis. Aliquam blandit vitae risus elit. Penatibus in ultricies tortor lorem in venenatis nisi id. Est congue adipiscing volutpat tincidunt.

        </p>

    </div>

</section>

<div class="tekst">

    <p>Lorem ipsum dolor sit amet consectetur. Nisi sit ullamcorper adipiscing vulputate tincidunt condimentum id lacus fringilla. Justo blandit pellentesque leo enim. Sapien dolor nec bibendum maecenas quis mauris. Sed enim et vulputate malesuada placerat. Enim ullamcorper lorem turpis mattis nisi sollicitudin eget dui. Id euismod eget ipsum ornare orci dictumst mattis libero. Interdum mauris vitae vestibulum aliquam in semper etiam neque accumsan. Ornare tristique risus sapien sit. Id semper maecenas massa tincidunt phasellus lobortis duis. Sit lectus elementum facilisi in eu nulla eleifend. Lectus porttitor at rhoncus at. In morbi ornare mauris lorem. Viverra etiam a egestas pellentesque interdum tortor a. Posuere nec sed morbi sit mauris integer eget. In ac platea facilisi ullamcorper sed laoreet in amet. Egestas in dui nisi tempor quis pretium. Nullam commodo cursus quam pulvinar lobortis ultrices massa feugiat nunc. Posuere ultrices purus praesent tristique ipsum leo ut risus. Porttitor fusce nunc justo pharetra in pretium morbi dui vitae. Nisi amet mauris curabitur fringilla odio habitasse elementum quis. Cursus amet sit sit rhoncus dui enim vel euismod donec. Elementum egestas facilisi pretium ultrices. Hendrerit quis sit feugiat non luctus cras vivamus in. Euismod neque mi lobortis in sed rhoncus pretium. Eu fames suscipit risus consectetur eget nunc non id. Enim mauris a dui vitae. Sem nisl tincidunt viverra tellus massa tellus duis condimentum sit. Sem at proin elementum parturient. Arcu non adipiscing at elementum.</p>

</div>




<div class="grid-sigma">

    <div class="grid-item"> </div>
    <div class="grid-item"> </div>
    <div class="grid-item"> </div>
    <div class="grid-item"> </div>

    <div class="grid-item"> </div>
    <div class="grid-item"> </div>
    <div class="grid-item"> </div>
    <div class="grid-item"> </div>

</div>

<div class="wiezienie">

<button  onclick="location.href='aktualnosci.php'" class="jacus">powrót do listy</button>

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
