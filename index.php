<?php
require_once 'autoload.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';

function mostrar_error(){
    $error = new errorController();
    $error->index();
}

if(isset($_GET['controller'])){                            //compruebo que llegue un controlador por la url
	$nombre_controlador = $_GET['controller'].'Controller';
}else{
	$error = new errorController();
    $error->index();
	exit();
}

if(class_exists($nombre_controlador)){	         //compruebo que exista esa clase
	$controlador = new $nombre_controlador();
	
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){   //compruebo si llega una 
		$action = $_GET['action'];                                               //accion y si el metodo 
		$controlador->$action();                                               //existe dentro del controlador
	}else{
        $error = new errorController();
    $error->index();
    }
}else{
    $error = new errorController();
    $error->index();
}    

require_once 'views/layout/footer.php';
