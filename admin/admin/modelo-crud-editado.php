<?php 
//VER SI ES NECESARIO USAR UNA COLUMNA MAS PARA EL DATO (COLUMNA EDITADO) ACTUALIZADO CON FECHA ACTUAL , PARA GUARDAR REGSTRO UNICO DE EDICION.
//include_once 'funciones/funciones.php';
	$usuario= $_POST['usuario'];
	$nombre = $_POST['nombre'];
	$password = $_POST['password'];
	$id_registro = $_POST['id_registro'];



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


if ($_POST['registro'] == 'nuevo') {			//SI ES UN NUEVO REGISTRO VA A EJECUTAR EL CÓDIGO QUE SIGUE: 
//if (isset($_POST['agregar-admin'])) {

	//	die(json_encode($_POST));	//die deja de ejecutar el código, lo que sigue no se ejecutará, para que no se inserte en la base porque es sólo `para mostrar la sentencia.

/*
	$usuario= $_POST['usuario'];
	$nombre = $_POST['nombre'];
	$password = $_POST['password'];
--lo comentamos porque está incluido arriba al inicio del archivo
*/	
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
		
	//include_once 'funciones/funciones.php';


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

		//	echo "$respuesta";

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




//-------------------------------------------
//SELECT PARA LOGIN: SIRVE PARA EDITAR O ACTUALIZAR:



//if (isset($_POST['registro'] == 'actualizar')) {	


if ($_POST['registro'] == 'actualizar') {	
//	die(json_encode($_POST))

try {



	if (empty($_POST['password'])) {
		
		//	$stmt = $conn->prepare('UPDATE admin_users SET usuario = ?, nombre = ? WHERE id_admin = ?');

			$stmt = $conn->prepare('UPDATE admin_users SET usuario = ?, nombre = ? WHERE id_admin = ?');
			//$stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $id_registro);
			$stmt->bind_param("ssi", $usuario, $nombre, $id_registro);


	}else{		// para el caso en que el password NO venga vacio.

			//1ro. hashea el passw y después lo actualiza en la base.
		/*HASHEO DE PASSW:
//para hashear las password: Cuanto más alto es el costo màs iteraciones requiere el hash para ser descifrado.
	//Tener en cuenta que un hash más alto requiere más consumo del server.
	$opciones = array(
		'cost' => 12
		);
*/




	//$hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);	// el 2do param es el algoritmo de hasheo, el 3er parámetro indica el costo que se aplica.
	$stmt = $conn->prepare('UPDATE admin_users SET usuario = ?, nombre = ? , password = ? WHERE id_admin = ?');
	//$stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $id_registro);
	$stmt->bind_param("sssi", $usuario, $nombre, $password, $id_registro);

	}



	$stmt->execute();
	if ($stmt->affected_rows) {	// si hubo filas afectadas, creamos una respuesta personalizada:
		$respuesta = array(
			'respuesta' => 'actualizado Correctamente!' ,
			'id_actualizado' => $stmt->insert_id 		//reporta el id ejecutado al final.
			 );
	}else{

		$respuesta = array(
			'respuesta' => 'error al actualizar!!'  );

	};

	$stmt->close();
	$conn->close();


} catch (Exception $e) {
	$respuesta = array('respuesta' => $e->getMessage() );


}

	die(json_encode($respuesta));
}


/*

//CODIGO TRAIDO DE LOGIN:



//if (isset($_POST['login-admin'])) {

	//die(json_encode($_POST));
/*
	$usuario = $_POST['usuario'];
	$password= $_POST['password'];
--lo comentamos porque está incluido arriba al inicio del archivo
* /
	

	try {

	//	include_once 'funciones/funciones.php';		--lo comentamos porque está incluido arriba al inicio del archivo

/*	
	if ($conn-> ping()) {
		echo "Conectado" . "<br>";
		# code...
	}else{

		echo "NO CONECTADOOO!!!! :/";
	}

* /
	$stmt = $conn->prepare("SELECT * FROM admin_users WHERE usuario = ?;");
	$stmt->bind_param("s", $usuario);
	$stmt->execute();	//ejecuta la enserción en la db, entonces se dará el sgte. mensaje en consola.
	$stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);


		if ($stmt->affected_rows) {
			$existe= $stmt->fetch();	//Fetch imprime los resultados de la consulta, que se guardan en stmt

	}


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
				}	* /
		}
	//}
	
	//}
}
	 catch (Exception $e) {
				echo "Error!!!!" . $e->getMessage();
	}

	//	die(json_encode($existe));

		die(json_encode($respuesta));
//} if de isset login-admin ,linea 124

//FIN CODIGO PARA LOGIN
*/

 //---------------------

//-------------------------

		//modelo para LOGIN.PHP qry-login-admin.php


	//	<?php 


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

		//include_once 'funciones/funciones.php';

		//probar conexion con ddbb test...

		$conn = new mysqli('localhost', 'root', '', 'test');
	if ($conn-> connect_error) {
		echo $error -> $conn ->connect_error;
		# code...
	}
 

/*	*/
	if ($conn-> ping()) {
		echo "Conectado" . "<br>";
		# code...
	}else{

		echo "NO CONECTADOOO!!!! :/";
	}


	$stmt = $conn->prepare("SELECT * FROM admin_users WHERE usuario = ?;");
	$stmt->bind_param("s", $usuario);
	$stmt->execute();	//ejecuta la enserción en la db, entonces se dará el sgte. mensaje en consola.
	$stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado);

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

		die(json_encode($respuesta));
}


 ?>