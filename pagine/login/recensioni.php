<?php
	session_start();
	
	require('../../data/connessione_database.php');

    // error_reporting(E_ALL ^ E_WARNING); 

    if (!isset($_SESSION['username'])) {
        header('location: ../../home.php');
    }
    
    $username = $_SESSION["username"];
	
	if (isset($_POST["testo"])){
		$testo = $_POST["testo"];
	}
	else {
		$testo = "";
	}

    if (isset($_POST["titolo"])){
		$titolo = $_POST["titolo"];
	}
	else {
		$titolo = "";
	}

?>

<!DOCTYPE html>
<html lang="it">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recensioni</title>

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
                <a href="../../home.php">
                    <div class="elenco">HOME</div>
                </a>
            </li>
            <li class="has-children">
                <a href="../shop.php">
                    <div class="elenco">SHOP</div>
                </a>
                <ul class="sub-menu">
                    <li><a href="../shop.php #labbra">labbra</a></li>
                    <li><a href="../shop.php #occhi">occhi</a></li>
                    <li><a href="../shop.php #viso">viso</a></li>
                </ul>
            </li>
            <li>
                <a href="../assistenza.php">
                    <div class="elenco">ASSISTENZA</div>
                </a>
            </li>
        </ul>

        

    </div>

    <!-- Jquery - FORM CHE SCENDE -->
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

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
			<table class="form_accedi" style="margin-top: 100px;">
				<tr>
					<td>Titolo:</td> <td><input class="grandezzainput" type="text" name="titolo" required></td>
				</tr><br>
				<tr>
					<td>Testo:</td> <td><textarea class="grandezzainput" type="bigtext" name="testo" required></textarea></td>
				</tr>
            </table>

			<br><br><p><input class="grandezzainput" type="submit" value="INVIA"></p>
		</form>

        <?php
            if(isset($_POST["titolo"]) and isset($_POST["testo"])) {
                if ($_POST["titolo"] == "" or $_POST["testo"] == "") {
                    echo "titolo e testo non possono essere vuoti!";
                } else {
                    $conn = new mysqli("localhost", "root", "", "negozio_gbg");
                    if($conn->connect_error){
                        die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
                    }

                    $myquery = "SELECT titolo 
						    FROM recensione
						    WHERE titolo='" . $_POST["titolo"] . "'";

                    $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
                    if ($ris->num_rows > 0) {
                        echo "Questo titolo è già stato usato";
                    } else {

                        $myquery = "INSERT INTO recensione (username, titolo, testo)
                                    VALUES ('$username', '$titolo', '$testo')";

                        if ($conn->query($myquery) === true) {
                            // session_start();
                            $_SESSION["username"]=$username;
                            
						    $conn->close();

                            // echo "Recensione pubblicata con successo!";
                            echo "<table>
                                    <td> ". $username ." <br> ". $titolo ." <br> ". $testo ." </td>";

                        } else {
                            echo "Non è stato possibile pubblicare la recensione per il seguente motivo: " . $conn->error;
                        }
                    }
                }
            }

            // echo $username and  $titolo and $testo;
            $myquery = "SELECT * 
            FROM recensione
            WHERE titolo!='" . $_POST["titolo"] . "'";

            // $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
                    while ($ris->num_rows > 0) {
                        foreach ($ris as $riga) {
                            echo "<table>
                            <td> ". $username ." <br> ". $titolo ." <br> ". $testo ." </td>";
                        }
                    }
            ?>