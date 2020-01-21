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
		<?php
			if (isset($_POST["Comprobar"])){
				if (strlen($_POST["Apellidos"])>=2)
					if (strlen($_POST["Apellidos"])>=2)
						if(filter_var($_POST["Correo"],FILTER_VALIDATE_EMAIL))
							if (strlen($_POST["Fecha"])>=1){
								$Contenido= "----------------------------------------\n".$_POST["Nombre"]."\n".$_POST["Apellidos"]."\n".$_POST["Correo"]."\n".$_POST["Fecha"]."\n0\n0\n";
								file_put_contents("Usuarios.txt", $Contenido,FILE_APPEND);
							}
				




			}
		?>
		<form id='alta' method="post" onsubmit="return true;">
			<fieldset>
				<legend>CREAR USUARIO</legend>
				<label class="datos" for="Nombre">Nombre:</label><input type="text" name="Nombre" placeholder="Nombre"></input>
				<?php 
					if (isset($_POST["Nombre"]))
						if (strlen($_POST["Nombre"])<1)
							echo '*No se puede dajar vacio';
						else
							if (strlen($_POST["Apellidos"])<2)
								echo '*Mínimo 2 letras';
				?>
				</br><label class="datos" for="Apellidos" >Apellidos:</label><input type="text" name="Apellidos" placeholder="Apellidos"></input>
				<?php 
					if (isset($_POST["Apellidos"]))
						if (strlen($_POST["Apellidos"])<1)
							echo '*No se puede dajar vacio';
						else
							if (strlen($_POST["Apellidos"])<2)
								echo '*Mínimo 2 letras';
				?>
				</br><label class="datos" for="Correo">E-Mail:</label><input type="text" name="Correo" placeholder="E-Mail"></input>
				<?php 
					if (isset($_POST["Correo"]))
						if (strlen($_POST["Correo"])<1)
							echo '*No se puede dajar vacio';
						else
							if(!filter_var($_POST["Correo"],FILTER_VALIDATE_EMAIL))
								echo '*No es un E-mail';
				?>
				</br><label class="datos" for="Fecha">Nombre:</label><input type="date" min='1800-01-01' <?php echo 'max='.date('Y-m-d');?> name="Fecha"></input>
				<?php 
					if (isset($_POST["Fecha"]))
						if (strlen($_POST["Fecha"])<1)
							echo '*No se puede dajar vacio';
				?>
				</br><button type="submit">Enviar</button>
				<input type="radio" name="Comprobar" checked>
			</fieldset>
		</form>
</body>
</html>