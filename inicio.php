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
			<ul>
				<?php
					$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
					while(!feof($myfile)){
						echo '<li class="USUARIO">';


							echo '<a href="#">';

							echo fgets($myfile);


								echo '</a><ul><li>';


									echo fgets($myfile);


									echo '</li><li>';


									echo fgets($myfile);


						echo'</li></ul></li>';
					}
					fclose($myfile);
				?>
			</ul>
        </section>
    </body>
</html>
