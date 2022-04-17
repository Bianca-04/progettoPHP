<?php
session_start();
//echo session_id();

require('../../data/connessione_database.php');

if (!isset($_SESSION['username'])) {
    header('location: ../../home.php');
}

$username = $_SESSION["username"];

if (isset($_POST["prodotto"])) $prodotto = $_POST["prodotto"];
else $prodotto = "";
if (isset($_POST["prosegui"])) $prosegui = $_POST["prosegui"];
else $prosegui = "";
if (isset($_POST["vindirizzo"]))  $vindirizzo = $_POST["vindirizzo"];
else $vindirizzo = "";

// if ($prosegui = $_POST["prosegui"]) {
//     header('URL=compra.php #indirizzo');
// }

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

$sql = "SELECT comune, via, civico
        FROM utente
        WHERE username = '" . $username . "' ";
$ris = $conn->query($sql) or die("<p>Query fallita</p>");
$indirizzo = $ris->fetch_assoc();
$comune = $indirizzo["comune"];
$via = $indirizzo["via"];
$civico = $indirizzo['civico'];


if ($subindirizzo = $_POST["subindirizzo"]) {
    $sql = "UPDATE utente
            SET comune = '" . $_POST["comune"] . "', 
                via = '" . $_POST["via"] . "', 
                civico = '" . $_POST["civico"] . "'
            WHERE username = '" . $username . "'";
    $conn->query($sql);

    $comune = $_POST["comune"];
    $via = $indirizzo["via"];
    $civico = $indirizzo['civico'];
}

$vindirizzo = false;
echo "ciao CIAO". "$vindirizzo";
?>


<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>

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

    <!-- APERTURA MENU -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            /* Open Panel */
            $("..hamburger").on('click', function() {
                $("..menu").toggleClass("menu--open");
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            /* Open Panel */
            $("..hamburger").on('click', function() {
                $("..menu").toggleClass("menu--open");
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

    <br<br>
        <h3 class="big-text" style="margin-top: 100px;">IL TUO ORDINE</h3>

        <div class="prodottisel">
            <?php
            $sql = "SELECT carrello.nomep, carrello.quantita, carrello.prezzo
                    FROM carrello
                    WHERE carrello.username='$username'";
            $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
            if ($ris->num_rows == 0) {
                echo "<p style='text-align:center'>Non hai aggiunto nessun prodotto";
            }
            ?>
            <ol>
                <?php
                echo '<table class = "pcarrello">';
                foreach ($ris as $riga) {
                    $prodotto = $riga['nomep'];
                    echo '
                        <tr>
                            <td> 
                                Nome: ' . $riga["nomep"] . ' <br><br>
                            </td>
                            <td>
                                Quantità: ' . $riga["quantita"] . '
                            </td>
                            <td>
                                Prezzo: ' . $riga["prezzo"] . ' €
                            </td>
                        </tr>';
                }
                echo '</table>
                    <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                    <input class = "compracarr" type="submit" name= "compra" value="PROSEGUI">
                </form>';

                ?>
            </ol>
        </div>

        <br<br>
            <h2 class="normal-text" style="margin-top: 100px;">CONFERMA IL TUO INDIRIZZO</h2><br><br>
            <?php
            if ($comune == "" or $via == "" or $civico == NULL or $civico == 0) {
                echo 'Inserisci a quale indirizzo sarà destinato il tuo ordine
                <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                        <table class="form_modificadati">
                            <tr>
                                <td>Comune:</td> <td><input type="text" class="input_datipersonali" name="comune" value="' . $comune . '" placeholder="' . $comune . '"></td>
                            </tr>
                            <tr>
                                <td>Via:</td> <td><input type="text" class="input_datipersonali" name="via" value="' . $via . '"></td>
                            </tr>
                            <tr>
                                <td>Civico:</td> <td><input type="number" class="input_datipersonali" name="civico" value="' . $civico . '"></td>
                            </tr>
                        </table><br>
                        <input type="submit" name= "subindirizzo" value="CONFERMA"></input>';
            } else {
                echo "<form  style='text-align: center' action=" . $_SERVER['PHP_SELF'] . " method='post'>
                    <table>
                        <td colspan='3'>
                            Vuoi che il tuo ordine venga inviato all indirizzo gia registrato?
                            Si <input type='radio' name='vindirizzo' value='Si'>
                            No <input type='radio' name='vindirizzo' value='No'>
                        </td>
                        </table>
                ";
                // mettere sta roba sopra al centro
                if($_POST["vindirizzo"] == 'No'){
                    echo "bella";
                } else {
                    echo "no";
                }
            }
            ?>


</html>


<!-- tolgo i form prezzo tot aggiunge 1 punto ogni 10 euro 
si possono usare i punti che si hanno -> 10 punti sconto del 20 % -> ti chiede se vuoi usarli 
volendo si mette il controllo dell indirizzo poi compra
mettere la data se riesco-->