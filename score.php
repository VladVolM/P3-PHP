<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title id="title">Puntuación</title>
        <link rel="stylesheet" href="Style/styles.css" />
        <link rel="Shortcut Icon" href="Imagenes/icono.png">
    </head>
    <body>
		<section>
			<a href="inicio.php">Volver</a>
		</section>
		<section>
			<ul>
				<?php
					$StringBirth;
					$PresentDay;
					$myfile = fopen("Usuarios.txt", "r") or die("Unable to open file!");
					fgets($myfile);//saltar separador
					while(!feof($myfile)){
						echo '<li class="USUARIO">';

							$nombre=fgets($myfile);//conseguir nombre
							$apellidos=fgets($myfile);//conseguir apppelidos

							echo $nombre.' '.$apellidos;//ver nombre


								echo '<ul><li>';

									fgets($myfile);//saltar correo
									fgets($myfile);//saltar fecha
									$partidasjugadas=fgets($myfile);//guardar partidas jugadas
									echo 'Partidas jugadas: '.$partidasjugadas;//partidas jugadas

									echo '</li><li class="gana">';

									$partidasganadas=fgets($myfile);//guardar partidas ganadas
									echo 'Partidas ganadas: '.$partidasganadas;//partidas ganadas

									echo '</li><li class="pierde">';

									echo 'Partidas perdidas: '.((int)$partidasjugadas-(int)$partidasganadas);//partidas perdidas
							
							fgets($myfile);//saltar linea

						echo'</li></ul></li>';
					}
					fclose($myfile);
				?>
			</ul>
        </section>
    </body>
</html>
