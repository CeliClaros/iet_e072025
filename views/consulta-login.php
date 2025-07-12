<?php 
session_start();
error_reporting(0);
if (isset($_POST['login-user'])) {
//if (isset($_POST['login-admin'])) {

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
* /
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

	try {

		//include_once 'funciones/funciones.php';
		include_once 'includes/funciones/bd_conexion.php';

/*	
	if ($conn-> ping()) {
		echo "Conectado" . "<br>";
		# code...
	}else{

		echo "NO CONECTADOOO!!!! :/";
	}

*/
//	$stmt = $conn->prepare("SELECT * FROM test WHERE usuario = ?;");
		$stmt = $conn->prepare("SELECT * FROM cliente WHERE email = ?;");
	//$stmt = $conn->prepare("SELECT * FROM admin_users WHERE usuario = ?;");
		$stmt->bind_param("s", $usuario);
		$stmt->execute();	//ejecuta la enserción en la db, entonces se dará el sgte. mensaje en consola.
		//$stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);
		//VER LOS CAMPOS QUE TRAE TB CLIENTE SON MAS!!! AGREGAR!!!
		$stmt->bind_result($id_cliente, $nm_cliente, $ap_cliente, $dni, $password_base, $email, $celular );
		if ($stmt->affected_rows) {
			$existe= $stmt->fetch();	//Fetch imprime los resultados de la consulta, que se guardan en stmt

		//	if ($existe) {




				if ($password == $password_base) {	

					session_start();
 					
/*					// initialize session variables
					$_SESSION['logged_in_user_id'] = '1';
					$_SESSION['logged_in_user_name'] = 'Tutsplus';
					 */
/*					// access session variables
					echo $_SESSION['logged_in_user_id'];
					echo $_SESSION['logged_in_user_name'];
*/

					$_SESSION['id_cliente'] = $id_cliente;
					$_SESSION['nombre'] = $nm_cliente;
					$_SESSION['apellido'] = $ap_cliente;
					$_SESSION['dni'] = $dni;
					$_SESSION['password'] = $password_base;
					$_SESSION['email'] = $email;
					$_SESSION['celular'] = $celular;
/*
*/
					//$id_cliente, $nm_cliente, $ap_cliente, $dni, $password_base, $email, $celular 




					//echo 'EXITOSO!!';

					//LLAMA A LA PAGINA SIGUIENTE:
					//doc:
					//require 'registro_borrador_ajax5.php';
					//require 'selecciona-envia.php';
						require 'eventos-reservados.php';

				//if (password_verify($password, $password_admin)) {		//función para validar passw. Realiza la conversión a hash y compara. (param: passw que ingresa el usuario y pass de la ddbb)

						//echo 'Puede iniciar sesion';

					$respuesta = array(
						'respuesta' => 'exitoso',
						'usuario' => $nm_cliente
						);
							//$respuesta = array('respuesta' => 'si_existe');
					}else{
								require 'login_user.php';
								//require 'registro-user.php';
								/*
								echo("Usuario o Passw incorrectos, Vuelva a intentarlo por favor");
								echo $_SERVER['PHP_SELF'];  */

					$respuesta = array('respuesta' => 'Error!!');				// 'password_incorrecta');  // Cambiar por msj ERROR!!
					}
			/*		}else{
				$respuesta = array('respuesta' => 'no_existe');  // Cambiar por msj ERROR!! min:10:32 vs745
				}	*/
		} //end if
	}
	
	 catch (Exception $e) {
				echo "Error!!!!" . $e->getMessage();


	}

	//	die(json_encode($existe));

		//die(json_encode($respuesta));
		//require 'admin_area.php';
		//require 'seccion-registro.php';
		//require 'index.php';
		//require 'registro_borrador_ajax5.php';
}
//}




 ?>