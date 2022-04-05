<?php
	session_start();

	require_once('../../data/connessione_database.php');

	// if(!isset($_SESSION['username'])){
	// 	header('location: ../index.php');
	// }
	$username = $_SESSION["username"];
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina personale</title>

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
                <a href="home_login.php">
                    <div class="elenco">HOME</div>
                </a>
            </li>
            <li class="has-children">
                <a href="pagine/shop.php">
                    <div class="elenco">SHOP</div>
                </a>
                <ul class="sub-menu">
                    <li><a  href="pagine/shop.php #labbra">labbra</a></li>
                    <li><a href="pagine/shop.php #occhi">occhi</a></li>
                    <li><a href="pagine/shop.php #viso">viso</a></li>
                </ul>
            </li>
            <li>
                <a href="pagine/assistenza.php">
                    <div class="elenco">ASSISTENZA</div>
                </a>
            </li>
        </ul>

        <div class="cta">
            <a href="../../pagine/logout.php" class="buttona">Logout</a>
        </div>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <img src="../../immagini/sfondo_account" alt="L'immagine non è disponibile">
    <div class="fotoaccount">
        <div>
            <h3 class="big-text reveal">BENVENUTO!</h3>
            
            <?php
			$conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
			if($conn->connect_error){
				die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
			}
			
			$sql = "SELECT username, nome, cognome 
					FROM utente
					WHERE username='$username'";
			//echo $sql;
			$ris = $conn->query($sql) or die("<p>Query fallita!</p>");
			foreach($ris as $riga){ 
			echo "<p>".$riga["nome"]." ".$riga["cognome"]."</p>";}
		    ?>
        </div>
        <img src="../../immagini/sfondo_account.jpeg" alt="L'immagine non è disponibile">
    </div>
</body>
</html>