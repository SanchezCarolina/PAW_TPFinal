<?php
require_once'models/usuario.php';

class usuarioController{
    
    public function index(){
        echo "Controlador: usuario, Acción: index";
    }
    
    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    
    public function inicio(){
        require_once 'views/usuario/login.php';
    }
    
    public function admin(){
        require_once 'views/usuario/admin.php';
    }
    
    public function save(){
        
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
              
            if($nombre && $apellido && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre($_POST['nombre']);
                $usuario->setApellido($_POST['apellido']);
                $usuario->setEmail($_POST['email']);
                $usuario->setPassword($_POST['password']);

                $save = $usuario->save();
                if($save){
                    $_SESSION['register'] = 'complete';
                }else{
                    $_SESSION['register'] = 'failed';
                }
            }
            else{
                $_SESSION['register'] = 'failed'; 
            }
        }else{
           $_SESSION['register'] = 'failed';  
        }
        
        header("Location:".base_url.'usuario/registro');
    }
    
    public function login(){
        
        if(isset($_POST)){
            //identificar al usuario
            //consultar a la base de datos
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $identity = $usuario->login();
            /*
            if($identity && is_object($identity)){
                $_SESSION['sess_user_id'] = $identity->id_usuario;
                $_SESSION['sess_email'] = $identity->email;
                $_SESSION['sess_name'] = $identity->nombre;
            }else{
                $msg = "Invalido email y/o contraseña";
            }
             * 
             */
  
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
                header("Location:".base_url);
                
                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                    header("Location:".base_url."usuario/admin");
                }
            }else{
                $_SESSION['error_login'] = 'failed';
                header("Location:".base_url."usuario/inicio");
            }
             
        }
        //var_dump($identity); 
    }
    
    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        
        header("Location:".base_url);
    }
}//fin de la clase