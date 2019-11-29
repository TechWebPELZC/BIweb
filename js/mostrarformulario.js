function titulo(){
	document.getElementById('mostrar_titulo').style.display="block";
	document.getElementById('mostrar_categoria').style.display="none";
	document.getElementById('mostrar_autor').style.display="none";
}
function categoria(){
	document.getElementById('mostrar_titulo').style.display="none";
	document.getElementById('mostrar_categoria').style.display="block";
	document.getElementById('mostrar_autor').style.display="none";
}
function autor(){
	document.getElementById('mostrar_titulo').style.display="none";
	document.getElementById('mostrar_categoria').style.display="none";
	document.getElementById('mostrar_autor').style.display="block";
}

function genero() {
	document.getElementById('container').style.display="block";
	document.getElementById('container2').style.display="none";
	document.getElementById('container3').style.display="none";
}

function actividad() {
	document.getElementById('container').style.display="none";
	document.getElementById('container2').style.display="block";
	document.getElementById('container3').style.display="none";
}

function cantidad_libros() {
	document.getElementById('container').style.display="none";
	document.getElementById('container2').style.display="none";
	document.getElementById('container3').style.display="block";
}