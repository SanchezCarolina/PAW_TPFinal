<?php

class Usuario{
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $db;
    
    public function __construct() {
        try {
            $this->db = Database::connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    //getters
    function getIdUsuario(){
        return $this->id_usuario;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getApellido(){
        return $this->apellido;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }
    function getRol(){
        return $this->rol;
    }
    //setters
    function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setApellido($apellido){
        $this->apellido = $apellido;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setPassword($password){
        $this->password = $password;
    }
    function setRol($rol){
        $this->rol = $rol;
    }
    
    //métodos
    
    public function save(){
        $sql = "insert into usuario values(null, '{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getPassword()}','user')";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;
        
        //compruebo si existe el usuario
        $sql = "select * from usuario where email = '$email'";
        $login = $this->db->prepare($sql);
        $login->bindParam('email', $email, PDO::PARAM_STR);
        $login->bindValue('password', $password, PDO::PARAM_STR);
        $login->execute();
        $count = $login->rowCount();
        $row = $login->fetch(PDO::FETCH_OBJ);
       
        if($count == 1 && !empty($row)){
            $usuario = $row;
            
            //verifico la contraseña
            $verify = false;
            if($password == $usuario->password){
                $verify = true;
            }
            
            if($verify){
                $result = $usuario;
            }
        }
        return $result;
    }
}