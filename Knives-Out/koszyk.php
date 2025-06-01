<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="koszyk.css">
    <title>Sekiryu</title>
</head>
<body>
<nav class="sticky">
    <?php
    session_start();

    if (!isset($_SESSION['login'])) {
        echo '<script> alert("Musisz być zalogowany, aby wejśc do koszyka"); window.location.href = "login.php" </script>';
        exit;
    }

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
    <a href="index.php">Strona Główna</a> <p> > </p> <a href="koszyk.php">Koszyk</a>
</div>

<div class="cart-handler">

<div class="cart">
    <h1 class="cart-heading">Twój koszyk</h1>


    <div class="cart-list">
           <?php

           $conn = mysqli_connect('localhost', 'root', '', 'noze');

           $total = 0;

//         Usuwanie

           if (isset($_POST['remove'])) {
               $remove_id = $_POST['remove'];
               unset($_SESSION['cart_products'][$remove_id]);
               header('Location: koszyk.php');
               exit;
           }

//         Dostawa

           if (isset($_POST['shipping'])) {
               $_SESSION['shipping'] = $_POST['shipping'];
           }

           if (!isset($_SESSION['shipping'])) {
               $_SESSION['shipping'] = 16.99;
           }

//         Kupony

           if (isset($_POST['apply']) && !empty($_POST['kupon'])) {
               $kupon = $_POST['kupon'];

               $query = "SELECT znizka FROM kody WHERE nazwa = '$kupon'";
               $result2 = mysqli_query($conn, $query);

               if ($row = mysqli_fetch_assoc($result2)) {
                   $_SESSION['discount'] = $row['znizka'];
                   header('Location: koszyk.php');
                   exit;
               }
           }

           if (!isset($_SESSION['discount'])) {
               $_SESSION['discount'] = 0;
           }

//         Zamawianie

           if (isset($_POST['order'])) {

               if (!isset($_SESSION['cart_products']) || count($_SESSION['cart_products']) == 0) {
                   echo "<script>alert('Brak produktów w koszyku!'); window.location.href='produkty.php'</script>";
                   exit;
               }

               unset($_SESSION['cart_products']);
               unset($_SESSION['shipping']);
               unset($_SESSION['discount']);

               header('Location: index.php');
               exit;
           }

//         Wyświetlanie

            if (!isset($_SESSION['cart_products']) || count($_SESSION['cart_products']) == 0) {
                echo "<p class='cart-empty'>Twój koszyk jest pusty.</p>";
            }

            else {
                foreach ($_SESSION['cart_products'] as $product_id => $ilosc) {

                    $sql = "SELECT * FROM produkty WHERE id = " . $product_id;
                    $result = mysqli_query($conn, $sql);

                    if ($row = mysqli_fetch_assoc($result)) {

                        $nazwa = $row['nazwa'];
                        $cena = $row['cena'];
                        $img = $row['nazwa_zdjecia'];
                        $typ_stali = $row['typ_stali'];
                        $dlugosc_ostrza = $row['dlugosc_ostrza'];
                        $opis = $row['opis'];

                        $row_total = $cena * $ilosc;
                        $total += $row_total;

            ?>

                        <div class="cart-item">
                            <div class="cart-img">
                                <img src="<?php echo $img; ?>" alt="zdjecie noża">
                            </div>
                            <div class="cart-info">
                                <h3><?php echo $nazwa; ?></h3>
                                <details class="cart-details">
                                    <summary>Szczegóły</summary>
                                    <?php echo $typ_stali; ?>, długość ostrza: <?php echo $dlugosc_ostrza; ?>cm.<br>
                                    <?php echo $opis; ?>
                                </details>
                                <span class="cart-price"><?php echo $cena; ?> zł</span>
                            </div>
                            <div class="cart-ilosc">
                                <input type="number" min="1" value="<?php echo $ilosc; ?>" data-id="<?php echo $product_id; ?>">
                            </div>
                            <div class="cart-row-total"><?php echo number_format($row_total, 2, ','); ?> zł</div>
                            <form method="post" style="display:inline">
                                <input type="hidden" name="remove" value="<?php echo $product_id; ?>">
                                <button class="cart-remove" title="Usuń z koszyka" type="submit">❌</button>
                            </form>
                        </div>

                        <?php
                    }
                }

            mysqli_close($conn);
        }
        ?>
    </div>


    <div class="cart-flex">

        <div class="cart-options">
            <form class="cart-kupon" method="post">
                <label for="kupon">Kod rabatowy:</label>
                <input type="text" id="kupon" name="kupon" placeholder="Wpisz kod">
                <button type="submit" name="apply">Zastosuj</button>
            </form>

            <form method="post" id="shippingForm">
                <div class="cart-shipping">
                    <span>Sposób dostawy:</span>
                    <label>
                        <input type="radio" name="shipping" value="16.99" onclick="document.getElementById('shippingForm').submit();" <?php if ($_SESSION['shipping'] == 16.99) echo 'checked'; ?>>
                        Kurier DPD (16,99 zł)
                    </label>
                    <label>
                        <input type="radio" name="shipping" value="13.99" onclick="document.getElementById('shippingForm').submit();"<?php if ($_SESSION['shipping'] == 13.99) echo 'checked'; ?>>
                        Paczkomat InPost (13,99 zł)
                    </label>
                </div>
            </form>

            <div class="cart-payment">
                <span>Sposób płatności:</span>
                <label><input type="radio" name="payment" checked> Przelewy24</label>
                <label><input type="radio" name="payment"> BLIK</label>
                <label><input type="radio" name="payment"> Za pobraniem</label>
            </div>
        </div>


        <div class="cart-summary">
            <h2 class="summary-heading">Podsumowanie</h2>
            <div class="summary-row">
                <span>Produkty:</span>
                <span><?php echo number_format($total, 2, ','); ?> zł</span>
            </div>
            <div class="summary-row">
                <span>Dostawa:</span>
                <span><?php echo number_format($_SESSION['shipping'], 2, ','); ?> zł</span>
            </div>
            <div class="summary-row summary-discount">
                <span>Rabat:</span>
                <span>
                − <?php echo number_format($_SESSION['discount'], 2, ','); ?> zł
                </span>
            </div>
            <div class="summary-total">
                <span>Łącznie:</span>
                <span class="summary-total-price">
                    <?php

                    $discount = $_SESSION['discount'];
                    echo number_format($total - $discount + $_SESSION['shipping'], 2, ',');

                    ?> zł
                </span>
            </div>


            <div class="summary-buttons">
                <button onclick="location.href='produkty.php'" class="summary-btn continue">Kontynuuj zakupy</button>
                <form method="post">
                    <button type="submit" name="order" class="summary-btn order">Złóż zamówienie</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
<script src="galeria.js"></script>

</body>
</html>

