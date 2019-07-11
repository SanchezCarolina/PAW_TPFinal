<?php

require_once 'models/libro.php';

class carritoController {

    public function index() {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = array();
        }
        $sinStock = false;
        require_once 'views/carrito/index.php';
    }

    public function add() {
        if (isset($_GET['isbn'])) {
            $libro_isbn = $_GET['isbn'];
        } else {
            header("Location: " . base_url);
        }
        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['isbn'] == $libro_isbn) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }
        if (!isset($counter) || $counter == 0) {
            //conseguir el producto (libro)
            $libro = new Libro();
            $libro->setIsbn($libro_isbn);
            $lib = $libro->getOne();
            //Añadir al carrito
            if (is_object($lib)) {
                if($lib->stock == 0){
                    $sin_stock = true;
                    require_once 'views/libro/verLibroIndividual.php';
                }else{
                    $_SESSION['carrito'][] = array(
                        "isbn" => $lib->isbn,
                        "precio" => $lib->precio,
                        "unidades" => 1,
                        "libro" => $lib
                    );
                }
            }
        }
        header("Location: " . base_url . 'carrito/index');
    }

    public function remove(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header("Location: " . base_url . 'carrito/index');
    }
    
     public function up(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        header("Location: " . base_url . 'carrito/index');
    }
    
     public function down(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;
            
            if($_SESSION['carrito'][$index]['unidades'] == 0){
                unset($_SESSION['carrito'][$index]);
            }
        }
        header("Location: " . base_url . 'carrito/index');
    }
    public function delete_all() {
        unset($_SESSION['carrito']);
        header("Location: " . base_url . 'carrito/index');
    }

}
