<?php 

//ABRE LA CONEXIÓN RECIÉN EN EL TRY:
//include_once 'funciones/funciones.php';


/* 	COMPRUEBA QUE ESTÁ CONECTADO A LA DDBB:  


	if ($conn-> ping()) {
		echo "Conectado" . "<br>";
		# code...
	}else{

		echo "NO CONECTADOOO!!!! :/";
	}
	*/

if (isset($_POST['agregar-admin'])) {

	//	die(json_encode($_POST));	//die deja de ejecutar el código, lo que sigue no se ejecutará, para que no se inserte en la base porque es sólo `para mostrar la sentencia.

	$usuario= $_POST['usuario'];
	$nombre = $_POST['nombre'];
	$password = $_POST['password'];

	
//Hass costo 10 por default:
	//$password_hashed = password_hash('$password', PASSWORD_BCRYPT);

	//	$opciones = array('cost' => 12 , );

	//$password_hashed = password_hash('$password', PASSWORD_BCRYPT, $opciones);
	echo "Usuario Admin Insertado Correctamente". "<br>";

	echo "USUARIO" . "$usuario";
	echo "<br>";
	echo "NOMBRE: " . "$nombre";
	echo "<br>";
	echo "PASSW: " ."$password";

	//echo "$password_hashed";


	try {
		
	include_once 'funciones/funciones.php';


	if ($conn-> ping()) {
		echo "Conectado" . "<br>";
		# code...
	}else{

		echo "NO CONECTADOOO!!!! :/";
	}
	




	$stmt = $conn->prepare("INSERT INTO admin_users(usuario, nombre, password) VALUES(?, ?, ?)");
	$stmt->bind_param("sss", $usuario, $nombre, $password);					//$password_hashed);
	$stmt->execute();	//ejecuta la enserción en la db, entonces se dará el sgte. mensaje en consola.

	//echo($stmt);

	$id_registro = $stmt->insert_id;
	echo "REGISTRO: " . "$id_registro" . "<br>";

	$fila = $stmt->affected_rows;
	echo  "FILA: " . "$fila";
		echo "<br>";

		$id_registro = $stmt->insert_id;

		if ($stmt->affected_rows) {
		//if ($id_registro > 0) {
			$respuesta = array(
			'respuesta' => 'exito' ,
			'id_admin' => $id_registro);		// $stmt );

			die(json_encode($respuesta));

			echo "$respuesta";

		} else{
			$respuesta = array(
			'respuesta' => 'error' );

		}

	

	$stmt->close();
	$conn->close();

	} catch (Exception $e) {
		echo "Error!!!!" . $e->getMessage();

	}
				die(json_encode($respuesta));

}

