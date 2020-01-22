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
		<form id='juego' method="post" onsubmit="return comprobar();">
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
				<br><label id="palabra"class="datos"></label>
				<br><br><label class="datos" for="Letra" >Letra:</label>
				<select name="Letra">
					<?php
						for($i=97;$i<123;$i++)
							echo '<option value="'.chr($i).'">'.chr($i).'</option>';
					?>
  				</select>

				<br><input id="lives" class="hide" type="number" name="Vida">
				<input class="hide" type="radio" name="Comprobar" checked>
				<?php
					if (!isset($_POST["Comprobar"]))
						echo '<script>setblank();</script>';
					$_POST["Vida"]=(int)$_POST["Vida"]-1;
				?>
				<br><button type="submit">Enviar</button>
			</fieldset>
		</form>
	</body>
</html>
