//pasa-datos-ajax




console.log('activo');


var nombre =document.getElementById('nombre');
var apellido =document.getElementById('apellido');
var email =document.getElementById('email');
console.log('nombre');
console.log(nombre.value);
/*

var name1 =document.getElementById('nombre');
var surname1 =document.getElementById('apellido');
var mail =document.getElementById('email');
console.log('name1');   */

//document.querySelector('#enviar').addEventListener('click',prueba(nombre, apellido, email));         //prueba(name1, surname1, mail));

    document.addEventListener('DOMContentLoaded', function(){
          console.log('listo');
document.querySelector('#enviar').addEventListener('click',prueba());  
document.

//function prueba(name1, surname1, mail){
//function prueba(nombre, apellido, email){

  function prueba(){
	console.log('function activada');

	var nombre=document.getElementById('nombre').value;
	var apellido=document.getElementById('apellido').value;
	var email=document.getElementById('email').value;

	
/*
  console.log(nombre.value);
  console.log(apellido.value);
  console.log(email.value);
*/

 // const xmp= new XMLHttpRequest();

var respuesta = new XMLHttpRequest;
respuesta.open('GET', 'backend.php?name='+nombre+'&surname='+apellido+'&mail='+email);
	respuesta.onreadystatechange = function(){


        if(this.readyState ==4 && this.status == 200){
		//if (this.readyState=== XMLHttpRequest.DONE && this.status === 200){
			var	rta = JSON.parse(this.responseText);
			

			console.log ("JSON",rta);
			//console.log ("JSON",respuestaJson[0]['nombre']);
			//console.log ("JSON",json[0]['nombre']);
	document.getElementById('#respuestaini').innerText = rta;

			document.getElementById('#respuestaini').innerText = this.responseText;		//respuestaJson;


			 document.getElementById('#respuestaini').innerHTML = respuestaJson[0]['nombre'];
          document.getElementById('#respuestaini').innerHTML = respuestaJson[0]['apellido'];
          document.getElementById('#respuestaini').innerHTML = respuestaJson[0]['email']; 	/*	*/
		}		//fin if

		};		//fin function prueba

		respuesta.send();

	}





//&===================================0

//ini primer sp
/*


  var xmp= new XMLHttpRequest();
  xmp.open('GET','backend.php?name='+nombre+'&surname='+apellido+'&mail='+email);

  //var ruta="name="+nombre+"&surname="+apellido+"&email="+email;

    //xhttp.open('GET', 'tiempo_espera8.php', true);
    //xhhtp.onload;
  //  xhttp.open('POST', 'tiempo_espera8.php', true);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            //xhttp.open('GET', 'tiempo_espera8.php?tram='+tram, true);
   // xhttp.open('GET', 'backend.php?tram='+tram, true);





    xmp.onreadystatechange= function() {
       // console.log("tramite",tramite.value);
        console.log("name");

      // console.log(request.status);


  //  xhttp.open('POST', 'tiempo_espera8.php', true);
  //  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

//    xhttp.send(tram);

  // if(this.readyState=== XMLHttpRequest.DONE && this.status=== 200){
           if(this.readyState== 4 && this.status== 200){
            console.log(this.responseText);
            //var json = JSON.parse(xmp.responseText);
           	var respuestaJson = JSON.parse(this.responseText);
            console.log ("JSON",respuestaJson[0]['nombre']);

//			            document.getElementById('respuestaJson').innerText = respuestaJson[0];
document.getElementById('respuestaJson').innerText.this.responseText;


        document.getElementById('#respuesta').innerHTML = respuestaJson[0]['nombre'];
          document.getElementById('#respuesta').innerHTML = respuestaJson[0]['apellido'];
          document.getElementById('#respuesta').innerHTML = respuestaJson[0]['email'];

  /*        */
                              //  console.log("email", json[0]['email']);
         //   document.querySelector('#cant-turnos').innerHTML=this.responseText[0]['cant'];
     //   document.querySelector('#cant-turnos').innerHTML=this.responseText[0]['cant'];
      
/*   imprime el arrray de rta:
      document.getElementById('#respuesta').innerText = json;

        document.getElementById('#respuesta').innerHTML = json[0]['nombre'];
          document.getElementById('#respuesta').innerHTML = json[0]['apellido'];
          document.getElementById('#respuesta').innerHTML = json[0]['email'];
         //document.getElementById('tiempo-espera').innerHTML = json[0]['espera'];
*/ 

         //document.getElementById('cant-turnos').innerHTML = json[0]['cant'];
         //document.getElementById('tiempo-espera').innerHTML = json[0]['espera'];


           // console.log("r", r.value);

         //document.getElementById('cant-turnos').innerHTML = r.value;
         //document.getElementById('tiempo-espera').innerHTML = json[0]['espera'];
/*
        }
    };

xmp.send();

}
*/ //fin primer sp

//document.querySelector('#enviar').addEventListener('click',prueba());  
});
//&===============================================

 	/*
 	const xhttp= new XMLHttpRequest();

 	xhttp.open('GET', 'backend.php?name='+nombre+'&surname='+apellido+'&email='+email);

 	//var ruta="name="+nombre+"&surname="+apellido+"&email="+email;

    //xhttp.open('GET', 'tiempo_espera8.php', true);
    //xhhtp.onload;
  //  xhttp.open('POST', 'tiempo_espera8.php', true);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  					//xhttp.open('GET', 'tiempo_espera8.php?tram='+tram, true);
   // xhttp.open('GET', 'backend.php?tram='+tram, true);

    xhttp.onreadystatechange= function() {
       // console.log("tramite",tramite.value);
        console.log("nombre", name);

      // console.log(request.status);


  //  xhttp.open('POST', 'tiempo_espera8.php', true);
  //  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

//    xhttp.send(tram);

  
        if(this.readyState== 4 && this.status== 200){
            console.log(this.responseText);
            var json = JSON.parse(xhttp.responseText);
            console.log ("JSON",json);
            console.log("email", json[0]['email']);
         //   document.querySelector('#cant-turnos').innerHTML=this.responseText[0]['cant'];
     //   document.querySelector('#cant-turnos').innerHTML=this.responseText[0]['cant'];
         document.getElementById('#respuesta').innerHTML = json[0]['nombre'];
         //document.getElementById('tiempo-espera').innerHTML = json[0]['espera'];


         //document.getElementById('cant-turnos').innerHTML = json[0]['cant'];
         //document.getElementById('tiempo-espera').innerHTML = json[0]['espera'];


           // console.log("r", r.value);

         //document.getElementById('cant-turnos').innerHTML = r.value;
         //document.getElementById('tiempo-espera').innerHTML = json[0]['espera'];

        }
    }

    //&===================



//} // fin funcitonprueba


/*


function tiempoEspera(){
    console.log('funcion activada');
    console.log(tramite.value);
    if (tramite.value === '') {
        alert("Seleccione un trámite por favor");
        tramite.focus();		
    } else{
        console.log("Seleccionaste tramite", tramite.value);

        var tram= tramite.value;

    }
    //var tram= tramite.value;
    console.log("tram", tram);

    const xhttp= new XMLHttpRequest();

 

    //xhttp.open('GET', 'tiempo_espera8.php', true);
    //xhhtp.onload;
  //  xhttp.open('POST', 'tiempo_espera8.php', true);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  					//xhttp.open('GET', 'tiempo_espera8.php?tram='+tram, true);
    xhttp.open('GET', 'backend.php?tram='+tram, true);

    xhttp.onreadystatechange= function() {
       // console.log("tramite",tramite.value);
        console.log("tramites",tram);

      // console.log(request.status);


  //  xhttp.open('POST', 'tiempo_espera8.php', true);
  //  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

//    xhttp.send(tram);

  
        if(this.readyState== 4 && this.status== 200){
            console.log(this.responseText);
            var json = JSON.parse(xhttp.responseText);
            console.log ("JSON",json);
            console.log("CANT", json[0]['cant']);
         //   document.querySelector('#cant-turnos').innerHTML=this.responseText[0]['cant'];
     //   document.querySelector('#cant-turnos').innerHTML=this.responseText[0]['cant'];
         document.getElementById('#respuesta').innerHTML = json[0]['nombre'];
         //document.getElementById('tiempo-espera').innerHTML = json[0]['espera'];


         //document.getElementById('cant-turnos').innerHTML = json[0]['cant'];
         //document.getElementById('tiempo-espera').innerHTML = json[0]['espera'];


           // console.log("r", r.value);

         //document.getElementById('cant-turnos').innerHTML = r.value;
         //document.getElementById('tiempo-espera').innerHTML = json[0]['espera'];

        }
    }

    //xhttp.open('POST', 'tiempo_espera8.php', true);
   // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //xhttp.send(tram);
   // xhttp.send('tram');
    
    xhttp.send();

}  */