<?php

class Oferta{
    private $id_oferta;
    private $isbn;
    private $descuento;
    private $newPrecio;
    private $db;
    
    public function __construct() {
        try {
            $this->db = Database::connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    //getters y setters
    function getId_oferta() {
        return $this->id_oferta;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getDescuento() {
        return $this->descuento;
    }

    function getNewPrecio() {
        $precio = (float)Utils::showLibros($this->isbn);
        $newPrecio = ($this->descuento * $precio) / 100;
        return ($precio - $newPrecio);
    }

    function setId_oferta($id_oferta) {
        $this->id_oferta = $id_oferta;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    function setNewPrecio($newPrecio) {
        $this->newPrecio = $newPrecio;
    }

    //métodos
    public function getAll(){
        $libros = $this->db->query("select * from oferta");
        return $libros;
    }
    
    public function getLibroOferta(){
        $sql = "select l.genero,l.titulo,l.autor,l.portada,l.resenia,l.stock,o.new_precio, o.isbn "
                . "from libro l inner join oferta o "
                . "on l.isbn = o.isbn";
        $libros = $this->db->query($sql);
        return $libros;
    }
    
    public function getOneLibroOferta(){
        $sql = "select l.genero,l.titulo,l.autor,l.portada,l.resenia,l.stock,o.new_precio, l.isbn "
                . "from libro l inner join oferta o "
                . "on l.isbn = o.isbn "
                . "where l.isbn in(select isbn from oferta where l.isbn = '{$this->isbn}')";
        $libro = $this->db->query($sql);
        return $libro->fetchObject();
    }
    
    public function getSearch($search){
        $sql = "select l.* from libro l "
                . "inner join oferta o "
                . "on l.isbn = o.isbn "
                . "where (l.titulo like '%$search%') or (l.autor like '%$search%')";
        $libros = $this->db->query($sql);
        return $libros;
    }
    
    //devuelve solo el libro que corresponde a un determinado ISBN
     public function getOne(){
        $oferta = $this->db->query("select * from oferta where isbn = '{$this->getIsbn()}'");
        return $oferta->fetchObject();
    }
    
    public function existe($isbn){
        $sql = "select new_precio from oferta where isbn = $isbn";
        $resul = $this->db->query($sql);
        return $resul->fetchObject();
    }
    
    public function getOfertasInicio($limit){
        $sql = "select l.portada, o.isbn, o.id_oferta "
                . "from libro l inner join oferta o "
                . "on l.isbn = o.isbn "
                . "order by o.id_oferta desc limit $limit";
        $lib_oferta = $this->db->query($sql);
        return $lib_oferta;
    }
    
    public function save(){
        $sql = "insert into oferta values(null,'{$this->getIsbn()}', {$this->getDescuento()}, {$this->getNewPrecio()})";
        $save = $this->db->query($sql);
       
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
    public function edit(){
        $sql = "update oferta set descuento = {$this->getDescuento()}, new_precio = {$this->getNewPrecio()}";
        $save = $this->db->query($sql);
       
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
    public function delete(){
        $sql = "delete from oferta where isbn = '{$this->isbn}'";
        $delete = $this->db->query($sql);
        
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }

}
