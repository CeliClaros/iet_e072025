
  document.addEventListener('DOMContentLoaded', function(){
          console.log('listo');

//  document.addEventListener('DOMContentLoaded', function(){
  //        console.log('listo');


//window.addEventListener("load",function(){

//})


//$(function() {

//$('a').ready(handler)			????
/*
$('a').ready(handler)

*/	
//$(document).ready(function() {	
	/* para insertar y logear al usuario admin */

	$('#login-user').on('submit', function(e) {
		e.preventDefault();		//ejecuta el action del formulario! Evito que se abra el archivo,
								// porque no quiero abrirlo para mostrar nada, sólo que se ejecute el insert en la db.
		console.log(' Click!!');
		
		//var pase_dia = document.getElementById('pase_dia'); //caja 
		//var user = document.getElementById('usuario'); //caja 
		//var name = document.getElementById('nombre'); //caja 
		//var agregar = document.getElementById('agregar-admin'); //caja 

			//console.log(user);
			//console.log(name);
		//	console.log(agregar);


/*
		if ( user) {
			datos['agregar-admin']=1;
		};

*/

		var datos = $(this).serializeArray();

/*
			if ( user != '' || name != '' ) {
			datos['agregar-admin']=1;
		}else{
			datos['agregar-admin']=0;
		} ;


*/
		console.log(datos);
		console.log('DATOS');
		//console.log('AGREGAR-ADMIN: ');
		//console.log(agregar);
		//console.log(datos['agregar-admin']);


		$.ajax({						//ajax en jquery
			type: $(this).attr('method'),		//metodo del FORM.
			data: datos, 			//datos que se envian.
			url: $(this).attr('action'),	
			dataType: 'json',
			success: function(data){
			console.log(data);		//vs 743 min: 8.47
				console.log('DATA:');
			
				var resultado = data;
				if (resultado.respuesta == 'exitoso') {

					//Swal.fire(
					swal(
						  'Correcto!',
						  'Se creo con éxito el usuario admin, You clicked the button!',  //el admin se creó correctamente!
						  'success'
						);

				}else{

					swal(
  						 'error',
					  	 'Oops...',
					  	 'Something went wrong!' + resultado.usuario+ '!!' 
				/*
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Something went wrong!' + resultado.usuario+ '!!' 
				*/
					);

				}; // else

			}	//success
		
		});		//ajax

	

	}); //login-admin


});   //document


