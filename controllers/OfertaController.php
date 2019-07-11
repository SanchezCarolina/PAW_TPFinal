<?php

require_once 'models/oferta.php';
require_once 'models/libro.php';


class ofertaController{
    
    public function gestion(){
        Utils::isAdmin();
        $oferta = new Oferta();
        $ofertas = $oferta->getAll();
        //var_dump($ofertas);
        require_once 'views/libro/oferta/gestion.php';
    }
    
    public function crearOferta(){
        Utils::isAdmin();
        if(isset($_GET['isbn'])){
            $isbn = $_GET['isbn'];
            
            $libro = new Libro();
            $libro->setIsbn($isbn);
            
            $lib = $libro->getOne();
            require_once 'views/libro/oferta/crear.php';
        }else{
            header("Location:".base_url."libro/gestion");
        }
    }
    
    public function verOfertas(){
        $oferta = new Oferta();
        $ofertas = $oferta->getLibroOferta();
        require_once 'views/libro/oferta/verOfertas.php';
    }
    
    public function verOfertaIndividual(){
        if(isset($_GET['isbn'])){
            $isbn = $_GET['isbn'];
            $libro = new Oferta();
            $libro->setIsbn($isbn);
            
            $ofer = $libro->getOneLibroOferta();
        }
        require_once 'views/libro/oferta/verOfertaIndividual.php';
    }
    public function save(){
        
        if(isset($_POST)){
            $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : false;
            $descuento = isset($_POST['descuento']) ? $_POST['descuento'] : false;
            
            
            if($isbn && $descuento){
                $oferta = new Oferta();
            
                $oferta->setIsbn($isbn);
                $oferta->setDescuento($descuento);
                
                $ofer = $oferta->getOneLibroOferta();
                
                if(isset($_GET['isbn'])){
                    $isbn = $_GET['isbn'];
                    $oferta->setIsbn($isbn);
                   
                    $save = $oferta->edit();
                    if($save){
                    $_SESSION['edit'] = 'complete';
                    }else{
                        $_SESSION['edit'] = 'failed';
                    }
                }else{
                    if($ofer){                          //para controlar si el libro ya esta en oferta
                        $save = false;
                    }else{
                        $save = $oferta->save();
                    }
                    
                   if($save){
                        $_SESSION['oferta'] = 'complete';
                   }else{
                        $_SESSION['oferta'] = 'failed';
                    }
                }
                
            }
            else{
                $_SESSION['oferta'] = 'failed'; 
            }
        }else{
           $_SESSION['oferta'] = 'failed';  
        }
        header("Location:".base_url.'oferta/gestion');
    }
    
    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['isbn'])){
            $isbn = $_GET['isbn'];
            $edit = true;
            
            $oferta = new Oferta();
            $oferta->setIsbn($isbn);
            $libro = new Libro();
            $libro->setIsbn($isbn);
            
            $ofer = $oferta->getOne();
            $lib = $libro->getOne();
            require_once 'views/libro/oferta/crear.php';
        }else{
            header("Location:".base_url."oferta/gestion");
        }
    }
    
    public function eliminar(){
        Utils::isAdmin();
        
        if(isset($_GET['isbn'])){
            $isbn = $_GET['isbn'];
            $oferta = new Oferta();
            $oferta->setIsbn($isbn);
            
            $delete = $oferta->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        
        header("Location:".base_url."oferta/gestion");
    }
    
    public function filtrar(){
        if(isset($_POST)){
            $search = isset($_POST['search']) ? $_POST['search'] : false;
            
            $oferta = new Oferta();
            $filtro = $oferta->getSearch($search);
            
            //var_dump($filtro);
            require_once 'views/libro/oferta/verOfertas.php';
        }
    }
}

