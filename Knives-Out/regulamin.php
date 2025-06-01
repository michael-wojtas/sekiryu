<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="regulamin.css">
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
        <a href="index.php">Strona Główna</a> <p> > </p> <a href="regulamin.php">Regulamin</a>
    </div>
    

<section class="definicje">

    <h1 >REGULAMIN</h1>

    <article>



    <h2>I. Definicje</h2>
    <p>Użyte w Regulaminie pojęcia oznaczają:</p>
    <ol>
        <li><strong>Klient</strong> – osoba fizyczna, osoba prawna lub jednostka organizacyjna niebędąca osobą prawną, której przepisy szczególne przyznają zdolność prawną, która dokonuje Zamówienia w ramach Sklepu;</li>
        <li><strong>Konsument</strong> – zgodnie z art. 22<sup>1</sup> Kodeksu Cywilnego oznacza osobę fizyczną dokonującą z przedsiębiorcą czynności prawnej niezwiązanej bezpośrednio z jej działalnością gospodarczą lub zawodową;</li>
        <li><strong>Kodeks Cywilny</strong> – ustawa z dnia 23 kwietnia 1964 r. (Dz.U. Nr 16, poz. 93 ze zm.);</li>
        <li><strong>Regulamin</strong> – niniejszy Regulamin świadczenia usług drogą elektroniczną w ramach sklepu internetowego;</li>
        <li><strong>Sklep internetowy (Sklep)</strong> – serwis internetowy dostępny pod [Niemchem.com], za pośrednictwem którego Klient może w szczególności składać Zamówienia;</li>
        <li><strong>Towar</strong> – produkty prezentowane w Sklepie Internetowym;</li>
        <li><strong>Umowa sprzedaży</strong> – umowa sprzedaży Towarów w rozumieniu Kodeksu Cywilnego, zawarta pomiędzy;</li>
        <li><strong>Ustawa o prawach konsumenta</strong> – ustawa z dnia 30 maja 2014 r. o prawach konsumenta (Dz.U. z 2014 r. poz. 827);</li>
        <li><strong>Ustawa o świadczeniu usług drogą elektroniczną</strong> – ustawa z dnia 18 lipca 2002 r. o świadczeniu usług drogą elektroniczną (Dz. U. Nr 144, poz. 1204 ze zm.);</li>
        <li><strong>RODO</strong> – Rozporządzenie Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (ogólne rozporządzenie o ochronie danych);</li>
        <li><strong>Zamówienie</strong> – oświadczenie woli Klienta, zmierzające bezpośrednio do zawarcia Umowy sprzedaży, określające w szczególności rodzaj i liczbę Towaru.</li>
    </ol>

    </article>

    <article>

    <h2>II. Postanowienia ogólne</h2>
    <ol>
        <li>Niniejszy Regulamin określa zasady korzystania ze sklepu internetowego dostępnego pod adresem: [adres strony internetowej].</li>
        <li>Niniejszy Regulamin jest regulaminem, o którym mowa w art. 8 Ustawy o świadczeniu usług drogą elektroniczną.</li>
        <li>Sklep internetowy, działający pod adresem: prowadzony jest przez [nazwa firmy].</li>
    </ol>
    <p>Niniejszy Regulamin określa w szczególności:</p>
    <ul>
        <li>zasady dokonywania rejestracji i korzystania z konta w ramach sklepu internetowego;</li>
        <li>warunki i zasady składania drogą elektroniczną Zamówień w ramach sklepu internetowego;</li>
        <li>zasady zawierania Umów sprzedaży z wykorzystaniem usług świadczonych w ramach Sklepu Internetowego.</li>
    </ul>
    <ol start="5">
        <li>Korzystanie ze sklepu internetowego jest możliwe pod warunkiem spełnienia przez system teleinformatyczny, z którego korzysta Klient następujących minimalnych wymagań technicznych:
            <ul>
                <li>Internet Explorer w wersji 10 lub nowszej lub</li>
                <li>odpowiednia inna przeglądarka kompatybilna z ww.</li>
            </ul>
        </li>
        <li>W celu korzystania ze sklepu internetowego Klient powinien we własnym zakresie uzyskać dostęp do stanowiska komputerowego lub urządzenia końcowego z dostępem do Internetu.</li>
        <li>Zgodnie z obowiązującymi przepisami prawa chemikaliami zastrzega się możliwość ograniczenia świadczenia usług za pośrednictwem Sklepu internetowego do osób, które ukończyły wiek 18 lat. W takim przypadku potencjalni Klienci zostaną o tym powiadomieni.</li>
        <li>Klienci mogą uzyskać dostęp do niniejszego Regulaminu w każdym czasie za pośrednictwem odsyłacza zamieszczonego na stronie głównej serwisu oraz pobrać go i sporządzić jego wydruk.</li>
    </ol>

    </article>
</section>




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
