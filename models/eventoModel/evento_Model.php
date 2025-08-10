<?php
  
//tb categoria_tramite:

class Categoria_tramite{

	public $id_tipo;
  public $tipo_tramite;
  public $icono;
		

  public function __construct($id_tipo = null, $tipo_tramite = null, $icono = null) {
		$this->$id_tipo = $id_tipo;
		$this->tipo_tramite = $tipo_tramite;
		$this->icono = $icono;
	}
}


//tb tramites:

class Tramites{

	public $tramite_id;
	public $nm_tramite;
	public $fecha_tramite;
  public $hora_evento;
  public $id_tipo_tramite;    
  public $clave;


  public function __construct($tramite_id = null, $nm_tramite = null, $fecha_tramite = null , $hora_evento = null, $id_tipo_tramite = null, $clave = null) {
		$this->tramite_id = $tramite_id;
		$this->nm_tramite = $nm_tramite;
		$this->fecha_tramite = $fecha_tramite;
    $this->$hora_evento = $hora_evento;
		$this->id_tipo_tramite = $id_tipo_tramite;
		$this->clave = $clave;
	}
}



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
    
//declara array para manejar eventos registrados:

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

$registrados_hoy= registradosHoy($fecha_ver);

function idTipoTramite($listar_rta){
    
//ID tipo tramite:
      $tipo_tramite= $listar_rta['id_tipo_tramite'];
      return $tipo_tramite;
}


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

//Llama a la función 
$evento= eventosHoy($listar_rta);

?>
<?php
///-----------------------------------------//
///-----------------------------------------//
//FILE:
//eventos_reservados.php

//VIEW:

text/x-generic eventos-reservados.php ( HTML document, UTF-8 Unicode text, with CRLF line terminators )

session_start();
error_reporting(0);
$usuario= $_SESSION['email'];
 //require_once 'includes/templates/header-min.php'; 
 require_once 'includes/templates/barra-user.php'; 


require_once 'includes/funciones/tramite.php';

// require_once 'includes/templates/index-barra.php'; 





//&&&===================VIEW:==================&&&
 ?>
 

 <section class="seccion">

    <h2>Tramites Reservados</h2>
      <p> </p>

  </section>  <!--seccion-->


  <section class="programa">  <!--Trámites-->
    <div class="contenedor-video">
    
      <video autoplay loop poster="img/bg-talleres.jpg" >


          <source src="img/fondo-fila.png" type="img"> 
      </video>
    </div>  <!--contenedor-video-->

    <div class="contenido-programa">
      <div class="contenedor">
          <div class="programa-evento">

        <h2>Tramites, estado actual</h2>

<nav class="menu-programa">
<?php 

//crea array para setear categorias
 $categoria=array();
 
 //Llama a la funcion del MODEL:
 
$lista_categoria= getCategoria();

//VIEW 
//muestra lista categorias:
    
 while ( $lista_categoria) {

//muestra categorias: VIEW
?>

   <a href="#talleres"><i class="<?php echo $lista_categoria['icono']; ?>" aria-hidden="true"></i> <?php echo $lista_categoria['tipo_tramite']; ?></a>
 
 <!--  <a href="#talleres"><i class="fas fa-landmark" aria-hidden="true"></i> 
 
 <?php echo $lista_categoria['tipo_tramite']; ?></a>
  
   <a href="#conferencias"><i class="fas fa-landmark" aria-hidden="true"></i>Trámites Personalizados:  Inversiones,Pagos</a>
   
   <a href="#seminarios"><i class="fas fa-landmark" aria-hidden="true"></i>Consultas, Productos, Servicios</a>
    -->
    <?php 
} //fin while categoria tramites ?>

 </nav>

  
 <?php

//&&===============================&&
//VIEW: mostrar eventos
//IMPRIMIR TODOS LOS EVENTOS:

//Llama las funciones de model Evento:

$listar_rta= getRegistrados();  

$eventos= eventosHoy($listar_rta);

    foreach ($eventos as $dia => $lista_eventos) {  
     
     //=================================
     //VER: ??? ver si reemplazar por $eventos, listar_rta quedó en la funcion, ver si muestra el tramite!!
     //ARMAR FUNCION QUE PREPARA FECHA : $eventos[$fecha_filtro][]= $un_evento;

//REPETIDOS:????
?>
 <h3>Tramite <?php echo $listar_rta['id_registrado']; ?> </h3> 
 
 <h3>Tramite <?php echo $eventos['tramite']; ?> </h3> 

 <?php //=====================================     ?>

    <?php foreach ($lista_eventos as $evento): 
                         
     //muestra los eventos: FORMULARIO HTML:?>
     
 <form role="form" action="selecciona_envia.php" method="post">
    
  
//View: Muestra ID del evento:
 <p class="titulo"> <?php echo $evento['tramite'] ?> </p>
                          
<?php  

//llama a la funcion tramite y envía como parámetros los nombres del TRamite y tipo_tramite.
//funcion tramite se llamó con include_once al principio:
$tramite=tramite( $evento['tipo']  , $evento['tram']);    

//Arma Json con respuesta de Function tramite.
$ver= json_decode($tramite, true); 

$nm_tramite=$ver['nm_tramite'];
$tipo_tramite=$ver['tipo_tramite'];
?>

<!--VIEW: MUESTRA DATOS EVENTO: -->

<p class="titulo">Tipo Evento:</p>   <p><?php echo $tipo_tramite; ?></p>
<p class="titulo">Nombre Evento:</p>  <p><?php echo $nm_tramite; ?></p>

<?php //LAS SIGUIENTES DOS LINEAS TRAEN EN CADA CAJITA DEL FRONT LA FECHA Y NOMBRE APELLIDO DEL USUARIO QUE RESERVÒ (UTIL PARA EL OPERADOR.- ?>
                          
<!--MUY IMPORTANTE!!!!!!: 
 <p><i class="fas fa-clock" aria-hidden="true"></i> <?php //echo $evento['fecha'];  //$hora . "hrs";?></p>
 <p><i class="fas fa-user" aria-hidden="true"></i> <?php //echo $evento['nombre'] . " " . $evento['apellido']; ?> </p>
   -->
                         
   
   <?php //if ($_SESSION['email'] == $evento['email']) {
       if ($usuario === $evento['email']) {
         ?>
   <!-- VER???  -->
        <input  type="hidden" name="login-user" value="1" >   
        <button type="submit">Reagendar</button>
        <button type="submit">Cancelar Evento</button> 
                     
<?php      } ?>           

     <pre>
        <?php //var_dump($evento); ?>
      </pre>                         
    </div>
 </form>                                              
                      
 <?php endforeach    //fin foreach de dias      ?>
 <?php //endif  de la linea: 160!!  ?>
                                      
   </i></p>
<!--COMENTADO:
      <p><i class="fas fa-clock" aria-hidden="true"></i> <?php //echo $hora . "hrs"; //$fecha; ?></p>
                    <p><i class="fas fa-calendar" aria-hidden="true"></i> <?php // echo $fecha_ver; ?> </p>
                    <p><i class="fas fa-user" aria-hidden="true"></i> <?php // echo $listar_rta['nombre'] . " " . $listar_rta['apellido']; ?> </p>

-->

  <?php    }      //fin foeach ?>
  


         <?php    //////////FIN PRUEBA:?>


        
             
          </div> <!--.programa-eventos -->

      </div> <!--.contenedor-->

    </div>  <!--contenido-programa -->

  </section> <!--programa--> 

  
