<?php
class Pedido{
    private $nro_pedido;
    private $id_usuario;
    private $monto;
    private $fecha;
    private $hora;
    private $estado;
    private $provincia;
    private $localidad;
    private $direccion;
    private $cod_postal;
    private $db;
    
    public function __construct() {
        try {
            $this->db = Database::connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    //getters y setters
    function getNro_pedido() {
        return $this->nro_pedido;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getMonto() {
        return $this->monto;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getEstado() {
        return $this->estado;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCod_postal() {
        return $this->cod_postal;
    }

    function setNro_pedido($nro_pedido) {
        $this->nro_pedido = $nro_pedido;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setMonto($monto) {
        $this->monto = $monto;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCod_postal($cod_postal) {
        $this->cod_postal = $cod_postal;
    }

    //métodos
    public function getAll(){
        $libros = $this->db->query("select * from pedido order by fecha desc");
        return $libros;
    }
    
    public function getAllPaginacion($desde, $items){
        $libros = $this->db->query("select * from pedido order by fecha desc limit $desde,$items");
        return $libros;
    }
    
    //devuelve solo el pedido que corresponde a un determinado nro_pedido
     public function getOne(){
        $libro = $this->db->query("select * from pedido where nro_pedido = {$this->getNro_pedido()}");
        return $libro->fetchObject();
     }
    
     public function getOneByUser(){
        $sql = "select p.nro_pedido,p.monto from pedido p where p.id_usuario = {$this->getId_usuario()} order by p.fecha desc, p.hora desc limit 1";
        $pedido = $this->db->query($sql);
        return $pedido->fetchObject();
     }
     
     public function getAllByUser(){
        $sql = "select p.* from pedido p where "
                . "p.id_usuario = {$this->getId_usuario()} order by p.id_usuario desc";
        $pedido = $this->db->query($sql);
        return $pedido;
     }
     
     public function getAllByUserPaginacion($desde,$item){
        $sql = "select p.* from pedido p where "
                . "p.id_usuario = {$this->getId_usuario()} order by p.id_usuario desc limit $desde,$item";
        $pedido = $this->db->query($sql);
        return $pedido;
     }
     
     public function getLibrosByPedido($nroP){
         $sql = "select l.*,pl.unidades from libro l "
                 . "inner join pedidos_libros pl on l.isbn = pl.isbn "
                 . "where pl.nro_pedido = {$nroP}";        
     
        $libros = $this->db->query($sql);
        return $libros;       
     }

     public function save(){
        $sql = "insert into pedido values(null,{$this->getId_usuario()},{$this->getMonto()},CURDATE(),CURTIME(),'confirm','{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}','{$this->getCod_postal()}')";
        $save = $this->db->query($sql);
       
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
    public function save_ped_libro(){
        $sql = "select nro_pedido as 'pedido' from pedido order by nro_pedido desc limit 1;";
        $query = $this->db->query($sql);
        $nro_pedido = $query->fetchObject()->pedido;
        
        foreach($_SESSION['carrito'] as $elemento){
          $libro = $elemento['libro'];
          
          $insert = "insert into pedidos_libros values(null, {$nro_pedido}, '{$libro->isbn}', {$elemento['unidades']})";
          $save = $this->db->query($insert);
          $this->updateStock($libro->isbn, $elemento['unidades']);
        } 
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
    public function updateStock($isbn, $unidades){
        $sql = "select stock from libro where isbn = '$isbn'";
        $query = $this->db->query($sql);
        $reg = $query->fetchObject()->stock;
        
        $newStock = 0;
        if($reg){
            $newStock = $reg;
        }
        $newStock -= $unidades;
        
        $sql = "update libro set stock = $newStock where isbn = '$isbn'";
        $this->db->query($sql);
    }
    
    public function edit(){
        $sql = "update pedido set estado='{$this->getEstado()}'"
        . "where nro_pedido = {$this->getNro_pedido()}";
        $save = $this->db->query($sql);
       
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
}    
