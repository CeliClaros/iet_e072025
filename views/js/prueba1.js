console.log('function activada');  /*
	function ver(){
		alert('prueba!!!');


  var tramit=document.getElementById('tramite').value;		//usar este para tomar los datos del SELECT!! >>
  VER COMO PASARLO AL BACK!! ...CONTINUAR!
  console.log('tramit');
  console.log(tramit);
  alert(tramit);
	}

	*/

function prueba(){
	console.log('function activa');
	var formulario= document.getElementById('tramites');
	var mostrar=document.getElementById('alerta');
console.log(formulario);
//formulario.addEventListener('onclick', function(){

	console.log('bien');

	var datos = new FormData(formulario);
	console.log(datos);
	console.log(datos.get('tramite'));
		console.log(datos.get('apellido'));
	//alert(datos.get('tramite'));
	alert('Muestra??');

	fetch("recibe_data.php",{
		method: 'POST',
		headers:new Headers({'Content-Type': 'application/x-www-form-urlencoded'}),
		body: datos
		
		//https://es.stackoverflow.com/questions/387232/las-variables-nunca-llegan-a-php-desde-la-api-fetch
		//body: datos.get('tramite')
	}) /*
	.then( res => res.json())
	.then(data => {
		console.log(data);
		mostrar. inner.HTML="MEnsaje de respuesta";		//no muestra!!!!
	})
	alert('responde??'); */
	//alert(data);  
	
//});
}
console.trace();
/*

  var tramit=document.getElementById('tramite').value;
  console.log('tramit');
  console.log(tramit);
  //document.addEventListener('DOMContentLoaded', function(){

  	*/