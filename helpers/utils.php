<?php

class Utils{
    public static function deleteSession($name){        //para borrar los mensajes de sesion de las vistas cuando se actualiza la pantalla
        
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);    
        }
        return $name;
    }
    
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }
	
    public static function isIdentity(){
        if(!isset($_SESSION['identity'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }
    
    
    public static function statsCarrito(){
        $stats = array(
            'count'=>0,
            'total'=>0
        );
        
        if(isset($_SESSION['carrito'])){
            $stats['count'] = count($_SESSION['carrito']);
            
            foreach ($_SESSION['carrito'] as $libro){
                $stats['total'] += $libro['precio']*$libro['unidades'];
            }
        }
        return $stats;
    }
    
    public static function showStatus($status){
        $value = 'Pendiente';
        switch ($status) {
            case "confirm":
                $value = 'Pendiente';
                return $value;
                break;
            case "preparation":
                $value = 'En preparación';
                return $value;
                break;
            case "ready":
                $value = 'Preparado para enviar';
                return $value;
                break;
            case "sended":
                $value = 'Enviado';
                return $value;
                break;
            default:
                return $value;
                break;
        }
    }
    
    public static function noStock($s){
        return $s;
    }
    
    public static function showLibros($isbn){
        require_once 'models/libro.php';
        $libro = new Libro();
        $precio = $libro->getOnePrecio($isbn);
        return $precio;
    }
 
    public static function existeEnOferta($isbn){
        require_once 'models/libro.php';
        
        $libro = new Libro();
        $existe = $libro->existeEnOferta($isbn);
        if($existe->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}