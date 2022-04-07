<?php
	session_start();
	//echo session_id();

	require('../../data/connessione_database.php');

	if(!isset($_SESSION['username'])){
		header('location: ../index.php');
	}
	
	$username = $_SESSION["username"];
	//echo $username;

	// $conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
	// if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// 	$libri = isset($_POST['cod_libri']) ? $_POST['cod_libri'] : array();
	// 	foreach($libri as $libro) {
  	// 		//echo $libro . '<br/>';
  	// 		$sql = "UPDATE libri
  	// 				SET username_utente = '".$username."'
  	// 				WHERE cod_libro = '".$libro."'";
	// 		$conn->query($sql) or die("<p>Query fallita!</p>");
	// 	}
	// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />
    <title>Il tuo carrello</title>
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

    <br<br><h3 class="big-text" style="margin-top: 100px;">I PRODOTTI NEL TUO CARRELLO</h3>

    <div class="prodottisel">
			<h2>Libri presi in prestito</h2>
			<?php
				//qui usa una query per prendere i libri giusti
				$sql = "SELECT carrello.nomep, carrello.quantità 
						FROM carrello
                        --  JOIN libri ON utenti.username = libri.username_utente 
						-- 			JOIN autori ON libri.cod_autore = autori.cod_autore  
						WHERE carrello.username='$username'";
				$ris = $conn->query($sql) or die("<p>Query fallita!</p>");
				if ($ris->num_rows == 0) {
					echo "<p style='text-align:center'>Nessuno";
				}
			?>
			<ol>
				<?php
					foreach($ris as $riga){
						echo "
							<li>";
								echo $riga["titolo"]." - ".$riga["nome"]." ".$riga["cognome"]."
							</li>";
						}
				?>		
			</ol>
		</div>
			


</body>
</html>