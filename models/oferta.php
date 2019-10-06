<?php

class Oferta {

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
        $precio = (float) Utils::showLibros($this->isbn);
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
    public function getAll() {
        $libros = $this->db->query("select * from oferta");
        return $libros;
    }
    
    public function getLibroOferta() {
        $sql = "select l.genero,l.titulo,l.autor,l.portada,l.resenia,l.stock,o.new_precio, o.isbn, o.descuento "
                . "from libro l inner join oferta o "
                . "on l.isbn = o.isbn";
        $libros = $this->db->query($sql);
        return $libros;
    }
    
    public function getAllPaginacion($desde,$items){
        $sql = "select l.genero,l.titulo,l.autor,l.portada,l.resenia,l.stock,o.new_precio, o.isbn, o.descuento "
                . "from libro l inner join oferta o "
                . "on l.isbn = o.isbn limit $desde,$items";
        $libros = $this->db->query($sql);
        return $libros;
    }

    public function getOneLibroOferta() {
        $sql = "select l.genero,l.titulo,l.autor,l.portada,l.resenia,l.stock,o.new_precio, l.isbn "
                . "from libro l inner join oferta o "
                . "on l.isbn = o.isbn "
                . "where l.isbn in(select isbn from oferta where l.isbn = '{$this->isbn}')";
        $libro = $this->db->query($sql);
        return $libro->fetchObject();
    }

    /////////////////FILTROS DE BÚSQUEDA//////////////////////////////
    public function getGenerosDistintos() {
        $generos = $this->db->query("select distinct genero from libro");
        return $generos;
    }

    public function sqlAuxiliar(){
        $aux = "select * from oferta o inner join libro l on o.isbn = l.isbn where ";
        return $aux;
    }
    
    public function getFiltroPrecios($caso) {
        $sql = $this->sqlAuxiliar();
        switch ($caso) {
            case 0:
                $ofertas = $this->db->query($sql ."new_precio < 100");
                return $ofertas;
                break;
            case 1:
                $ofertas = $this->db->query($sql ."new_precio between 100 and 200");
                return $ofertas;
                break;
            case 2:
                $ofertas = $this->db->query($sql ."new_precio between 200 and 300");
                return $ofertas;
                break;
            case 3:
                $ofertas = $this->db->query($sql ."new_precio between 300 and 400");
                return $ofertas;
                break;
            case 4:
                $ofertas = $this->db->query($sql ."new_precio between 400 and 500");
                return $ofertas;
                break;
            case 5:
                $ofertas = $this->db->query($sql ."new_precio > 500");
                return $ofertas;
                break;
        }
    }

     public function getFiltroTitulo($search) {
        $sql = $this->sqlAuxiliar();
        $ofertas = $this->db->query($sql. "titulo like '%$search%'");
        return $ofertas;
    }
    
     public function getFiltroGenero($genero) {
        $sql = $this->sqlAuxiliar();
        $ofertas = $this->db->query($sql."genero = '$genero'");
        return $ofertas;
    }
    
     public function getTituloGenero($titulo, $genero) {
        $sql = $this->sqlAuxiliar();
        $ofertas = $this->db->query($sql."((genero = '$genero') and (titulo like '%$titulo%'))");
        return $ofertas;
    }
    
    public function getGeneroPrecio($genero, $caso) {
        $sql = $this->sqlAuxiliar();
        switch ($caso) {
            case 0:
                $ofertas = $this->db->query($sql."((precio < 100) and (genero = '$genero'))");
                return $ofertas;
                break;
            case 1:
                $ofertas = $this->db->query($sql."((precio between 100 and 200) and (genero = '$genero'))");
                return $ofertas;
                break;
            case 2:
                $ofertas = $this->db->query($sql."((precio between 200 and 300) and (genero = '$genero'))");
                return $ofertas;
                break;
            case 3:
                $ofertas = $this->db->query($sql."((precio between 300 and 400) and (genero = '$genero'))");
                return $ofertas;
                break;
            case 4:
                $ofertas = $this->db->query($sql."((precio between 400 and 500) and (genero = '$genero'))");
                return $ofertas;
                break;
            case 5:
                $ofertas = $this->db->query($sql."((precio > 500) and (genero = '$genero'))");
                return $ofertas;
                break;
        }
    }
    
    public function getTituloPrecio($titulo, $caso) {
        $sql = $this->sqlAuxiliar();
        if($caso == 0){
            $ofertas = $this->db->query($sql."((precio < 100) and (titulo like '%$titulo%'))");
        }
        else if($caso == 1){
            $ofertas = $this->db->query($sql."((precio between 100 and 200) and (titulo like '%$titulo%'))");
        }
        else if($caso == 2){
            $ofertas = $this->db->query($sql."((precio between 200 and 300) and (titulo like '%$titulo%'))");
        }
        else if($caso == 3){
            $ofertas = $this->db->query($sql."((precio between 300 and 400) and (titulo like '%$titulo%'))");
        }
        else if($caso == 4){
            $ofertas = $this->db->query($sql."((precio between 400 and 500) and (titulo like '%$titulo%'))");
        }
        else if($caso == 5){
            $ofertas = $this->db->query($sql."((precio > 500) and (titulo like '%$titulo%'))");
        }
        return $ofertas;
    }
    
    public function getTituloPrecioGenero($search,$genero, $caso){
        $sql = $this->sqlAuxiliar();
        if($caso == 0){
            $ofertas = $this->db->query($sql."((precio < 100) and (titulo like '%$search%') and (genero = '$genero'))");
        }
        else if($caso == 1){
            $ofertas = $this->db->query($sql."((precio between 100 and 200) and (titulo like '%$search%') and (genero = '$genero'))");
        }
        else if($caso == 2){
            $ofertas = $this->db->query($sql."((precio between 200 and 300) and (titulo like '%$search%') and (genero = '$genero'))");
        }
        else if($caso == 3){
            $ofertas = $this->db->query($sql."((precio between 300 and 400) and (titulo like '%$search%') and (genero = '$genero'))");
        }
        else if($caso == 4){
            $ofertas = $this->db->query($sql."((precio between 400 and 500) and (titulo like '%$search%') and (genero = '$genero'))");
        }
        else if($caso == 5){
            $ofertas = $this->db->query($sql."((precio > 500) and (titulo like '%$search%') and (genero = '$genero'))");
        }
        return $ofertas;
    }
    
    /////////////////////////////////////////////////////////////
    //devuelve solo el libro que corresponde a un determinado ISBN
    public function getOne() {
        $oferta = $this->db->query("select o.*, l.* from oferta o inner join libro l on o.isbn = l.isbn where o.isbn = '{$this->getIsbn()}'");
        return $oferta->fetchObject();
    }

    public function existe($isbn) {
        $sql = "select new_precio from oferta where isbn = $isbn";
        $resul = $this->db->query($sql);
        return $resul->fetchObject();
    }
    
    public function getOfertasInicio($limit) {
        $sql = "select l.portada, o.isbn, o.id_oferta "
                . "from libro l inner join oferta o "
                . "on l.isbn = o.isbn "
                . "order by o.id_oferta desc limit $limit";
        $lib_oferta = $this->db->query($sql);
        return $lib_oferta;
    }

    public function save() {
        $sql = "insert into oferta values(null,'{$this->getIsbn()}', {$this->getDescuento()}, {$this->getNewPrecio()})";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit() {
        $sql = "update oferta set descuento = {$this->getDescuento()}, new_precio = {$this->getNewPrecio()} where isbn='{$this->isbn}'";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete() {
        $sql = "delete from oferta where isbn = '{$this->isbn}'";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

}
