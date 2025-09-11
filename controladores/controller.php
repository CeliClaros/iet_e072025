<?php

class eventoController {

// FORMAT FECHA:

public function formatFecha($fecha_ver){

   $fecha_filtro= date("Y-M-d", strtotime($fecha_ver)); 

    return $fecha_filtro; 
}

//--------------------------------------

//Eventos del día, solicitados:

public function registradosHoy($fecha_ver){

  //toma solo la fecha sin hora del registro;
   
  //filtra en una búsqueda sólo los eventos del día:

 $registrados_hoy= date("Y-M-d", strtotime($fecha_ver )); 

    //$registrados_hoy= date("Y-M-d", strtotime($listar_rta['fecha_registro'] )); 

    return $registrados_hoy;
}


//----------------------------------

public function idTipoTramite($listar_rta){
    
//ID tipo tramite:
      $tipo_tramite= $listar_rta['id_tipo_tramite'];
      return $tipo_tramite;
}

//-----------------------------------
public function eventosHoy($listar_rta){  

  while($listar_rta) {

   //toma solo la fecha sin hora del registro;
   //acá filtra sólo los eventos del día:
     
    $registrados_hoy= date("Y-M-d", strtotime($listar_rta['fecha_registro'] )); 

    if ($registrados_hoy== date("Y-M-d") ){       //Filtra por fecha, sin esto muestra todos los de la base!!! 


// Agregar: Y que el usuario sea el de la sesiòn para mostrar los botones sòlo en esa opciòn.

//arma el arreglo con eventos del día >> pasar a  obj?? o json??


// esta var queda suelta?? la usa más adelante!!! Debería tomarlo siempre desde evento!
    $tipo_tramite= $listar_rta['id_tipo_tramite'];
        
        $un_evento = array(
          'tramite' => $listar_rta['id_registrado'], 
          'fecha' => $listar_rta['fecha_registro'], 
          'nombre' => $listar_rta['nombre'], 
          'apellido' => $listar_rta['apellido'],
          'email' => $listar_rta['email'],
          'tipo' => $listar_rta['id_tipo_tramite'],
          'tram' => $listar_rta['tramite_id']
          );

//BIEN: FILTRA POR TIPO_EVENTO
       // $eventos[$tipo_tramite][] = $un_evento;

       //((---------------------------
       
//BIEN: FILTRA POR TIPO_EVENTO
       // $eventos[$tipo_tramite][] = $un_evento;

//FILTRA POR FECHA:

$eventos[$fecha_filtro][]= $un_evento;


//$eventos[]= $un_evento;

}   //endif


}     //fin while FETCH_ASSOC;
          //var_dump($eventos);
          //-----------------------------))
  return($un_evento)
}


//==================================

//NOTIFICA-DINAMICO4: FUNCIONES

//funcion busca: BUSCA EVENTO REGISTRADO POR UN USUARIO????

//function busca($usuario, $password, $fecha2){
public function busca($usuario, $fecha2)
{
	//busca el evento actual del cliente, recién logueado y registrado hoy, para notificar status

	try {
		//include_once 'includes/funciones/bd_conexion.php';
//$mysqli = new mysqli("localhost", "root", "", "iet");

		$mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');

		$conn = $mysqli;

		//busca el Evento del Cliente:
		$stmt = $conn->prepare("SELECT * FROM registrados WHERE fecha_registro LIKE ? and email = ? and status_turno = 1;");
		$stmt->bind_param("ss", $fecha2, $usuario);
		$stmt->execute();
		$stmt->bind_result($id_registrado, $nombre, $apellido, $dni, $email, $fecha_registro, $id_tipo_tramite, $tramite_id, $status_turno);
		if ($stmt->affected_rows) {
			$existe = $stmt->fetch();



			$turno = array(
				'id_registrado' => $id_registrado,
				'nombre' => $nombre,
				'apellido' => $apellido,
				'dni' => $dni,
				'email' => $email,
				'fecha_registro' => $fecha_registro,
				'id_tipo_tramite' => $id_tipo_tramite,
				'tramite_id' => $tramite_id,
				'status_turno' => $status_turno,
				'fecha_consulta' => $fecha2
			);

			return $turno;
		}  //if rta query;

	} catch (Exception $e) {
		echo "Error: " . $e->getMessage();
	}
	;

	$stmt->close();
	$conn->close();

}
; //cierra function busca;

//fin function buscar.

//---------------------------

public function pronostico($turno)
{

	//function pronostico($turno){		PARA NOTIFICAR SOBRE UN TURNO.
//este archivo calcula la cantidad de turnos previos en la misma fila o tipo de turnos y el tiempo de espera de atenciòn-


	try {
		include_once 'includes/funciones/bd_conexion.php';

		//CONEXION DDBB HOSTING:

		$mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');


		$fecha2 = $turno['fecha_consulta'];
		$id_tipo_tramite = $turno['id_tipo_tramite'];

		//Calcula Pronostico:

		$sql = "SELECT COUNT(*) id_registrado FROM registrados WHERE fecha_registro like '$fecha2'  AND  status_turno = 1  AND id_tipo_tramite ='$id_tipo_tramite'";

		$result = mysqli_query($mysqli, $sql);
		$fila = mysqli_fetch_assoc($result);

		//IMPRESION DE PRUEBA: 			echo "<BR>" . "Número de total de registros: " . $fila['id_registrado'];

	} catch (\Exception $e) {
		//throw $th;
		echo "Error!!!" . $e->getMessage() . "<br>";
		//return false;
	}

	/**/

	//IMPRIME PARA PRUEBA:
	$cont = $fila['id_registrado'];
	//$cont = intval($total[0]);
	$cantidad = $cont - 1;

	//		$minutos= $cantidad*10; // SE REEMPLAZA POR STORE PROCEDURE QUE CALCULA AVG POR TIEMPO DE ATENCIÒN EVENTO!!!

	//&&&&&&&**************&&&&&&&&&&&&&&&


	//$mysqli = new mysqli("localhost", "root", "", "iet");

	$mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');


	$prom = mysqli_query($mysqli, "CALL SP_PROMEDIOxTpoEVENTO_tbOPERACION");


	$promedio = mysqli_fetch_row($prom);

	//echo "RESULTADO DEL STORE SP EN MINUTOS:  "; echo $promedio[0];

	$minutos = $cantidad * $promedio[0];

	$pronostico = array(
		'cantidad' => $cantidad,				//$cont,
		'espera' => $minutos
	);

	//var_dump($pronostico);

	return $pronostico;


} //fin funcion pronostico.-


//-------------------





} // FIN DEFINICION OBJETO EVENTO


//&&=============================================&&

//---------------------------
/*
//tb categoria_tramite crear nueva ddbb tb categoriaEvento:
class categoriaEvento(){

	public $id_tipo;
	public $tipo_evento;
	public $icono;

	public function __construct($id_tipo = null, $tipo_evento = null, $icono = null) {
		$this->$id_tipo = $id_tipo;
		$this->tipo_evento = $tipo_tramite;
		$this->icono = $icono;
	}
}

//tb tramites crear nueva ddbb tb Evento:
class Evento(){

	public $id_tipo;
	public $tipo_tramite;
	public $icono;

	public function __construct($id_tipo = null, $tipo_tramite = null, $icono = null) {
		$this->$id_tipo = $id_tipo;
		$this->tipo_tramite = $tipo_tramite;
		$this->icono = $icono;
	}
}

*/
//---------------------------


//tb tramites:
class Evento(){
	public $

	public function __construct(){


}



// MODEL EVENTO

//FUNCION getCategoria

// obtiene categoria del evento:

function getCategoria(){
 require_once 'bd_conexion.php';
 
 $sql_tramite= "SELECT * FROM categoria_tramite";
 $lista_categoria_sql= mysqli_query($conn, $sql_tramite);

 $lista_categoria= mysqli_fetch_assoc($lista_categoria_sql);

 return $lista_categoria;
}

//====================================
//FUNCION getRegistrados


function getRegistrados(){
    //conexion:
    require_once('includes/funciones/bd_conexion.php');
    //Define, Ajusta zona horaria:
    date_default_timezone_set("America/Argentina/Buenos_Aires");

//query:

    $sql= "SELECT * FROM registrados"; // WHERE fecha_registro like '2021-08-11%'";
 
//Ejecuta y obtiene resultado:
    $resultado= mysqli_query($conn, $sql);

//arma un arreglo asociativo con el resultado:
$listar_rta=mysqli_fetch_assoc($resultado);

return $listar_rta;
}


                
   
//===========================================    
    // FUNCION eventosHoy:
    
//declara array para manejar eventos registrados: >>> CONTROLLER!!!

$eventos=array();       //ver!!! donde lo usa!!!!

//obtiene los datos desde arreglo asociativo:

$listar_rta= getRegistrados();  


$fecha_ver= $listar_rta['fecha_registro'];

 
function formatFecha($fecha_ver){

   $fecha_filtro= date("Y-M-d", strtotime($fecha_ver)); 

    return $fecha_filtro; 
}

function registradosHoy($fecha_ver){

  //toma solo la fecha sin hora del registro;
   //filtra sólo los eventos del día:

 $registrados_hoy= date("Y-M-d", strtotime($fecha_ver )); 

    //$registrados_hoy= date("Y-M-d", strtotime($listar_rta['fecha_registro'] )); 

    return $registrados_hoy;
}

//LLAMADA:

$registrados_hoy= registradosHoy($fecha_ver);

function idTipoTramite($listar_rta){
    
//ID tipo tramite:
      $tipo_tramite= $listar_rta['id_tipo_tramite'];
      return $tipo_tramite;
}

//LLAMADA:
//Llama funcion para definir el Tipo Tramite:

$tipo_tramite= idTipoTramite($listar_rta);

function eventosHoy($listar_rta){  

  while($listar_rta) {

   //toma solo la fecha sin hora del registro;
   //acá filtra sólo los eventos del día:
     
    $registrados_hoy= date("Y-M-d", strtotime($listar_rta['fecha_registro'] )); 

    if ($registrados_hoy== date("Y-M-d") ){       //Filtra por fecha, sin esto muestra todos los de la base!!! 


// Agregar: Y que el usuario sea el de la sesiòn para mostrar los botones sòlo en esa opciòn.

//arma el arreglo con eventos del día >> pasar a  obj?? o json??


// esta var queda suelta?? la usa más adelante!!! Debería tomarlo siempre desde evento!
    $tipo_tramite= $listar_rta['id_tipo_tramite'];
        
        $un_evento = array(
          'tramite' => $listar_rta['id_registrado'], 
          'fecha' => $listar_rta['fecha_registro'], 
          'nombre' => $listar_rta['nombre'], 
          'apellido' => $listar_rta['apellido'],
          'email' => $listar_rta['email'],
          'tipo' => $listar_rta['id_tipo_tramite'],
          'tram' => $listar_rta['tramite_id']
          );

//BIEN: FILTRA POR TIPO_EVENTO
       // $eventos[$tipo_tramite][] = $un_evento;

       //((---------------------------
       
//BIEN: FILTRA POR TIPO_EVENTO
       // $eventos[$tipo_tramite][] = $un_evento;

//FILTRA POR FECHA:

$eventos[$fecha_filtro][]= $un_evento;


//$eventos[]= $un_evento;

}   //endif


}     //fin while FETCH_ASSOC;
          //var_dump($eventos);
          //-----------------------------))
  return($un_evento)
}
} // Fin eventoController


//==================================
//LLAMADA:
//Llama a la función 
$evento= eventosHoy($listar_rta);

?>
<?php
///-----------------------------------------//
///-----------------------------------------//
//FILE:
//eventos_reservados.php

//============&&&&&&&&  VIEW:   &&&&&&&&&&&&&&==============
//VIEW: eventoView.php
//views > views > eventoView.php
//==================================