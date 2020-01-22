<?php
	if (!isset($_POST["Vida"])){
		$_POST["Vida"]=5;
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
		<form id='juego' method="post" onsubmit="return true;">
			<fieldset>
				<legend>Juego del Ahorcado</legend>
				<label id="dibujo"class="datos">
					<?php
						$myfile = fopen("Ahorcado.txt", "r") or die("Unable to open file!");
						
						for($i=0;$i<(5-$_POST["Vida"])*7;$i++)
							fgets($myfile); //saltar dibujos si es nesesario
						for($i=0;$i<7;$i++)
							echo fgets($myfile); //7 lineas del dibujo
					?>
				</label>
				<br><label id="palabra"class="datos">_ _ _ _ _</label>
				<br><br><label class="datos" for="Letra" >Letra:</label>
				<select name="Letra">
					<?php
						for($i=97;$i<123;$i++){
							echo '<option value="'.chr($i).'">'.chr($i).'</option>';
					
					?>
  				</select>

				<br><label class="hide" for="Vida">Vida/s:</label><input id="lives" class="hide" type="text" name="Vida">5</input>
				<br><button type="submit">Enviar</button>
			</fieldset>
		</form>
</body>
</html>
