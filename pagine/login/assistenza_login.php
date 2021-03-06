<?php
    session_start();
    error_reporting(E_ALL ^ E_WARNING);
    require('../../data/connessione_database.php');

    if(!isset($_SESSION['username'])){
        header('location: ../account.php');
    }

    $username = $_SESSION['username'];
    $conn = new mysqli($db_servername,$db_username,$db_password,$db_name);

    if (isset($_POST["cerca"])) $cerca = $_POST["cerca"];
    else $cerca = "";
    if (isset($_POST["trovato"])) $trovato = $_POST["trovato"];
    else $trovato = "";
    if (isset($_POST["input"])) $input = $_POST["input"];
    else $input = "";

    if($conn->connect_error){
        die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistenza</title>

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
            <li>
                <a href="carrello.php">
                    <div class="iconacarrello"><img src="../../immagini/iconacarrello.png" alt="immagine non disponibile"></div>
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

<div class="videoassistenza">
        <div class="videoassistenza_content">
            <h3 class="big-text reveal">CIAO, HAI BISOGNO DI AIUTO?</h3>
            <div class="ricerca reveal">
                <ul><form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "post">
                    <input type="text" name="cerca" placeholder="cosa cerchi?"></input></ul>
                    <input type="submit" name="input" value="CERCA"></input>
                    </form>
            </div>
        </div>
        <?php
            $sql = "SELECT nomep
                    FROM prodotto
                    WHERE nomep = '$cerca'";
            $ris=$conn->query($sql);
            $trovato = $ris->fetch_assoc();
            if($trovato['nomep'] != $cerca){
                echo "<div class='asstesto reveal'>
                    Il prodotto cercato non ?? presente nel nostro negozio 
                    </div>";
            } else $trovato = $trovato['nomep'];
        
                    
            $sql = "SELECT categoria
                    FROM prodotto
                    WHERE nomep = '$trovato'";
            $ris=$conn->query($sql);
            $categoria = $ris->fetch_assoc();
            $categoria = $categoria['categoria'];
        
            if("$categoria" == "labbra" AND $input = $_POST['input']){
                header('Refresh: 0 URL=shop_login.php #labbra');
            }
        
            if("$categoria" == "occhi" AND $input = $_POST['input']){
                header('Refresh: 0 URL=shop_login.php #occhi');
            }
        
            if("$categoria" == "viso" AND $input = $_POST['input']){
                header('Refresh: 0 URL=shop_login.php #viso');
            }  
        ?>
        <video autoplay muted loop id="videoassistenza">
            <source src="../../immagini/videoassistenza.mp4" type="video/mp4">
          </video>
    </div>

     <!--sistemare questo-->
    <div class="spazio"></div>
    <div class="spessore-assistenza"></div>
    <div class="servizi  reveal">
        <a href="account.php"><img src="../../immagini/iconaaccount.png" alt=""></a>
        <a href="recensioni.php"><img src="../../immagini/recensioni.png" alt=""></a>
        <a href="shop_login.php"><img src="../../immagini/ordini.png" alt=""></a>
        <a href="carrello.php"><img src="../../immagini/pagamento.png" alt=""></a>
    </div>
    <div class="spazio"></div>
    
    <br>
    <?php 
		include('footer.php')
	?>

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