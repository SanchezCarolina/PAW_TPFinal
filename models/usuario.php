<?php

class Usuario{
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $db;
    
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
        $db = Database::connect();
        $sql = "insert into usuario values(null, '{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getPassword()}','user')";
        $save = $db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
}