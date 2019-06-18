<?php

class Libro{
    private $isbn;
    private $id_genero;
    private $titulo;
    private $autor;
    private $portada;
    private $fecha_carga;
    private $precio;
    private $stock;
    private $reseña;
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

    function getId_genero() {
        return $this->id_genero;
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

    function getReseña() {
        return $this->reseña;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setId_genero($id_genero) {
        $this->id_genero = $id_genero;
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

    function setReseña($reseña) {
        $this->reseña = $reseña;
    }

    //métodos
    public function getAll(){
        $libros = $this->db->query("select * from libro order by fecha_carga desc");
        return $libros;
    }
}    