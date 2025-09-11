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

class Tramite{
//atributos:
	public $tramite_id;
	public $nm_tramite;
	public $fecha_tramite;
  public $hora_evento;
  public $id_tipo_tramite;    
  public $clave;

// constructor:
  public function __construct($tramite_id = null, $nm_tramite = null, $fecha_tramite = null , $hora_evento = null, $id_tipo_tramite = null, $clave = null) {
		$this->tramite_id = $tramite_id;
		$this->nm_tramite = $nm_tramite;
		$this->fecha_tramite = $fecha_tramite;
    $this->$hora_evento = $hora_evento;
		$this->id_tipo_tramite = $id_tipo_tramite;
		$this->clave = $clave;
	}

//-------------------------------

//métodos: GETTERS
// obtiene categoria del evento:
public function getCategoria(){
 require_once 'bd_conexion.php';
 
 $sql_tramite= "SELECT * FROM categoria_tramite";
 $lista_categoria_sql= mysqli_query($conn, $sql_tramite);

 $lista_categoria= mysqli_fetch_assoc($lista_categoria_sql);

 return $lista_categoria;
}


//misma funcion pero con POO: 
public function getCategoriaId(){
 require_once 'bd_conexion.php';
 
 $sql_tramite= "SELECT * FROM categoria_tramite";
 $lista_categoria_sql= mysqli_query($conn, $sql_tramite);

 $lista_categoria= mysqli_fetch_assoc($lista_categoria_sql);

 return $lista_categoria;
}

/* EJEMPLO:

ejemplo conexion iet funcionando:
	$stmt = $conn->prepare("SELECT * FROM registrados WHERE fecha_registro LIKE ? and email = ? and status_turno = 1;");
		$stmt->bind_param("ss", $fecha2, $usuario);
		$stmt->execute();
		$stmt->bind_result($id_registrado, $nombre, $apellido, $dni, $email, $fecha_registro, $id_tipo_tramite, $tramite_id, $status_turno);
		if ($stmt->affected_rows) {
			$existe = $stmt->fetch();



 public static function obtenerTodas() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM persona");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
    DECLARACION CONEXION DDBB:
    <?php
$host = 'localhost';
$db   = 'mvc_ejemplo';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
    */
//-------------------------------------

public function getRegistrados(){
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

//-------------------------------------
