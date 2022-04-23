<?php
	session_start();
	//echo session_id();

	require('../../data/connessione_database.php');

	if(!isset($_SESSION['username'])){
		header('location: ../home.php');
	}

	$username = $_SESSION["username"];
	//echo $username;

	$strmodifica = "MODIFICA";
	$strconferma = "CONFERMA";

	$conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
	$modifica = false;
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pulsante_modifica"])) {
		if($_POST["pulsante_modifica"] == $strmodifica){
			$modifica = true;
		} else {
			$modifica = false;
		}

		if ($modifica == false){
			$sql = "UPDATE utente
					SET password = '".$_POST["password"]."', 
						nome = '".$_POST["nome"]."', 
						cognome = '".$_POST["cognome"]."', 
						email = '".$_POST["email"]."', 
						telefono = '".$_POST["telefono"]."', 
						comune = '".$_POST["comune"]."', 
						via = '".$_POST["via"]."', 
                        civico = '".$_POST["civico"]."'
					WHERE username = '".$username."'";
			if($conn->query($sql) === true) {
				//echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dati personali</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
</head>
<body>
<div class="header">     <div class="logo">
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

		<div class="iconacarrello">
        <a href="carrello.php"><img src="../../immagini/iconacarrello.png" alt="immagine non disponibile"></a>
        </div>

        <div class="cta">
            <a href="../logout.php" class="buttona">Logout</a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <br<br><h3 class="big-text" style="margin-top: 100px;">I TUOI DATI</h3>

	<div class="contenuto">

		<?php
			$sql = "SELECT username, password, nome, cognome, email, telefono, comune, via, civico 
				FROM utente
				WHERE username='".$username."'";
			
			$ris = $conn->query($sql) or die("<p>Query fallita!</p>");
			$row = $ris->fetch_assoc();
		?>

		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
			<table class="form_modificadati" id="tab_modificadati">
				<tr>
					<td>Username:</td> <td><input class="input_datipersonali" type="text" name="username" value="<?php echo $row["username"]; ?>" disabled="disabled"></td>
				</tr>
				<tr>
					<td>Password:</td> <td><input class="input_datipersonali" type="text" name="password" value="<?php echo $row["password"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td>Nome:</td> <td><input class="input_datipersonali" type="text" name="nome" value="<?php echo $row["nome"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td>Cognome:</td> <td><input type="text" class="input_datipersonali" name="cognome" value="<?php echo $row["cognome"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td>Email:</td> <td><input type="text" class="input_datipersonali" name="email" value="<?php echo $row["email"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td>Telefono:</td> <td><input type="number" class="input_datipersonali" name="telefono" value="<?php echo $row["telefono"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td>Comune:</td> <td><input type="text" class="input_datipersonali" name="comune" value="<?php echo $row["comune"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td>Via:</td> <td><input type="text" class="input_datipersonali" name="via" value="<?php echo $row["via"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
                <tr>
					<td>Civico:</td> <td><input type="number" class="input_datipersonali" name="civico" value="<?php echo $row["civico"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
			</table>
			<br><br>
			<p style="text-align: center">
				<input type="submit" name="pulsante_modifica" value="<?php if($modifica==false) echo "$strmodifica"; else echo "$strconferma"; ?>">
			</p>
		</form>	
	</div>	
	
	<br>
	<?php 
		include('footer.php')
	?>
	
</body>
</html>