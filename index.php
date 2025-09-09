<?php 
header("Location: views/seccion-registro.php");

if(isset($_GET['c'])){
    require_once "controladores/inicio.controlador.php";
    $controlador = new InicioControlador();
    call_user_func(callback: array($controlador, $_GET['C']));
}else{
    $controlador = $_GET['c'];
    require_once "controladores/$controlador.controlador.php";
    $controlador =ucwords($controlador)."Controlador";
    $controlador = new $controlador();  
    $accion = isset($_GET['A']) ? $_GET['A'] : 'index';
    call_user_func(array($controlador, $accion));

}


?>