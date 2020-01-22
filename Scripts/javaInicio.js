
function comprobar(){
	var palabra = '<%=Session["PALABRA"]%>';
	var blank = '<%=Session["BLANK"]%>';
	var letra = document.forms['juego']['Letra'].value;
	var bool=true;
	var resultado="";


	for(var i=1;i=<palabra.length){
		if (palabra[i]==letra){
			blank[i]=letra;
			bool=false;
		}
		concat(resultado,blank[i]," ");
	}
	if (!bool){
		var x=document.getElementById("palabra");
		x.innerHTML=resultado;
	}
	return bool;
}

function setblank(){
	var x=document.getElementById("palabra");
	var blank = '<%=Session["BLANK"]%>';
	var resultado="";
	for(var i=1;i=<palabra.length){
		concat(resultado,blank[i]," ");
	}
	x.innerHTML=resultado;
}

