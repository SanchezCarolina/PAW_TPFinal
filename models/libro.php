<?php
class Libro{
    private $isbn;
    private $genero;
    private $titulo;
    private $autor;
    private $portada;
    private $fecha_carga;
    private $precio;
    private $stock;
    private $resenia;
    private $db;
    
    public function __construct() {
        try {
            $this->db = Database::connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    //getters y setters
    function getIsbn() {
        return $this->isbn;
    }

    function getGenero() {
        return $this->genero;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getAutor() {
        return $this->autor;
    }

    function getPortada() {
        return $this->portada;
    }

    function getFecha_carga() {
        return $this->fecha_carga;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getResenia() {
        return $this->resenia;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setPortada($portada) {
        $this->portada = $portada;
    }

    function setFecha_carga($fecha_carga) {
        $this->fecha_carga = $fecha_carga;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setResenia($resenia) {
        $this->resenia = $resenia;
    }

    //métodos
    public function getAll(){
        $libros = $this->db->query("select * from libro order by fecha_carga desc");
        return $libros;
    }
   
    public function getSearch($search){
        $libros = $this->db->query("select * from libro where (titulo like '%$search%') or (autor like '%$search%')");
        return $libros;
    }
    
    //devuelve solo el libro que corresponde a un determinado ISBN
     public function getOne(){
        $libro = $this->db->query("select * from libro where isbn = '{$this->getIsbn()}'");
        return $libro->fetchObject();
    }
    
    public function getOnePrecio($isbn){
        $precio = $this->db->query("select precio from libro where isbn = $isbn");
        return $precio->fetchObject()->precio;
    }
    
    public function getRecientes($limit){
        $libros = $this->db->query("select * from libro order by fecha_carga desc limit $limit");
        return $libros;
    }
    
    public function existeEnPedido(){
        $sql = "select p.*,pl.* from pedido p "
                . "inner join pedidos_libros pl "
                . "on p.nro_pedido = pl.nro_pedido "
                . "where p.nro_pedido in(select nro_pedido from pedidos_libros where pl.isbn = {$this->isbn})";
        $libro = $this->db->query($sql);
        return $libro->fetchObject();
    }
    public function save(){
        $sql = "insert into libro values('{$this->getIsbn()}','{$this->getGenero()}','{$this->getTitulo()}','{$this->getAutor()}','{$this->getPortada()}','{$this->getFecha_carga()}',{$this->getPrecio()},{$this->getStock()},'{$this->getResenia()}')";
        $save = $this->db->query($sql);
       
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
    public function edit(){
        $sql = "update libro set isbn='{$this->getIsbn()}', genero='{$this->getGenero()}', titulo='{$this->getTitulo()}', autor='{$this->getAutor()}', portada='{$this->getPortada()}', fecha_carga='{$this->getFecha_carga()}', precio={$this->getPrecio()}, stock={$this->getStock()} where isbn='{$this->isbn}'";
        $save = $this->db->query($sql);
       
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
    public function delete(){
        $sql = "delete from libro where isbn = '{$this->isbn}'";
        $delete = $this->db->query($sql);
        
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }
    
    public function getMasVendidos($limit){
        $sql = "SELECT l.*, COUNT( pl.isbn ) AS titulos "
                ."FROM  libro l inner join pedidos_libros pl on l.isbn = pl.isbn"
                . " GROUP BY pl.isbn "
                ."ORDER BY titulos DESC limit $limit";
        $vendidos = $this->db->query($sql);
        return $vendidos;
    }
}    