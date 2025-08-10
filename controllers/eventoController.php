<?php
/*
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