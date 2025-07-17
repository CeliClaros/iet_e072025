<?php 


//no funcaaaaa!!!!

/* 
include_once 'funciones/funciones.php';

	//COMPRUEBA QUE ESTÁ CONECTADO A LA DDBB:

	if ($conn-> ping()) {
		echo "Conectado" . "<br>";
		# code...
	}else{

		echo "NO CONECTADOOO!!!! :/";

	}
	*/


if (isset($_POST['agregar-admin'])) {

	//	die(json_encode($_POST));	//die deja de ejecutar el código, lo que sigue no se ejecutará, para que no se inserte en la base
	// porque es sólo `para mostrar la sentencia.

	$usuario= $_POST['usuario'];
	$nombre = $_POST['nombre'];
	$password = $_POST['password'];

	//Hass costo 10 por default:
	//$password_hashed = password_hash('$password', PASSWORD_BCRYPT);

	//	$opciones = array('cost' => 12 , );

	include_once 'funciones/funciones.php';

	//INSERT INTO admins(usuario, nombre, password) VALUES($usuario, $nombre, $password_hashed);

try {
		//$stmt = $conn->prepare("INSERT INTO admins(usuario, nombre, password) VALUES(?, ?, ?)");
	$stmt = $conn->prepare("INSERT INTO admin_users(usuario, nombre, password) VALUES(?, ?, ?)");
	$stmt->bind_param("sss", $usuario, $nombre, $password); //$password_hashed);//$stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
	
	$stmt->execute();

	echo "$stmt->affected_rows";
/*

		if ($stmt->affected_rows) {
			$respuesta = array(
			'respuesta' => 'exito' ,
			'id_admin' => $stmt );

		//	die(json_encode($respuesta));

		} else{
			$respuesta = array(
			'respuesta' => 'error' );

		}

*/
	$stmt->close();
	$conn->close();

} catch (Exception $e) {
	echo "OJO!, no se insertó!!!!";
}






/*
	$stmt = $conn->prepare("INSERT INTO admins(usuario, nombre, password) VALUES(?, ?, ?)");
	$stmt->bind_param("sss", $usuario, $nombre, $password_hashed);

*/
	


	//$password_hashed = password_hash('$password', PASSWORD_BCRYPT, $opciones);
	echo "Usuario Admin Insertado Correctamente". "<br>";
	echo "$password";
//	echo "$password_hashed";


	

}






/*
echo "<pre>";
var_dump($_POST);
echo "</pre> ";
*/

 ?>

 