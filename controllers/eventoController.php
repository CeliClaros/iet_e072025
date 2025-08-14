<?php
// para ir maquetando el MVC , mover los archivos de header, footer, menu-bar y otros a la carpeta View > Layout o sólo View
    // selecciona-envia.php CONTIENE LA FUNCIONALIDAD DE RESERVA DE EVENTOS
    // y la vista de eventos reservados, que se muestra al usuario luego de reservar un evento.

    //notifica-dinamico4: contiene la funcionalidad que muestra la lista de eventos reservados por el usuario, 
    
    //===================
      //selecciona-envia.php:
      //VIEW: 


      //CONTROLLER: 

      //MODEL: 


      
    //===================

public function busca($usuario, $fecha2){
	//busca el evento actual del cliente, recién logueado y registrado hoy, para notificar status

	try {
		//include_once 'includes/funciones/bd_conexion.php';
//$mysqli = new mysqli("localhost", "root", "", "iet");

		$mysqli = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');

		$conn = $mysqli;

		//busca el Evento del Cliente:
		$stmt = $conn->prepare("SELECT * FROM registrados WHERE fecha_registro LIKE ? and email = ? and status_turno = 1;");
		$stmt->bind_param("ss", $fecha2, $usuario);
		$stmt->execute();
		$stmt->bind_result($id_registrado, $nombre, $apellido, $dni, $email, $fecha_registro, $id_tipo_tramite, $tramite_id, $status_turno);
		if ($stmt->affected_rows) {
			$existe = $stmt->fetch();



			$turno = array(
				'id_registrado' => $id_registrado,
				'nombre' => $nombre,
				'apellido' => $apellido,
				'dni' => $dni,
				'email' => $email,
				'fecha_registro' => $fecha_registro,
				'id_tipo_tramite' => $id_tipo_tramite,
				'tramite_id' => $tramite_id,
				'status_turno' => $status_turno,
				'fecha_consulta' => $fecha2
			);

			return $turno;
		}  //if rta query;

	} catch (Exception $e) {
		echo "Error: " . $e->getMessage();
	}
	;

	$stmt->close();
	$conn->close();

}
; //cierra function busca;

//fin function buscar.
    

/* EJEMPLO:
public function listar() {
        $personas = Persona::obtenerTodas();
        require './vista/personaView.php';
    }

*/


$evento = new Tramite($tramite_id, $nm_tramite, $fecha_tramite, $hora_evento, $id_tipo_tramite, $clave);


//Llama funcion para definir el Tipo Tramite:

public function defineTipoTramite($listar_rta) {
    $tipo_tramite = Evento::idTipoTramite($listar_rta);
     require '.views/views/eventoView.php'; // validar ruta
    //???? return $tipo_tramite;
}

//reemplazaría a este llamado de función sin POO:
$tipo_tramite= $evento->idTipoTramite($listar_rta);


//Llama a la función >> VER NOMBRE DE VARIABLE, SE REPITE CON EL NOMBRE DE LA INSTANCIA:
$evento= $evento->eventosHoy($listar_rta);
//se reemplaza por POO:

public function EventoReqHoy($listar_rta) {
    $evento = Evento::eventosHoy($listar_rta);
     require '.views/views/eventoView.php'; // validar ruta
    //???? return $tipo_tramite;
}


//============================================
//crea array para setear categorias
 $categoria=array();
 
 //Llama a la funcion del MODEL:
 
$lista_categoria= $evento->getCategoria();

public function traeCategoria($listar_rta) {
    $lista_categoria = Evento::getCategoria();
     require '.views/views/eventoView.php'; // validar ruta
    //???? return $tipo_tramite;
}

//=============================================
//VIEW 

?>

<?php
/*
EJEMPLO CODIGO CONTROLLER

require_once './modelo/Persona.php';

class PersonaController {
    public function formulario() {
        require './vista/formulario.php';
    }

    public function guardar() {
        if (isset($_POST['nombre']) && isset($_POST['edad'])) {
            $persona = new Persona($_POST['nombre'], $_POST['edad']);
            $persona->guardar();
        }
        $this->listar(); // Mostrar lista después de guardar
    }

    public function listar() {
        $personas = Persona::obtenerTodas();
        require './vista/personaView.php';
    }
}


*/?>