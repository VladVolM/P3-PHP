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
					$StringBirth;
					$PresentDay;
					$myfile = fopen("Usuarios.txt", "r") or die("Unable to open file!");
					fgets($myfile);
					while(!feof($myfile)){
						echo '<li class="USUARIO">';


							echo '<a href="#">';

							echo fgets($myfile);


								echo '</a><ul><li>';


									echo fgets($myfile);


									echo '</li><li>';


									$StringBirth=fgets($myfile);
									$PresentDay=date("d/m/Y");
									$dif = (int)substr($PresentDay,6)-(int)substr($StringBirth,6);
									if ((int)substr($PresentDay,3,2)>=(int)substr($StringBirth,3,2)){
										if (!(int)substr($PresentDay,1,2)>=(int)substr($StringBirth,1,2))
											$dif-=1;
									}else
										$dif-=1;

									echo $dif ;

							fgets($myfile);
							fgets($myfile);

						echo'</li></ul></li>';
					}
					fclose($myfile);
				?>
			</ul>
        </section>
    </body>
</html>
