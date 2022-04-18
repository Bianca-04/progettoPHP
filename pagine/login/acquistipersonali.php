<?php
	session_start();
	//echo session_id();

	require('../../data/connessione_database.php');

	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}
	
	$username = $_SESSION["username"];

    if (isset($_POST['prodotto'])) $prodotto = $_POST["prodotto"];
    else $prodotto = "";
    if (isset($_POST['elimina'])) $elimina = $_POST["elimina"];
    else $elimina = "";
    if (isset($_POST['quantita'])) $quantita = $_POST["quantita"];
    else $quantita = 0;

    $conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acquisti personali</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
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
                    <li><a  href="shop_login.php #labbra">labbra</a></li>
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

        <div class="iconacarrello">
        <a href="carrello.php"><img src="../../immagini/iconacarrello.png" alt="immagine non disponibile"></a>
        </div>

        <div class="cta">
            <a href="../../pagine/logout.php" class="buttona">Logout</a>
        </div>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <br<br><h3 class="big-text" style="margin-top: 100px;">ACQUISTI FATTI</h3>
	
    <?php
        $sql = "SELECT DISTINCT compra.data
                FROM compra
                WHERE compra.username='$username'";
        $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
        $data = $ris -> fetch_assoc();
        $data = $data['data'];
        if ($ris->num_rows == 0) {
            echo "<p style='text-align:center'>Non hai ancora acquistato niente";
        }
	?>
			<ol>
				<?php
                    foreach($ris as $riga){
                        echo '<div class="prodottisel">
                        <br>Acquisto eseguito in data: ' .$riga['data'].'<br><br>
                        <table class = "pcarrello">';

                        $sql = "SELECT compra.nomep, compra.quantita, compra.prezzo
                        FROM compra
                        WHERE compra.username='$username' AND compra.data = '$riga[data]'";
                        $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                        if ($ris->num_rows == 0) {
                            echo "<p style='text-align:center'>Non hai ancora acquistato niente";
                        }
                        foreach($ris as $riga){
                            $prodotto = $riga['nomep'];
                            $elimina = $riga['nomep'];
                            $prezzo = $riga['prezzo'];
                            echo'
                                <tr>
                                    <td> 
                                        Nome: '.$riga["nomep"].' <br><br>
                                    </td>
                                    <td>
                                        Quantità: '.$riga["quantita"].'
                                    </td>
                                    <td>
                                        Prezzo: '.$riga["prezzo"].' €
                                    </td>';
                        }
                        echo '</table><br></div>';
                    }
				?>
			</ol>

    
</body>
</html>