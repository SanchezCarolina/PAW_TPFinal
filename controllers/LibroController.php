<?php

require_once 'models/libro.php';
require_once 'models/oferta.php';
class libroController{
    
    public function index(){
        $libro = new Libro();
        $libros = $libro->getRecientes(5);
        $oferta = new Oferta();
        $ofertas = $oferta->getOfertasInicio(9);
        $vendido = new Libro();
        $vendidos = $libro->getMasVendidos(5);
       
        require_once 'views/libro/contenido_inicio.php';
    }
    
    public function gestion(){
        Utils::isAdmin();
        $libro = new Libro();
        $libros = $libro->getAll();
        
        require_once 'views/libro/gestion.php';
    }
    
    public function verLibros(){
        $libro = new Libro();
        $libros = $libro->getAll();
        $libros_x_pagina = 5;
        $total_libros_bd = $libros->rowCount();
        $paginas = $total_libros_bd / $libros_x_pagina;
        $paginas = ceil($paginas);
        
        require_once 'views/libro/verLibros.php';
    }
    
     public function verLibroIndividual(){
        if(isset($_GET['isbn'])){
            $isbn = $_GET['isbn'];
            $libro = new Libro();
            $libro->setIsbn($isbn);
            
            $oferta = new Oferta();
            $oferta->setIsbn($isbn);
            
            $ofer = $oferta->getOneLibroOferta();
            //$ofer = $oferta->getOne();
            //var_dump($ofer);
            $lib = $libro->getOne();
            if($ofer){
                //var_dump(true);
                require_once 'views/libro/oferta/verOfertaIndividual.php';
            }else{
                //var_dump(false);
                require_once 'views/libro/verLibroIndividual.php';
            }
            //var_dump($lib->isbn);
            //var_dump(Utils::isEnOferta($isbn));
            
        }
        //require_once 'views/libro/verLibroIndividual.php';
    }
    
    public function cargar(){
        Utils::isAdmin();
        require_once 'views/libro/cargar.php';
    }
    
   public function save(){
        
        if(isset($_POST)){
            $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : false;
            $genero = isset($_POST['genero']) ? $_POST['genero'] : false;
            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
            $autor = isset($_POST['autor']) ? $_POST['autor'] : false;
            $portada = isset($_POST['portadaForm']) ? $_POST['portadaForm'] : false;  
            $fecha_carga = isset($_POST['fecha_carga']) ? $_POST['fecha_carga'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $resenia = isset($_POST['resenia']) ? $_POST['resenia'] : false;
            
            if($isbn && $genero && $titulo && $autor  && $fecha_carga && $precio && $stock && $resenia){
                $libro = new Libro();
            
                $libro->setIsbn($isbn);
                $libro->setGenero($genero);
                $libro->setTitulo($titulo);
                $libro->setAutor($autor);
                $libro->setPortada($portada);
                $libro->setFecha_carga($fecha_carga);
                $libro->setPrecio($precio);
                $libro->setStock($stock);
                $libro->setResenia($resenia);
                
                $lib = $libro->getOne();
                
                if(isset($_GET['isbn'])){
                    $isbn = $_GET['isbn'];
                    $libro->setIsbn($isbn);
                   
                    $save = $libro->edit(); //guardo en la BD los cambios que me llegan (actualizo datos)
                    
                    if($save){
                        $_SESSION['edit'] = 'complete';
                    }else{
                        $_SESSION['edit'] = 'failed';
                    }
                    
                }else{
                    if($lib){
                        $save = false;
                    }else{
                        $save = $libro->save(); //creo un nuevo libro en la BD (inserto datos)
                    }
                    if($save){
                        $_SESSION['libro'] = 'complete';
                    }else{
                        $_SESSION['libro'] = 'failed';
                    }
                }
            }
            else{
                $_SESSION['libro'] = 'failed'; 
            }
        }else{
           $_SESSION['libro'] = 'failed';  
        }
        
        header("Location:".base_url.'libro/gestion');
    }
    
    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['isbn'])){
            $isbn = $_GET['isbn'];
            $edit = true;
            
            $libro = new Libro();
            $libro->setIsbn($isbn);
            
            $lib = $libro->getOne();
            require_once 'views/libro/cargar.php';
        }else{
            header("Location:".base_url."libro/gestion");
        }
    }
    
    public function eliminar(){
        Utils::isAdmin();
        
        if(isset($_GET['isbn'])){
            $isbn = $_GET['isbn'];
            $libro = new Libro();
            $libro->setIsbn($isbn);
            
            $oferta = new Oferta();
            $oferta->setIsbn($isbn);
            
            $ofer = $oferta->delete();
            $delete = $libro->delete();
            
            if($delete && $ofer){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        
        header("Location:".base_url."libro/gestion");
    }
    
    public function filtrar(){
        if(isset($_POST)){
            $search = isset($_POST['search']) ? $_POST['search'] : false;
            
            $libro = new Libro();
            $filtro = $libro->getSearch($search);
            
            //var_dump($filtro);
            require_once 'views/libro/verLibros.php';
        }
    }
    
    public function vista(){
        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            
            require_once 'views/libro/vistaPrevia.php';

        } else {
            header("Location: " . base_url);
        }
    }
    
}