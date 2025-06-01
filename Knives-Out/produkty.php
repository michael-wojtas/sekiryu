    <!DOCTYPE html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="produkty.css">

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

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
            $_SESSION['selected_product_id'] = $_POST['product_id'];
            header('Location: produkt.php');
            exit;
        }

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        }

        else {
            $sort = 'ascending-letters';
        }

        if ($sort == 'descending-letters') {
            $orderBy = 'nazwa DESC';
        }
        elseif ($sort == 'ascending-price') {
            $orderBy = 'cena ASC';
        }
        elseif ($sort == 'descending-price') {
            $orderBy = 'cena DESC';
        }
        else {
            $orderBy = 'nazwa ASC';
        }

        $filtry = [];

        if (isset($_GET['kategorie'])) {
            $kategorie = [];
            foreach ($_GET['kategorie'] as $kat) {
                $kategorie[] = "'" . $kat . "'";
            }
            if (count($kategorie) > 0) {
                $filtry[] = "kategoria IN (" . implode(",", $kategorie) . ")";
            }
        }


        if (isset($_GET['dlugosc'])) {
            $dlugi = [];
            foreach ($_GET['dlugosc'] as $zakres) {
                if ($zakres == "6-11") {
                    $dlugi[] = "(dlugosc_ostrza BETWEEN 6 AND 11)";
                }
                if ($zakres == "12-15") {
                    $dlugi[] = "(dlugosc_ostrza BETWEEN 12 AND 15)";
                }
                if ($zakres == "16-19") {
                    $dlugi[] = "(dlugosc_ostrza BETWEEN 16 AND 19)";
                }
                if ($zakres == "20-24") {
                    $dlugi[] = "(dlugosc_ostrza BETWEEN 20 AND 24)";
                }
                if ($zakres == "27+") {
                    $dlugi[] = "(dlugosc_ostrza >= 27)";
                }
            }
            if (count($dlugi) > 0) {
                $filtry[] = "(" . implode(" OR ", $dlugi) . ")";
            }
        }

        if (!empty($_GET['min']) && !empty($_GET['max'])) {
            $min = $_GET['min'];
            $max = $_GET['max'];
            $filtry[] = "(cena BETWEEN $min AND $max)";
        }
        elseif (!empty($_GET['min'])) {
            $min = $_GET['min'];
            $filtry[] = "(cena >= $min)";

        }
        elseif (!empty($_GET['max'])) {
            $max = $_GET['max'];
            $filtry[] = "(cena <= $max)";
        }



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
        <a href="index.php">Strona Główna</a> <p> > </p> <a href="produkty.php">Produkty</a>
    </div>

    <div class="kontener-calosc">

        <div class="left-side">
            <form method="get" id="filterForm">
                <h2>KATEGORIE</h2>
                <ul>
                    <li><label>
                            <input type="checkbox" name="kategorie[]" value="TAKTYCZNE"   <?php
                            if (isset($_GET['kategorie']) && in_array('TAKTYCZNE', $_GET['kategorie'])) {
                                echo 'checked';
                            }
                            ?>>
                            TAKTYCZNE
                        </label></li>
                    <li><label><input type="checkbox" name="kategorie[]" value="MYŚLIWSKIE"   <?php
                            if (isset($_GET['kategorie']) && in_array('MYŚLIWSKIE', $_GET['kategorie'])) {
                                echo 'checked';
                            }
                            ?>> MYŚLIWSKIE</label></li>
                    <li><label><input type="checkbox" name="kategorie[]" value="SURVIVAL"   <?php
                            if (isset($_GET['kategorie']) && in_array('SURVIVAL', $_GET['kategorie'])) {
                                echo 'checked';
                            }
                            ?>> SURVIVAL</label></li>
                    <li><label><input type="checkbox" name="kategorie[]" value="CODZIENNE"   <?php
                            if (isset($_GET['kategorie']) && in_array('CODZIENNE', $_GET['kategorie'])) {
                                echo 'checked';
                            }
                            ?>> CODZIENNE</label></li>
                    <li><label><input type="checkbox" name="kategorie[]" value="RATOWNICZE"   <?php
                            if (isset($_GET['kategorie']) && in_array('RATOWNICZE', $_GET['kategorie'])) {
                                echo 'checked';
                            }
                            ?>> RATOWNICZE</label></li>
                    <li><label><input type="checkbox" name="kategorie[]" value="EKSKLUZYWNE"   <?php
                            if (isset($_GET['kategorie']) && in_array('EKSKLUZYWNE', $_GET['kategorie'])) {
                                echo 'checked';
                            }
                            ?>> EKSKLUZYWNE</label></li>
                </ul>

                <h2>DŁUGOŚĆ</h2>
                <ul>
                    <li><label><input type="checkbox" name="dlugosc[]" value="6-11"  <?php
                            if (isset($_GET['dlugosc']) && in_array('6-11', $_GET['dlugosc'])) {
                                echo 'checked';
                            }
                            ?>> 6 - 11 CM</label></li>
                    <li><label><input type="checkbox" name="dlugosc[]" value="12-15" <?php
                            if (isset($_GET['dlugosc']) && in_array('12-15', $_GET['dlugosc'])) {
                                echo 'checked';
                            }
                            ?>> 12 - 15 CM</label></li>
                    <li><label><input type="checkbox" name="dlugosc[]" value="16-19" <?php
                            if (isset($_GET['dlugosc']) && in_array('16-19', $_GET['dlugosc'])) {
                                echo 'checked';
                            }
                            ?>> 16 - 19 CM</label></li>
                    <li><label><input type="checkbox" name="dlugosc[]" value="20-24"  <?php
                            if (isset($_GET['dlugosc']) && in_array('20-24', $_GET['dlugosc'])) {
                                echo 'checked';
                            }
                            ?>> 20 - 24 CM</label></li>
                    <li><label><input type="checkbox" name="dlugosc[]" value="27+" <?php
                            if (isset($_GET['dlugosc']) && in_array('27+', $_GET['dlugosc'])) {
                                echo 'checked';
                            }
                            ?>> 27 CM +</label></li>
                </ul>

                <h2>FILTRUJ WEDŁUG CENY</h2>
                <div class="widelki">
                    <input type="text" name="min" id="min" placeholder="min"
                        <?php
                        if (isset($_GET['min'])) {
                            echo 'value="' . $_GET['min'] . '"';
                        } else {
                            echo 'value=""';
                        }
                        ?>
                    >
                    <p> zł - </p>
                    <input type="text" name="max" id="max" placeholder="max"
                        <?php
                        if (isset($_GET['max'])) {
                            echo 'value="' . $_GET['max'] . '"';
                        } else {
                            echo 'value=""';
                        }
                        ?>
                    >
                </div>
                <button class="CJ" type="submit">FILTRUJ WYNIKI</button>
                <button class="CJ" type="button" onclick="window.location.href='produkty.php';">RESETUJ FILTRY</button>
            </form>
        </div>



        <div class="right-side">

            <h2>PRODUKTY MARKI SEKIRYU</h2>
            <div class="selekcja">
            <p>Sortowanie</p>

                <form id="sortForm" method="get">
                    <select name="sort" id="selection" onchange="document.getElementById('sortForm').submit();">

                        <option value="ascending-letters" <?php if($sort == "ascending-letters") echo "selected"; ?>>A - Z</option>
                        <option value="descending-letters" <?php if($sort == "descending-letters") echo "selected"; ?>>Z - A</option>
                        <option value="ascending-price" <?php if($sort == "ascending-price") echo "selected"; ?>>Cena rosnąco</option>
                        <option value="descending-price" <?php if($sort == "descending-price") echo "selected"; ?>>Cena malejąco</option>

                    </select>
                </form>

            </div>

            <div class="produkty-container">

                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'noze');
                $sql = "SELECT * FROM produkty";

                if (count($filtry) > 0) {
                    $sql .= " WHERE " . implode(" AND ", $filtry);
                }

                $sql .= " ORDER BY $orderBy LIMIT 12";

                $wynik = mysqli_query($conn, $sql);

                if ($wynik && mysqli_num_rows($wynik) > 0) {
                    while ($row = mysqli_fetch_assoc($wynik)) {
                        $imgSrc = $row['nazwa_zdjecia'];
                        $nazwa = $row['nazwa'];
                        $cena = $row['cena'];
                        $oldCena = $cena + 150;
                        $id = $row['id'];
                        echo
                            '<div class="produkt">' .
                            '<img src="' . $imgSrc . '" alt="zdjęcie noża">' .
                            '<p>' . $nazwa . '</p>' .
                            '<div class="old-price">' .
                            '<span>' . $oldCena . ' zł</span>' .
                            '<img src="images/icons/ifoczka.png" alt="info">' .
                            '</div>' .
                            '<div class="new-price">' .
                            '<p>' . $cena . ' zł</p>' .
                            '</div>' .
                            '<form class="zydon" method="post" action="">' .
                            '<input type="hidden" name="product_id" value="' . $id . '">' .
                            '<button type="submit" class="kill-the-juice">Zobacz więcej</button>' .
                            '</form>' .
                            '</div>';
                    }
                }
                else {
                    echo 'Brak produktów o podanych kryteriach';
                }

                ?>

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

    </body>
    </html>
