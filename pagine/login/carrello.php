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
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "SELECT prezzo
                FROM prodotto
                WHERE nomep = '$prodotto'";
        $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
        
        $riga = $ris->fetch_assoc();
        $prezzo = $riga['prezzo'];
        echo "ciao".$prezzo;
        
        $sql = "UPDATE carrello
                SET carrello.quantita = '.$quantita.', carrello.prezzo = '".$quantita * $prezzo."'
                WHERE nomep = '".$prodotto."' AND carrello.username='$username'";
        $conn->query($sql) or die("<p>Query fallita!</p>");

        $sql = "DELETE carrello.*
                FROM carrello
                WHERE nomep = '".$elimina."' AND carrello.username='$username'"; 
        $conn->query($sql) or die("<p>Query fallita!</p>");
        
        if($compra = $_POST["compra"]){
            header('Refresh: 0; URL=compra.php');
        }
    }

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

    <br<br><h3 class="big-text" style="margin-top: 100px;">I PRODOTTI NEL <br> TUO CARRELLO</h3>

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
					foreach($ris as $riga){
                        $prodotto = $riga['nomep'];
                        $elimina = $riga['nomep'];
                        $prezzo = $riga['prezzo'];
						echo'
							<tr>
								<td> 
									Nome: '.$riga["nomep"].' <br><br>
								</td>
                                <td colspan = 3>
                                    Quantità:
                                    
                                    <td><form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                                    <input class = "quantitacarr" type="number" name="quantita" value="'.$riga["quantita"].'">
                                    <input class="hidden" name="prodotto" value='.$prodotto.' ></input><input type="submit" value="Modifica"></p>
                                    </form>
                                </td>
                                <td>
                                    Prezzo: '.$riga["prezzo"].' €
                                </td>
                                <td class= "eliminacarr">                                    
                                    <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                                    <input class="hidden" name="elimina" value='.$elimina.' ></input><input type="submit" value="Elimina"></p>
                                    </form>
                                </td>
							</tr>';
					}
                    echo '</table>
                    
                    <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                        <input class = "compracarr" type="submit" name= "compra" value="Compra"></p>
                    </form>';
				?>
			</ol>
		</div>
			


</body>
</html>