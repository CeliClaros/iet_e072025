console.log('activo');
var tramite =document.getElementById('tramite');

document.querySelector('#calcular').addEventListener('click', tiempoEspera);

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

  xhttp.open('GET', 'tiempo-espera.php?tram='+tram, true);

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
         document.getElementById('cant-turnos').innerHTML = json[0]['cant'];
         document.getElementById('tiempo-espera').innerHTML = json[0]['espera'];


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

}