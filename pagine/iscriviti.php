<?php
    if(isset($_POST["username"])) $username=$_POST["username"]; else $username="";
    if(isset($_POST["password"])) $password=$_POST["password"]; else $password="";
    if(isset($_POST["conferma"])) $conferma = $_POST["conferma"];  else $conferma = "";
    if(isset($_POST["nome"])) $nome = $_POST["nome"];  else $nome = "";
    if(isset($_POST["cognome"])) $cognome = $_POST["cognome"];  else $cognome = "";
    if(isset($_POST["email"])) $email = $_POST["email"];  else $email = "";
    if(isset($_POST["telefono"])) $telefono = $_POST["telefono"];  else $telefono = "";
    if(isset($_POST["comune"])) $comune = $_POST["comune"];  else $comune = "";
    if(isset($_POST["via"])) $via = $_POST["via"];  else $via = "";
    if(isset($_POST["civico"])) $civico = $_POST["civico"];  else $civico = "";

    error_reporting(E_ALL ^ E_WARNING); // metodo globale ^ significa tranne e funziona da qui in poi
    // include('footer.php');
    // @include('footerrr.php');  // con @ evito la generazione di warnings o errors da parte della funzione
?>


<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iscriviti</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">

    <script src="script.js"></script>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="../immagini/logo.png" alt="immagine non disponibile">
        </div>
        <ul class="menu">
            <li>
                <a href="../home.php">
                    <div class="elenco">HOME</div>
                </a>
            </li>
            <li class="has-children">
                <a href="../pagine/shop.php">
                    <div class="elenco">SHOP</div>
                </a>
            </li>
            <li>
                <a href="../pagine/assistenza.php">
                    <div class="elenco">ASSISTENZA</div>
                </a>
            </li>
        </ul>

        <div class="cta">
            <a href="../pagine/accedi.php" class="buttona">Accedi</a>
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

    <div class="VideoIscriviti">

        <div class="VideoIscriviti__content reveal">

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"> 
            <table class="form_iscriviti" id="tab_registrati">
                <tr>
                    <td>Username:</td>
                    <td><input class="registrati" type="text" name="username" <?php echo "value = '$username'" ?> required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input class="registrati" type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>Conferma password:</td>
                    <td><input class="registrati" type="password" name="conferma" required></td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td><input class="registrati" type="text" name="nome" <?php echo "value = '$nome'" ?> required></td>
                </tr>
                <tr>
                    <td>Cognome:</td>
                    <td><input type="text" class="registrati" name="cognome" <?php echo "value = '$cognome'" ?> required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" class="registrati" name="email" <?php echo "value = '$email'" ?>></td>
                </tr>
                <tr>
                    <td>Telefono:</td>
                    <td><input type="text" class="registrati" name="telefono" <?php echo "value = '$telefono'" ?>></td>
                </tr>
                <tr>
                    <td>Comune:</td>
                    <td><input type="text" class="registrati" name="comune" <?php echo "value = '$comune'" ?>></td>
                </tr>
                <tr>
                    <td>Via:</td>
                    <td><input type="text" class="registrati" name="via" <?php echo "value = '$via'" ?>></td>
                </tr>
                <tr>
                    <td>Civico:</td>
                    <td><input type="number" class="registrati" name="civico" <?php echo "value = '$civico'"?>> </td>
                </tr>
            </table><br>
            <p style="text-align: center">
                <input class="grandezzainput" type="submit" value="INVIA">
            </p>
        </form>

        <!-- CERCARE DI SPOSTARE QUELLO CHE STAMPA IN ALTO -->
        <p class="stampaphp">
            <?php
            if(isset($_POST["username"]) and isset($_POST["password"])) {
                if ($_POST["username"] == "" or $_POST["password"] == "") {
                    echo "username e password non possono essere vuoti!";
                } elseif ($_POST["password"] != $_POST["conferma"]){
                    echo "Le password inserite non corrispondono";
                } else {
                    $conn = new mysqli("localhost", "root", "", "negozio_gbg");
                    if($conn->connect_error){
                        die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
                    }

                    $myquery = "SELECT username 
						    FROM utente
						    WHERE username='" . $_POST["username"] . "'";

                    $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
                    if ($ris->num_rows > 0) {
                        echo "Questo username è già stato usato";
                    } else {

                        $myquery = "INSERT INTO utente (username, password, nome, cognome, email, telefono, comune, via, civico)
                                    VALUES ('$username', '$password', '$nome', '$cognome','$email','$telefono','$comune','$via', '$civico')";

                        if ($conn->query($myquery) === true) {
                            session_start();
                            $_SESSION["username"]=$username;
                            
						    $conn->close();

                            echo "Registrazione effettuata con successo!<br>sarai indirizzato al tuo account tra pochi secondi.";
                            header('Refresh: 1; URL=login/account.php'); //PERCHE NON SI REINDIRIZZA
                            // header('location: account.php'); //PERCHE NON SI REINDIRIZZA
                            echo "<p><a href='login/account.php'>entra</p>";

                        } else {
                            echo "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
                        }
                    }
                }
            }
            ?>
        </p>
    </div>

        <video autoplay muted loop id="VideoIscriviti">
            <source src="../immagini/VideoIscriviti.mp4" type="video/mp4">
          </video>
    </div>
    
</body>

</html>