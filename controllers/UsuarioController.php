<?php
require_once'models/usuario.php';

class usuarioController{
    
    public function index(){
        echo "Controlador: usuario, Acción: index";
    }
    
    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    
    public function save(){
        
        if(isset($_POST)){
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellido($_POST['apellido']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $save = $usuario->save();
            if($save){
                echo "Registro completado";
            }else{
                echo "No se ha podido completar el registro";
            }
        }
    }
}