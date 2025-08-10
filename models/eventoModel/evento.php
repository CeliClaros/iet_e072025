<?php
//CREAR NUEVA DDBB: iet_e072025

//tb categoria_tramite crear nueva ddbb tb categoriaEvento:
class categoriaEvento(){

	public $id_tipo;
	public $tipo_evento;
	public $icono;

	public function __construct($id_tipo = null, $tipo_evento = null, $icono = null) {
		$this->$id_tipo = $id_tipo;
		$this->tipo_evento = $tipo_tramite;
		$this->icono = $icono;
	}
}

//tb tramites crear nueva ddbb tb Evento:
class Evento(){

    public $evento_id;
	public $nm_evento;
	public $fecha_evento;
    public $hora_evento;
    public $id_tipo_evento;    
    public $nm_clave;


  public function __construct($tramite_id = null, $nm_tramite = null, $fecha_tramite = null , $hora_evento = null, $id_tipo_tramite = null, $clave = null) {
		$this->evento_id = $evento_id;
		$this->nm_evento = $nm_evento;
		$this->fecha_evento = $fecha_evento;
        $this->$hora_evento = $hora_evento;
		$this->id_tipo_evento = $id_tipo_evento;
		$this->nm_clave = $nm_clave;
	}
}

?>