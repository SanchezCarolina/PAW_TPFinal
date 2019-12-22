<?php
// Este archivo se va a encargar de recoger los parámetros de la URL y ver a que controlador pertenece
session_start();	//para tener la sesion iniciada en todo el proyecto
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';

function mostrar_error(){
    $error = new errorController();
    $error->index();
}

if(isset($_GET['controller'])){                            //compruebo que llegue un controlador por la url
	$nombre_controlador = $_GET['controller'].'Controller';
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){	//si no llega ningun controlador, que cargue el controlador y la accion por defecto
    $nombre_controlador = controller_default;
}else{
	mostrar_error();
	exit();
}

if(class_exists($nombre_controlador)){	         //compruebo que exista esa clase
	$controlador = new $nombre_controlador();
	
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){   //compruebo si llega una 
		$action = $_GET['action'];                                               //accion y si el metodo 
		$controlador->$action();                                               //existe dentro del controlador
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();
    }else{
        mostrar_error();
    }
}else{
    mostrar_error();
}    

require_once 'views/layout/footer.php';
