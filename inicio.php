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
			<a href="form.php">FORMULARIO</a>
		</section>
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
									fgets($myfile);//saltar correo


									echo '</li><li>';


									$StringBirth=fgets($myfile);
									$PresentDay=date("Y-m-d");
									$dif = (int)substr($PresentDay,0,4)-(int)substr($StringBirth,0,4);
									if ((int)substr($PresentDay,5,2)>=(int)substr($StringBirth,5,2)){
										if (!(int)substr($PresentDay,8)>=(int)substr($StringBirth,8))
											$dif-=1;
									}else
										$dif-=1;

									echo $dif ;

							fgets($myfile);//saltar partidas jugadas
							fgets($myfile);//saltar partidas ganadas
							fgets($myfile);//saltar linea

						echo'</li></ul></li>';
					}
					fclose($myfile);
				?>
			</ul>
        </section>
    </body>
</html>
