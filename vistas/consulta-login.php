<?php
session_start();
error_reporting(0);
if (isset($_POST['login-user'])) {
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	try {
		include_once '../modelos/bd_conexion.php';
		$stmt = $conn->prepare("SELECT * FROM cliente WHERE email = ?;");
		$stmt->bind_param("s", $usuario);
		$stmt->execute();	//ejecuta la consulta en la db, entonces se dará el sgte. mensaje en consola.
		//VER LOS CAMPOS QUE TRAE TB CLIENTE SON MAS!!! AGREGAR!!!
		$stmt->bind_result($id_cliente, $nm_cliente, $ap_cliente, $dni, $password_base, $email, $celular);
		if ($stmt->affected_rows) {
			$existe = $stmt->fetch();	//Fetch imprime los resultados de la consulta, que se guardan en stmt

			if ($password == $password_base) {

				session_start();

				$_SESSION['id_cliente'] = $id_cliente;
				$_SESSION['nombre'] = $nm_cliente;
				$_SESSION['apellido'] = $ap_cliente;
				$_SESSION['dni'] = $dni;
				$_SESSION['password'] = $password_base;
				$_SESSION['email'] = $email;
				$_SESSION['celular'] = $celular;

				// Redireccionar a la página de eventos reservados
				header("Location: ../vistas/eventos-reservados.php");
				exit();

			} else {
				require '../vistas/login_user.php';
				$respuesta = array('respuesta' => 'Error!!');				// 'password_incorrecta');  // Cambiar por msj ERROR!!
			}
		} //end if
	} catch (Exception $e) {
		echo "Error!!!!" . $e->getMessage();
	}

}

?>