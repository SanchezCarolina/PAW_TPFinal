<?php

require_once 'models/libro.php';
class libroController{
    
    public function index(){
        require_once 'views/libro/contenido_inicio.php';
    }
    
    public function gestion(){
        Utils::isAdmin();
        $libro = new Libro();
        $libros = $libro->getAll();
        require_once 'views/libro/gestion.php';
    }
    
    public function cargar(){
        Utils::isAdmin();
        require_once 'views/libro/cargar.php';
    }
    
    public function save(){
        
    }
    
    
}