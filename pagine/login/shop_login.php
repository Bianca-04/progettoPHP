<?php
    session_start();

    require('../../data/connessione_database.php');

    if (!isset($_SESSION['username'])) {
        header('location: ../account.php');
    }

    // if( $_SESSION["tipologia"]!="utenti"){ //controlla che siano utenti altrimenti da il logout
    //     header('location: logout.php');
    // }

    $username = $_SESSION['username'];
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    // if($_SERVER["REQUEST METHOD"] == "POST"){

    // }

    if (isset($_POST["nomep"])) $nomep = $_POST["nomep"];
    else $nomep = "";
    if (isset($_POST["prezzo"])) $prezzo = $_POST["prezzo"];
    else $prezzo = "";
    if (isset($_POST["quantita"])) $quantita = $_POST["quantita"];
    else $quantita = "";
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">

    <script src="script.js"></script>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="../../immagini/logo.png" alt="immagine non disponibile">
        </div>
        <ul class="menu">
            <li>
                <a href="account.php">
                    <div class="elenco">HOME</div>
                </a>
            </li>
            <li class="has-children">
                <a href="shop_login.php">
                    <div class="elenco">SHOP</div>
                </a>
                <ul class="sub-menu">
                    <li><a href="shop_login.php #labbra">labbra</a></li>
                    <li><a href="shop_login.php #occhi">occhi</a></li>
                    <li><a href="shop_login.php #viso">viso</a></li>
                </ul>
            </li>
            <li>
                <a href="assistenza_login.php">
                    <div class="elenco">ASSISTENZA</div>
                </a>
            </li>
        </ul>

        <div class="cta">
            <a href="../logout.php" class="buttona">Logout</a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            /* Open Panel */
            $("..hamburger").on('click', function() {
                $("..menu").toggleClass("menu--open");
            });

        });
    </script>

    <div class="spessore-menu"></div>

    <a name="viso"></a>
    <div class="panel-blue mt-3">
        <div class="grid">
            <div class="col panel-blue__dots reveal">
                <div class="dot" style="background: url(../../immagini/cipria.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>CIPRIA <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantita">
                                            <option type="number">1</option>
                                            <option type="number">2</option>
                                            <option type="number">3</option>
                                            <option type="number">4</option>
                                            <option type="number">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>

                        <?php
                            $conn = new mysqli("localhost", "root", "", "negozio_gbg");
                            if($conn->connect_error){
                                die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
                            }

                            $nomep = "cipria";
                            
                            $sql = "SELECT prezzo
								FROM prodotto
								WHERE prodotto.nomep = '$nomep'";
                            $ris=$conn->query($sql);
                            $prezzo = $ris->fetch_assoc();
                            $prezzo = $prezzo['prezzo'];
                            $prezzo = $quantita*$prezzo;

                            $myquery = "INSERT INTO carrello (username, nomep, quantita, prezzo)
                            VALUES ('$username', '$nomep', '$quantita', '$prezzo')";

                            $conn->query($myquery);
                        ?>
                        

                    </span>
                </div>
                <div class="dot" style="background: url(../../immagini/fondotinta.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>FONDOTINTA <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantità">
                                            <option value="art1">1</option>
                                            <option value="art2">2</option>
                                            <option value="art3">3</option>
                                            <option value="art3">4</option>
                                            <option value="art3">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>
                    </span>
                </div>
                <div class="dot" style="background: url(../../immagini/correttore.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>CORRETTORE <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantità">
                                            <option value="art1">1</option>
                                            <option value="art2">2</option>
                                            <option value="art3">3</option>
                                            <option value="art3">4</option>
                                            <option value="art3">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>
                    </span>
                </div>
                <div class="dot" style="background: url(../../immagini/conturing.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>CONTURING <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantità">
                                            <option value="art1">1</option>
                                            <option value="art2">2</option>
                                            <option value="art3">3</option>
                                            <option value="art3">4</option>
                                            <option value="art3">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>
                    </span>
                </div>
            </div>
            <div class="col panel-blue__text reveal">
                <div class="grid">
                    <div class="colreveal">
                        <h3 class="big-text tw">VISO</h3>
                    </div>
                    <div class="colreveal">
                        <p class="mt-sma-0">Un bel trucco inizia senza dubbio anche da una bella base viso e da un pelle il più possibile priva di imperfezioni come rossori o occhiaie.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="spazio"></div>

    <a name="labbra"></a>
    <div class="panel-blue mt-3">
        <div class="grid">
            <div class="col panel-blue__dots reveal">
                <div class="dot" style="background: url(../../immagini/rossetto.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>ROSSETTO <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantità">
                                            <option value="art1">1</option>
                                            <option value="art2">2</option>
                                            <option value="art3">3</option>
                                            <option value="art3">4</option>
                                            <option value="art3">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>
                    </span>
                </div>
                <div class="dot" style="background: url(../../immagini/lucidalabbra.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>LUCIDALABBRA <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantità">
                                            <option value="art1">1</option>
                                            <option value="art2">2</option>
                                            <option value="art3">3</option>
                                            <option value="art3">4</option>
                                            <option value="art3">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>
                    </span>
                </div>
                <div class="dot" style="background: url(../../immagini/tintalabbra.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>TINTALABBRA <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantità">
                                            <option value="art1">1</option>
                                            <option value="art2">2</option>
                                            <option value="art3">3</option>
                                            <option value="art3">4</option>
                                            <option value="art3">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>
                    </span>
                </div>
                <div class="dot" style="background: url(../../immagini/burrocacao.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>BURROCACAO <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantità">
                                            <option value="art1">1</option>
                                            <option value="art2">2</option>
                                            <option value="art3">3</option>
                                            <option value="art3">4</option>
                                            <option value="art3">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>
                    </span>
                </div>
            </div>
            <div class="col panel-blue__text reveal">
                <div class="grid">
                    <div class="colreveal">
                        <h3 class="big-text tw">LABBRA</h3>
                    </div>
                    <div class="colreveal">
                        <p class="mt-sma-0">Labbra secche e screpolate? Un buon trattamento labbra è indispensabile tanto quanto la protezione della tua pelle!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="spazio"></div>

    <a name="occhi"></a>
    <div class="panel-blue mt-3">
        <div class="grid">
            <div class="col panel-blue__dots reveal">
                <div class="dot" style="background: url(../../immagini/mascara.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>MASCARA <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantità">
                                            <option value="art1">1</option>
                                            <option value="art2">2</option>
                                            <option value="art3">3</option>
                                            <option value="art3">4</option>
                                            <option value="art3">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>
                    </span>
                </div>
                <div class="dot" style="background: url(../../immagini/ombretto.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>OMBRETTO <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantità">
                                            <option value="art1">1</option>
                                            <option value="art2">2</option>
                                            <option value="art3">3</option>
                                            <option value="art3">4</option>
                                            <option value="art3">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>
                    </span>
                </div>
                <div class="dot" style="background: url(../../immagini/eyeliner.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>EYELINER <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantità">
                                            <option value="art1">1</option>
                                            <option value="art2">2</option>
                                            <option value="art3">3</option>
                                            <option value="art3">4</option>
                                            <option value="art3">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>
                    </span>
                </div>
                <div class="dot" style="background: url(../../immagini/matita.jpg) no-repeat center center; background-size: cover;">
                    <span class="tooltip"><br>MATITA <br><br>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                            <table>
                                <tr>
                                    <td class="text-quantita"> Quantità:
                                    <td><select name="quantità">
                                            <option value="art1">1</option>
                                            <option value="art2">2</option>
                                            <option value="art3">3</option>
                                            <option value="art3">4</option>
                                            <option value="art3">5</option>
                                        </select>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p><input type="submit" value="aggiungi al carrello"></p>
                        </form>
                    </span>
                </div>
            </div>
            <div class="col panel-blue__text reveal">
                <div class="grid">
                    <div class="colreveal">
                        <h3 class="big-text tw">OCCHI</h3>
                    </div>
                    <div class="colreveal">
                        <p class="mt-sma-0">La formulazione dei nuovi prodotti è arricchita con vitamina E ed estratti di camomilla per offrire alla palpebra un comfort mai visto prima.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--sistemare questo-->
    <div class="spazio"></div>
    <div class="join reveal">
        <p><a href="../pagine/accedi.php" class="join"># Join the IG Makeup Community</a></p>
    </div>
    <div class="spazio"></div>

    <div class="footer">
        <ul class="social">
            <li><a href="../pagine/iscriviti.php">Iscriviti Ora</a></li>
            <li><a href="../pagine/shop.php">Rivenditori</a></li>
            <li><a href="../pagine/contatti.php">Contatti</a></li>
        </ul>
        <ul class="social">
            <li><a href="https://www.instagram.com/">Instagram</a></li>
            <li><a href="https://it-it.facebook.com/login/web/">Facebook</a></li>
            <li><a href="https://www.pinterest.it/">Pinterest</a></li>
        </ul>
    </div>
    <script>
        $(document).ready(function() {
            /* Open Panel */
            $(".hamburger").on('click', function() {
                $(".menu").toggleClass("menu--open");
            });

        });
        ScrollReveal().reveal('.reveal', {
            distance: '100px',
            duration: 1500,
            easing: 'cubic-bezier(.215, .61, .355, 1)',
            interval: 400,
        });

        ScrollReveal().reveal('.zoom', {
            duration: 1500,
            easing: 'cubic-bezier(.215, .61, .355, 1)',
            interval: 200,
            scale: 0.65,
            mobile: false,
        });
    </script>
</body>

</html>