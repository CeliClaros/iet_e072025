
<?php

//FUNCION consulta-loginModel.php   trae los datos de usuario para iniciar sesión

include_once 'bd_conexion.php';


//include_once 'includes/templates/header-barra.php';

//Recibe el mail de inicio de sesion para validar en ddbb y permitir iniciar sesion:

function consulta-login($email, $arg_1, $arg_2, /* ..., */ $arg_n)
{
    	$stmt = $conn->prepare("SELECT * FROM cliente WHERE email = ?;");
    	
    	
    echo "Ejemplo de función.\n";
    return $retval;
}



//----------------

<?php 
session_start();
error_reporting(0);
if (isset($_POST['login-user'])) {


	$usuario = $_POST['usuario'];
	$password= $_POST['password'];


	/*

	1.CONECTA A LA DDBB, 
	2. HACE LA query
	3. TRAE LOS DATOS!!!
	4. LIBERA Y DESCONECTA:
* /


//CONECTA CON LA DDBB:

	$conn = new mysqli('localhost', 'root', '', 'iet');
	if ($conn-> connect_error) {
		echo $error -> $conn ->connect_error;  }


	$query = "SELECT * FROM admin_users";
	$result = $conn->query($query);

	$result = $conn->query($query);
	$numfilas = $result->num_rows;
	echo "El número de elementos es ".$numfilas;

	$fila = $result->fetch_object();


	echo "".$fila->usuario."";
?>



<?php 
	$result->free();        //eliminar???
	$conn->close();         //eliminar???

	die(json_encode($_POST));       //eliminar??

*/

	try {

		//include_once 'funciones/funciones.php';
		include_once 'includes/funciones/bd_conexion.php';


//Prepara la query:

		$stmt = $conn->prepare("SELECT * FROM cliente WHERE email = ?;");

//enlaza con los parámetros y ejecuta:

		$stmt->bind_param("s", $usuario);
		$stmt->execute();	//ejecuta la sentencia en la db, entonces se dará el sgte. mensaje en consola.
	//resultado:
	
		$stmt->bind_result($id_cliente, $nm_cliente, $ap_cliente, $dni, $password_base, $email, $celular );
		if ($stmt->affected_rows) {
			$existe= $stmt->fetch();	//Fetch imprime los resultados de la consulta, que se guardan en stmt

		//	if ($existe) {


				if ($password == $password_base) {	

					session_start();  //inicia sesion
 					
					// initialize session variables:


					$_SESSION['id_cliente'] = $id_cliente;
					$_SESSION['nombre'] = $nm_cliente;
					$_SESSION['apellido'] = $ap_cliente;
					$_SESSION['dni'] = $dni;
					$_SESSION['password'] = $password_base;
					$_SESSION['email'] = $email;
					$_SESSION['celular'] = $celular;
/

//$id_cliente, $nm_cliente, $ap_cliente, $dni, $password_base, $email, $celular 



					//echo 'EXITOSO!!';

					//LLAMA A LA PAGINA SIGUIENTE:
				
						require 'eventos-reservados.php';


						// 'Puede iniciar sesion';

					$respuesta = array(
						'respuesta' => 'exitoso',
						'usuario' => $nm_cliente
						);
							
					}else{
								require 'login_user.php';
						
					$respuesta = array('respuesta' => 'Error!!');				
					}
			
		} //end if
	}
	
	 catch (Exception $e) {
				echo "Error!!!!" . $e->getMessage();


	}


}





 ?>