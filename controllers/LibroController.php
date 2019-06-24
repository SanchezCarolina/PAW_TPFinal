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
        
        if(isset($_POST)){
            $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : false;
            $genero = isset($_POST['genero']) ? $_POST['genero'] : false;
            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
            $autor = isset($_POST['autor']) ? $_POST['autor'] : false;
            $portada = isset($_POST['portadaForm']) ? $_POST['portadaForm'] : false;  
            $fecha_carga = isset($_POST['fecha_carga']) ? $_POST['fecha_carga'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $reseña = isset($_POST['reseña']) ? $_POST['reseña'] : false;
            
            if($isbn && $genero && $titulo && $autor  && $fecha_carga && $precio && $stock && $reseña){
                $libro = new Libro();
            
                $libro->setIsbn($isbn);
                $libro->setGenero($genero);
                $libro->setTitulo($titulo);
                $libro->setAutor($autor);
                $libro->setPortada($portada);
                $libro->setFecha_carga($fecha_carga);
                $libro->setPrecio($precio);
                $libro->setStock($stock);
                $libro->setReseña($reseña);
                
                //guardar imagen de la portada
                /*
                $file = $_FILES['portadaForm'];
                $filename = $file['name'];
                $mimetype = $file['type'];
                
                if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png'){
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images', 0777, true);
                    }
                    
                    $libro->setPortada($filename);
                    move_uploaded_file($file['tmp_name'], 'uploads/images'.$filename);
                }
                 * */
              
                
                $save = $libro->save();
                if($save){
                    $_SESSION['libro'] = 'complete';
                }else{
                    $_SESSION['libro'] = 'failed';
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
            
            $delete = $libro->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        
        header("Location:".base_url."libro/gestion");
    }
    
    
}