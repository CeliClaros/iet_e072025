<?php 
//VER SI ES NECESARIO USAR UNA COLUMNA MAS PARA EL DATO (COLUMNA EDITADO) ACTUALIZADO CON FECHA ACTUAL , PARA GUARDAR REGSTRO UNICO DE EDICION.
//PROBAR CON DDBB TEST



include_once 'admin_area.php';


if (isset($_POST['login-admin'])) {

	//die(json_encode($_POST));

	$usuario = $_POST['usuario'];
	$password= $_POST['password'];


	//include_once 'funciones/funciones.php';
/*
	$query = "SELECT * FROM libros";
	$result = $db->query($query);


	$result = $db->query($query);
	$numfilas = $result->num_rows;
	echo "El número de elementos es ".$numfilas;
	$result->free();
	$db->close();

*/

	/*

	1.CONECTA A LA DDBB, 
	2. HACE LA query
	3. TRAE LOS DATO!!!
	4. LIBERA Y DESCONECTA:
*/


/* LOGIN USER, FUNCIONA:		

	$conn = new mysqli('localhost', 'root', '', 'iet');
	if ($conn-> connect_error) {
		echo $error -> $conn ->connect_error;
		# code...
	}


	$query = "SELECT * FROM admin_users";
	$result = $conn->query($query);

	$result = $conn->query($query);
	$numfilas = $result->num_rows;
	echo "El número de elementos es ".$numfilas;

	$fila = $result->fetch_object();

	//echo "".$fila->ISBN."";
	echo "".$fila->usuario."";
?>

	<pre>
		
	<?php var_dump($result) ?>

	</pre>

<?php 
	$result->free();
	$conn->close();

	die(json_encode($_POST));
*/




///------------------------------------------------------------

	

	try {

		include_once 'funciones/funciones.php';
/*	
				$conn = new mysqli('localhost', 'root', '', 'test');
	if ($conn-> connect_error) {
		echo $error -> $conn ->connect_error;
		# code...
	}
 



	if ($conn-> ping()) {
		echo "Conectado" . "<br>";
		# code...
	}else{

		echo "NO CONECTADOOO!!!! :/";
	}
*/

	//$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?;");

	$stmt = $conn->prepare("SELECT * FROM admin_users WHERE usuario = ?;");
	$stmt->bind_param("s", $usuario);
	$stmt->execute();	//ejecuta la enserción en la db, entonces se dará el sgte. mensaje en consola.
	$stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);

	//	$stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado);

//echo($password_admin);
/*
  while ($stmt->fetch()) {
        printf ("%s (%s)\n", $nombre_admin, $password_admin);
    }


*/

		if ($stmt->affected_rows) {
			$existe= $stmt->fetch();	//Fetch imprime los resultados de la consulta, que se guardan en stmt

	}

//	die(json_encode($existe));
   

   /* obtener los valores 
    while ($sentencia->fetch()) {
        printf ("%s (%s)\n", $nombre, $código);
    }*/

       /* obtener los valores */
 /*   while ($stmt->fetch()) {
        printf ("%s (%s)\n", $nombre_admin, $password_admin);
    }		*/


			if ($existe) {
				if ($password == $password_admin) {	

					echo 'EXITOSO!!';
				//if (password_verify($password, $password_admin)) {		//función para validar passw. Realiza la conversión a hash y compara. (param: passw que ingresa el usuario y pass de la ddbb)

						//echo 'Puede iniciar sesion';

					$respuesta = array(
						'respuesta' => 'exitoso',
						'usuario' => $nombre_admin
						);
							//$respuesta = array('respuesta' => 'si_existe');
					}else{
					$respuesta = array('respuesta' => 'Error!!');				// 'password_incorrecta');  // Cambiar por msj ERROR!!
					}
			/*		}else{
				$respuesta = array('respuesta' => 'no_existe');  // Cambiar por msj ERROR!! min:10:32 vs745
				}	*/
		}
	//}
	
	//}
}
	 catch (Exception $e) {
				echo "Error!!!!" . $e->getMessage();
	}

	//	die(json_encode($existe));

		require 'admin_area.php';		// te lleva al 'Panel de control Admin', incluir primero al inicio de este archivo con include_once.
		//die(json_encode($respuesta));
}


 ?>