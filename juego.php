<?php
	if (!isset($_POST["Comprobar"])){
		$_POST["Vida"]=5;
		session_start();
		$palabraelegida="abcde";
		$palabrablank="_____";

		$_SESSION["PALABRA"]=$palabraelegida;
		$_SESSION["BLANK"]=$palabrablank;
	}





?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title id="title">Inicio</title>
        <link rel="stylesheet" href="Style/styles.css" />
        <link rel="Shortcut Icon" href="Imagenes/icono.png">
        <script type="text/javascript" src="Scripts/javaInicio.js"></script>
    </head>
    <body>
		<section>
			<a href="inicio.php">Salir</a>
		</section>
		<form id='juego' method="post" onsubmit="return true;">
			<fieldset>
				<legend>Juego del Ahorcado</legend>
				<label id="dibujo"class="datos">
					<?php
						$myfile = fopen("Ahorcado.txt", "r") or die("Unable to open file!");
						
						for($i=0;$i<(5-(int)$_POST["Vida"])*7;$i++)
							fgets($myfile); //saltar dibujos si es nesesario
						for($i=0;$i<7;$i++)
							echo fgets($myfile); //7 lineas del dibujo
					?>
				</label>
				<br><label id="palabra"class="datos">
					<?php
						if (!isset($_POST["Comprobar"]))
							echo $_SESSION["BLANK"];
						else{
							$p=str_split($_SESSION["PALABRA"]);
							$b=str_split($_SESSION["BLANK"]);
							echo $_SESSION["BLANK"];
							print_r($b);
							$encontrado=false;
							$pos = strrpos($_SESSION["PALABRA"], $_POST["Letra"]);
							if ($pos === false)
								$_POST["Vida"]=((int)$_POST["Vida"]-1);
							else{
								$max=$_SESSION["BLANK"].length;
								for ($i=0;$i<$max;$i++){
									if ($p[$i]==$_POST["Letra"])
										if ($b[$i]!=$_POST["Letra"])
											$b[$i]=$_POST["Letra"];
								}
								$_SESSION["BLANK"]=implode($b);
							}
							echo $_SESSION["BLANK"];
						}

					?>
				</label>
				<br><br><label class="datos" for="Letra" >Letra:</label>
				<select name="Letra">
					<?php
						for($i=97;$i<123;$i++)
							echo '<option value="'.chr($i).'">'.chr($i).'</option>';
					?>
  				</select>

				<br><input id="lives" class="hide" type="number" name="Vida" <?php echo 'value='.((int)$_POST["Vida"]);?>>
				<input class="hide" type="radio" name="Comprobar" checked>
				<br><button type="submit">Enviar</button>
			</fieldset>
		</form>
	</body>
</html>
