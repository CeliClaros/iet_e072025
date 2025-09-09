<?php
//ESTE OBJETO COINCIDE CON LA DDBB celina_iet actual
//tb categoria_tramite:

class categoria_tramite{

	public $id_tipo;
  	public $tipo_tramite;
  	public $icono;
		

  public function __construct($id_tipo = null, $tipo_tramite = null, $icono = null) {
		$this->$id_tipo = $id_tipo;
		$this->tipo_tramite = $tipo_tramite;
		$this->icono = $icono;
	}
}


//tb tramites:

class Tramites{

	public $tramite_id;
	public $nm_tramite;
	public $fecha_tramite;
  public $hora_evento;
  public $id_tipo_tramite;    
  public $clave;


  public function __construct($tramite_id = null, $nm_tramite = null, $fecha_tramite = null , $hora_evento = null, $id_tipo_tramite = null, $clave = null) {
		$this->tramite_id = $tramite_id;
		$this->nm_tramite = $nm_tramite;
		$this->fecha_tramite = $fecha_tramite;
    $this->$hora_evento = $hora_evento;
		$this->id_tipo_tramite = $id_tipo_tramite;
		$this->clave = $clave;
	}
}
