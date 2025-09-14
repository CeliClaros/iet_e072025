

console.log('activo');


function prueba(){
  console.log('function activa');
  var formulario= document.getElementById('selecciona');
  var mostrar=document.getElementById('alerta');
console.log(formulario);
//formulario.addEventListener('onclick', function(){

  console.log('bien');

  var datos = new FormData(formulario);
  console.log(datos);
  console.log(datos.get('tramites'));
    console.log(datos.get('apellido'));
  alert(datos.get('tramites'));  //toma el tramite.value == nro. de tramite!!!
  //alert('Muestra??');

//  fetch("recibe_data.php",{
  //fetch("draft1.php",{
      fetch("pronostico.php",{
    method: 'POST',
    headers:new Headers({'Content-Type': 'application/x-www-form-urlencoded'}),
    body: datos
    
    //body: datos.get('tramite')
  }) 
    //var toJason= JSON.parse(datos);
    //console.log(toJason);


  /*
  .then( res => res.json())
  .then(data => {
    console.log(data);
    mostrar. inner.HTML="MEnsaje de respuesta";   //no muestra!!!!
  })
  alert('responde??'); */
  //alert(data);  
  
//});
}
/*
var nombre =document.getElementById('nombre');
var apellido =document.getElementById('apellido');
var email =document.getElementById('email');
console.log('nombre');
console.log(nombre.value);


var name1 =document.getElementById('nombre');
var surname1 =document.getElementById('apellido');
var mail =document.getElementById('email');
console.log('name1');   */

//document.querySelector('#enviar').addEventListener('click',prueba(nombre, apellido, email));         //prueba(name1, surname1, mail));

    document.addEventListener('DOMContentLoaded', function(){
          console.log('listo');
document.querySelector('#calcular').addEventListener('click',envia);  //prueba(event));  
//event.preventDefault();
console.log('function activada');
  var tramit=document.getElementById('tramite').value;

//function prueba(name1, surname1, mail){
//function prueba(nombre, apellido, email){

  function envia(){
	
  console.log('tramit');


/*
	var nombre=document.getElementById('nombre').value;
	var apellido=document.getElementById('apellido').value;
	var email=document.getElementById('email').value;

	

  console.log(nombre.value);
  console.log(apellido.value);
  console.log(email.value);
*/

 // const xmp= new XMLHttpRequest();



 const xhttp= new XMLHttpRequest();
 // xmp.open('POST',          $('formulario').serialize();            //'backend.php?name='+nombre+'&surname='+apellido+'&mail='+email);
   //xhttp.open('GET','disponibilidad-pruebaok.php?tramite='+tramit, true);

  xhttp.open('GET','disponibilidad.php?tramite='+tramit, true);

   //xhttp.open('GET','disponibilidad.php?name='+nombre+'&surname='+apellido+'&mail='+email, true);
         xhttp.send();
  //var ruta="name="+nombre+"&surname="+apellido+"&email="+email;

    //xhttp.open('GET', 'tiempo_espera8.php', true);
    //xhhtp.onload;
  //  xhttp.open('POST', 'tiempo_espera8.php', true);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            //xhttp.open('GET', 'tiempo_espera8.php?tram='+tram, true);
   // xhttp.open('GET', 'backend.php?tram='+tram, true);

    xhttp.onreadystatechange= function(){
       // console.log("tramite",tramite.value);
        console.log("tramit", tramit);

      // console.log(request.status);


  //  xhttp.open('POST', 'tiempo_espera8.php', true);
  //  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

//    xhttp.send(tram);

          var state= this.readyState
          console.log("state",state);
          var status= this.status;
          console.log("status", status);

 

              if(this.readyState== 4 && this.status== 200){
            console.log(this.responseText);   //print como cadena de texto;
           var json = JSON.parse(this.responseText);    //lo imprime como json.
          // var json = JSON.parse(JSON.stringify(this.responseText));
        console.log(json);
    //    console.log(json[0]['nombre']);
           
  //          var json = JSON.parse(xmp.responseText);
// var json = JSON.parse(JSON.stringify(xmp.responseText));

 //var json = JSON.parse(JSON.stringify(xmp.responseText));    //, ['nombre', 'apellido', 'email']));

  //var json = JSON.parse(JSON.stringify(xmp.responseText, ['nombre', 'apellido', 'email']));
  // document.getElementById('#respuesta').innerHTML = json; >> ERROR.

   //document.getElementById('#respuesta').innerHTML = json.responseText;
 //JSON.stringify(foo, ['week', 'month']);  
           //var json = JSON.parse(JSON.stringify(userData));
         //   dump(xmp.responseText);
         
           console.log ("JSON",json);


          //          console.log ("JSON",json[0][0]);   //['nombre']);

          //  document.getElementById('json').innerText = json[0];

  //           document.getElementById('json').innerText = this.responseText;
/*
  document.querySelector('#cant-turnos').innerHTML = this.responseText;
  document.querySelector('#tiempo-espera').innerHTML = this.responseText;
*/
/*doc:
document.querySelector('#cant-turnos').innerHTML = json['tramite'];
document.querySelector('#tiempo-espera').innerHTML = json['cantidad'];
*/
//document.querySelector('#tiempo-espera').innerHTML = this.responseText;     //TODO EL JSON COMPLETO

document.querySelector('#cant-turnos').innerHTML = json['cantidad'];
document.querySelector('#tiempo-espera').innerHTML = json['espera'];

/*  doc:
document.querySelector('#cant-turnos').innerHTML = this.responseText;

document.querySelector('#tiempo-espera').innerHTML = this.responseText;

*/

//document.querySelector('#respuesta').innerHTML = json['nombre'];
//document.querySelector('#muestra_email').innerHTML = json['email'];
//document.querySelector('respuesta').innerText = this.responseText;
 //document.getElementById('#respuesta').innerHTML = json[0]['nombre'];
  //document.getElementById('respuesta').innerHTML = json[0][1];

  //PARA IMPRIMIR LOS VALORES:
 //document.getElementById('respuesta').innerHTML = json[0][0]['nombre'];
   //     document.getElementById('respuesta').innerHTML = json[0]['nombre'];
      //   document.getElementById('#respuestaini').innerHTML = json[0]['apellido'];
       //   document.getElementById('#respuestaini').innerHTML = json[0]['email'];

               //  document.getElementById('tiempo-espera').innerHTML = json[0]['espera'];

 /*          */
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

        }
    }

//xmp.send();

}


//document.querySelector('#enviar').addEventListener('click',prueba());  
});
