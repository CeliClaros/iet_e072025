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
	$password_hashed = password_hash('$password', PASSWORD_BCRYPT);

	//	$opciones = array('cost' => 12 , );

	//$password_hashed = password_hash('$password', PASSWORD_BCRYPT, $opciones);
	echo "Usuario Admin Insertado Correctamente". "<br>";

	echo "USUARIO" . "$usuario";
	echo "<br>";
	echo "NOMBRE: " . "$nombre";
	echo "<br>";
	echo "$password_hashed";


	try {
		
	include_once 'funciones/funciones.php';


	if ($conn-> ping()) {
		echo "Conectado" . "<br>";
		# code...
	}else{

		echo "NO CONECTADOOO!!!! :/";
	}
	




	$stmt = $conn->prepare("INSERT INTO admins(usuario, nombre, password) VALUES(?, ?, ?)");
	$stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
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






/*
echo "<pre>";
var_dump($_POST);
echo "</pre> ";
*/


   // include_once 'templates/footer.php';

?>

<?php /* COMIENZA LA OPCION DE LOGIN : */

 
if (isset($_POST['login-admin'])) {

	//die(json_encode($_POST));

	$usuario = $_POST['usuario'];
	$password= $_POST['password'];

	//die(json_encode($_POST));

	try {

		include_once 'funciones/funciones.php';

/*
	if ($conn-> ping()) {
		echo "Conectado" . "<br>";
		# code...
	}else{

		echo "NO CONECTADOOO!!!! :/";
	}
	*/

	$stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?;");
	$stmt->bind_param("s", $usuario);
	$stmt->execute();	//ejecuta la enserción en la db, entonces se dará el sgte. mensaje en consola.
	$stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);

		if ($stmt->affected_rows) {
			$existe= $stmt->fetch();	//Fetch imprime los resultados de la consulta, que se guardan en stmt
echo "EXISTE: " . "$existe";
/*
echo "".$respuesta->respuesta."";
echo "".$respuesta->usuario."";

echo "".$respuesta->usuario."";

*/
//echo "".$stmt->$password_admin."";



			if ($existe) {

			//	$fila = $result->fetch_object();
					//$fila = $stmt->mysqli_fetch_object();

				//echo "".$fila->ISBN."";
			//	echo "".$fila->usuario."";

					//echo "".$existe->usuario."";

//$verifica= password_verify($password, $password_admin);
//echo "VALIDACION: " . "$verifica";
//echo "VALIDACION: " . "$verifica";  
				if (password_verify($password, $password_admin)) {	echo "VALIDACION: EXISTOSA!! " . "  ";
					//función para validar passw. Realiza la conversión a hash y compara. (param: passw que ingresa el usuario y pass de la ddbb)
					$respuesta = array(
						'respuesta' => 'exitoso',
						'usuario' => $nombre_admin
						);
echo "".$respuesta->respuesta."";
echo "".$respuesta->usuario."";
							//$respuesta = array('respuesta' => 'si_existe');
						} else{
					$respuesta = array('respuesta' => 'password_incorrecta');  // Cambiar por msj ERROR!!
		
				}	

			/*	else{
				$respuesta = array('respuesta' => 'no_existe');  // Cambiar por msj ERROR!! min:10:32 vs745
				}
*/		}  
	}
	
	} catch (Exception $e) {
				echo "Error!!!!" . $e->getMessage();
	}
		die(json_encode($respuesta));
}


 ?>

 

