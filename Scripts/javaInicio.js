
function Validar(){
	var nom = document.forms['formulario_alta']['Nombre'].value;
	var ape = document.forms['formulario_alta']['Apellidos'].value;
	var cor = document.forms['formulario_alta']['Correo'].value;
	var fec = document.forms['formulario_alta']['Fecha'].value;

	if (nom.length>1)
		if (ape.length>1)
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(cor))
				if (fec.length>0){
					alert("inicio funcion");
					window.location.replace("inicio.php");
					alert("Guardado");
				}
	return true;
}

