<?php
session_start();
	if (!isset($_POST["Comprobar"])){
		$_POST["Vida"]=5;

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
							$pos = strrpos($_SESSION["PALABRA"], $_POST["Letra"]);
							if ($pos === false)
								$_POST["Vida"]=((int)$_POST["Vida"]-1);
							else{
								$encontrado=false;
								$max=strlen($_SESSION["PALABRA"]);
								for ($i=0;$i<$max;$i++){
									if ($_SESSION["PALABRA"][$i]==$_POST["Letra"]){
										if ($_SESSION["BLANK"][$i]!=$_POST["Letra"])
											$_SESSION["BLANK"][$i]=$_POST["Letra"];
										else
											$encontrado=true;
									}
								}
								if ($encontrado)
									$_POST["Vida"]=((int)$_POST["Vida"]-1);
							}
							echo $_SESSION["BLANK"];
						}

					?>
				</label>
				<br><br><label class="datos" >Letra:</label>
				<select class="datos" name="Letra">
					<?php
						for($i=97;$i<123;$i++)
							echo '<option value="'.chr($i).'">'.chr($i).'</option>';
					?>
  				</select>

				<br><input id="lives" class="hide" type="number" name="Vida" <?php echo 'value='.((int)$_POST["Vida"]);?>>
				<input class="hide" type="radio" name="Comprobar" checked><?php echo $_POST["Letra"];?>
				<br><button type="submit">Enviar</button>
			</fieldset>
		</form>
	</body>
</html>
