<?php
require_once 'models/pedido.php';

class pedidoController{
    
    public function realizar(){
        require_once 'views/pedido/realizar.php';
    }
    
    public function add(){
        if(isset($_SESSION['identity'])){
            //guardo datos en la BD
            $id_usuario = $_SESSION['identity']->id_usuario;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false; 
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $cod_postal = isset($_POST['cod_pos']) ? $_POST['cod_pos'] : false;
            
            $stats = Utils::statsCarrito();
            $monto = $stats['total'];
            
            if($provincia && $localidad && $direccion && $cod_postal){
                $pedido = new Pedido();
                
                $pedido->setId_usuario($id_usuario);
                $pedido->setMonto($monto);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCod_postal($cod_postal);
                
                $save = $pedido->save();
                //guardar pedido_libros
                $pedidos_libros = $pedido->save_ped_libro();
                
                if($save && $pedidos_libros){
                    $_SESSION['pedido'] = 'complete';
                }else{
                    $_SESSION['pedido'] = 'failed';
                }
            }else{
                $_SESSION['pedido'] = 'failed';
            }
            header("Location: ".base_url.'pedido/confirmado');
        }else{
            //redirigir al index
            header("Location: ".base_url);
        }
    }
    
    public function confirmado(){
        if(isset($_SESSION['identity'])){
          $identity = $_SESSION['identity'];
          $pedido = new Pedido();  
          $pedido->setId_usuario($identity->id_usuario);
          
          $pedido = $pedido->getOneByUser();
          
          $pedido_libros = new Pedido();
          $libros = $pedido_libros->getLibrosByPedido($pedido->nro_pedido);
        }
        
        if(isset($_SESSION['carrito'])){
            Utils::deleteSession('carrito');
        }
        
        require_once 'views/pedido/confirmado.php';
    }
    
    public function mis_pedidos(){
        Utils::isIdentity();
        
        $id_usuario = $_SESSION['identity']->id_usuario;
        $pedido = new Pedido();
        //saco los datos de los pedidos de un usuario especifico
        $pedido->setId_usuario($id_usuario);
        $pedidos = $pedido->getAllByUser();
        
        require_once 'views/pedido/mis_pedidos.php';
    }
    
    public function detalle(){
        Utils::isIdentity();
        
        if(isset($_GET['nro_pedido'])){
            $nro_pedido = $_GET['nro_pedido'];
            
            //sacar el pedido
            $pedido = new Pedido();  
            $pedido->setNro_pedido($nro_pedido);
            $pedido = $pedido->getOne();
            
            //sacar los productos del pedido
            $pedido_libros = new Pedido();
            $libros = $pedido_libros->getLibrosByPedido($nro_pedido);
            
            require_once 'views/pedido/detalle.php'; 
        }else{
            header("Location: ".base_url."pedido/mis_pedidos");
        }
    }
    
    public function gestion(){
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        
        require_once 'views/pedido/mis_pedidos.php'; 
    }
    
    public function estado(){
        Utils::isAdmin();
        if(isset($_POST['pedido_nro'])){
            
            //datos del formulario
            $nro_pedido = $_POST['pedido_nro'];
            $estado = $_POST['estado'];
            
            //update del pedido
            $pedido = new Pedido();
            $pedido->setNro_pedido($nro_pedido);
            $pedido->setEstado($estado);
            
            $pedido->edit();
            
            header("Location: ".base_url.'pedido/detalle&nro_pedido='.$nro_pedido);
        }else{
            header("Location: ".base_url);
        }
    }
}
