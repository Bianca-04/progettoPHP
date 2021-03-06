<?php
	session_start();
	
	require('../data/connessione_database.php');
    echo session_id();

    error_reporting(E_ALL ^ E_WARNING); 

	// if(isset($_SESSION['username'])){
	// 	header('location: pagine/home.php');
	// }

	if(isset($_POST["username"])){
		$username = $_POST["username"];
	}
	else{
		$username = "";
	}
	
	if (isset($_POST["password"])){
		$password = $_POST["password"];
	}
	else {
		$password = "";
	}

?>

<!DOCTYPE html>
<html lang="it">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accedi</title>

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
                <ul class="sub-menu">
                    <li><a href="shop.php #labbra">labbra</a></li>
                    <li><a href="shop.php #occhi">occhi</a></li>
                    <li><a href="shop.php #viso">viso</a></li>
                </ul>
            </li>
            <li>
                <a href="../pagine/assistenza.php">
                    <div class="elenco">ASSISTENZA</div>
                </a>
            </li>
            
        </ul>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
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

<!-- VIDEO SFONDO -->
    <div class="VideoAccedi">

    <div class="VideoAccedi__content reveal">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
			<table class="form_accedi" style="margin-top: 10px;">
				<tr>
					<td>Username:</td> <td><input class="grandezzainput" type="text" name="username" value="<?php echo $username; ?>" required></td>
				</tr><br>
				<tr>
					<td>Password:</td> <td><input class="grandezzainput" type="password" name="password" required></td>
				</tr>
            </table>

			<br><br><p><input class="grandezzainput" type="submit" value="ACCEDI"></p>
		</form>
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if( empty($_POST["username"]) or empty($_POST["password"])) {
					echo "<p>Completare tutti i campi con *</p>"; //METTERE O MAIL O TELEFONO, CHE NON DEVONO GIA ESISTERE
				} else {
					$conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
					if($conn->connect_error){
						die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
					}
					
					//sistemare questo from
					$myquery = "SELECT username, password 
								FROM utente
								WHERE username='$username'
									AND password='$password'";
                    echo 

					$ris = $conn->query($myquery) or die("<p>Query fallita! ".$conn->error."</p>");

					if($ris->num_rows == 0){
						echo "<p>Utente non trovato o password errata</p>";
						$conn->close();
					} 
					else {
						$_SESSION["username"]=$username;
												
						$conn->close();
						header("location: ../pagine/login/account.php");

					}
				}
			}
			?>
            
            <h3 class="med-text"  style="margin-top: 20px;">Non hai ancora un account?<br><br><a href="iscriviti.php" style="color:antiquewhite">ISCRIVITI ORA!</a> </h3>
            
    </div>
        <video autoplay muted loop id="VideoIscriviti">
            <source src="../immagini/VideoAccedi.mp4" type="video/mp4">
          </video>
    </div>


</body>

</html>