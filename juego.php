<?php
session_start();
	if (!isset($_POST["Comprobar"])){
		$_POST["Vida"]=5;

		$myfile = fopen("Usuarios.txt", "r") or die("Unable to open file!");
		$linea=0;
		$texto="";
		$texto.=fgets($myfile);//saltar primer separador
		while(!feof($myfile)){
			$nombre=fgets($myfile);//conseguir nombre
			$apellidos=fgets($myfile);//conseguir apppelidos
			$texto.=$nombre;
			$texto.=$apellidos;
			if ($_GET["nom"]== trim($nombre)){
				$_SESSION["Nombre"]=$nombre;
				$_SESSION["Linea"]=$linea;
				$texto.=fgets($myfile);//saltar correo
				$texto.=fgets($myfile);//guardar fecha
				$texto.=((int)fgets($myfile)+1)."\n";//saltar partidas jugadas
				$texto.=fgets($myfile);//saltar partidas ganadas
				$texto.=fgets($myfile);//saltar linea (separador)
			}else{
				$texto.=fgets($myfile);//saltar correo
				$texto.=fgets($myfile);//guardar fecha
				$texto.=fgets($myfile);//saltar partidas jugadas
				$texto.=fgets($myfile);//saltar partidas ganadas
				$texto.=fgets($myfile);//saltar linea (separador)
				$linea=$linea+7;//guarda la line desde donde empieza el usuario
			}
			
		}
		fclose($myfile);
		file_put_contents("Usuarios.txt", $texto);
		
		$myfile = fopen("Palabras.txt", "r") or die("Unable to open file!");
		//FFFFFFFFFFFFFFFFFFFFFFFFFFFFF


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
        <title id="title">Ahorcado</title>
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
						
						if (!isset($_POST["Comprobar"])){
							for($i=0;$i<7;$i++)
								echo fgets($myfile); //7 lineas del dibujo
							fclose($myfile);
						}else{
							$pos = strrpos($_SESSION["PALABRA"], $_POST["Letra"]);

							if ($pos === false)
								$_POST["Vida"]=((int)$_POST["Vida"]-1);
							else{
								$encontrado=false;
								$max=strlen($_SESSION["PALABRA"]);
								for ($i=0;$i<$max;$i++){
									if ($_SESSION["PALABRA"][$i]==$_POST["Letra"])
										if ($_SESSION["BLANK"][$i]!=$_POST["Letra"])
											$_SESSION["BLANK"][$i]=$_POST["Letra"];
										else
											$encontrado=true;
									
								}
								if ($encontrado)
									$_POST["Vida"]=((int)$_POST["Vida"]-1);
							}
							for($i=0;$i<(5-(int)$_POST["Vida"])*7;$i++)
								fgets($myfile); //saltar dibujos si es nesesario
							for($i=0;$i<7;$i++)
								echo fgets($myfile); //7 lineas del dibujo
							fclose($myfile);
						}
					?>
				</label>
				<br><label id="palabra"class="datos"><?php echo $_SESSION["BLANK"];?></label>
				<?php
					if ($_SESSION["PALABRA"]==$_SESSION["BLANK"]){
						echo '<br><br><label class="datos" >HAS GANADO</label>';
						$myfile = fopen("Usuarios.txt", "r") or die("Unable to open file!");
						$texto="";
						$texto.=fgets($myfile);//saltar primer separador
						while(!feof($myfile)){
							$nombre=fgets($myfile);//conseguir nombre
							$apellidos=fgets($myfile);//conseguir apppelidos
							$texto.=$nombre;
							$texto.=$apellidos;
							if ($_GET["nom"]== trim($nombre)){
								$_SESSION["Nombre"]=$nombre;
								$_SESSION["Linea"]=$linea;
								$texto.=fgets($myfile);//saltar correo
								$texto.=fgets($myfile);//guardar fecha
								$texto.=fgets($myfile);//saltar partidas jugadas
								$texto.=((int)fgets($myfile)+1)."\n";//saltar partidas ganadas
								$texto.=fgets($myfile);//saltar linea (separador)
							}else{
								$texto.=fgets($myfile);//saltar correo
								$texto.=fgets($myfile);//guardar fecha
								$texto.=fgets($myfile);//saltar partidas jugadas
								$texto.=fgets($myfile);//saltar partidas ganadas
								$texto.=fgets($myfile);//saltar linea (separador)
								$linea=$linea+7;//guarda la line desde donde empieza el usuario
							}
			
						}
						fclose($myfile);
						file_put_contents("Usuarios.txt", $texto);
						$_POST["Comprobar"]="no";
					}else{
						echo '<br><br><label class="datos" >Letra:</label><select class="datos" name="Letra">';
						for($i=97;$i<123;$i++)
							echo '<option value="'.chr($i).'">'.chr($i).'</option>';
	  					echo '</select>';
					}
				?>

				<br><input id="lives" class="hide" type="number" name="Vida" <?php echo 'value='.((int)$_POST["Vida"]);?>>
				<input class="hide" type="radio" value="yes" name="Comprobar" checked>
				<br><button type="submit" <?php 
												if ((int)$_POST["Vida"]<=0 || $_POST["Comprobar"]=="no")
													echo 'disabled';
											?>>Enviar</button>
			</fieldset>
		</form>
	</body>
</html>
