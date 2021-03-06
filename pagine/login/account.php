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
            <li>
                <a href="carrello.php">
                    <div class="iconacarrello"><img src="../../immagini/iconacarrello.png" alt="immagine non disponibile"></div>
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

    <img src="../../immagini/sfondo_account" alt="L'immagine non ?? disponibile">
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
        <img src="../../immagini/sfondo_account.jpeg" alt="L'immagine non ?? disponibile">
    </div>

    <div class="spazio"></div>
    <div class="tabellaaccount">
				<div class="container">
					<figure><img src="../../immagini/dati.jpeg"><figcaption><div class="figurecaption"><p><b><a href="datipersonali.php">I TUOI DATI</a></b></p></div></figcaption></figure>

                </div>
                <div class="container">
					<figure><img src="../../immagini/carrello.jpeg"><figcaption><div class="figurecaption"><p><b><a href="carrello.php">CARRELLO</a></b></p></div></figcaption></figure>

                </div>
                <div class="container">
					<figure><img src="../../immagini/acquisti.jpeg"><figcaption><div class="figurecaption"><p><b><a href="acquistipersonali.php">I TUOI ACQUISTI</a></b></p></div></figcaption></figure>

                </div>
				
    </div>
    <div class="spazio"></div>
    <br> 

    <?php 
		include('footer.php')
	?>

</body>
</html>