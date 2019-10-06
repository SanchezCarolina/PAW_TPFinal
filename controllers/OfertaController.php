<?php

require_once 'models/oferta.php';
require_once 'models/libro.php';

class ofertaController {

    public function gestion() {
        Utils::isAdmin();
        $oferta = new Oferta();
        $ofertas = $oferta->getAll();
        
        if (isset($_GET['pagina'])) {
            if ($_GET['pagina'] == 1) {
                header("Location:" . base_url . 'oferta/gestion');
            } else {
                $pagina = $_GET['pagina'];
            }
        }
        else{
            $pagina = 1;
        }
       
        $librosXPagina = $this->librosXPagina();
        $empezar_desde = ($pagina - 1) * $librosXPagina;
        $numFilas = $ofertas->rowCount();

        $totalPaginas = ceil($numFilas / $librosXPagina);

        $ofertas = $oferta->getAllPaginacion($empezar_desde, $librosXPagina);
        
        require_once 'views/libro/oferta/gestion.php';
    }

    public function crearOferta() {
        Utils::isAdmin();
        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];

            $libro = new Libro();
            $libro->setIsbn($isbn);

            $lib = $libro->getOne();
            require_once 'views/libro/oferta/crear.php';
        } else {
            header("Location:" . base_url . "libro/gestion");
        }
    }

    public function librosXPagina() {
        $cantLibros = 5;
        return $cantLibros;
    }

    public function verOfertas() {
        $oferta = new Oferta();
        $ofertas = $oferta->getLibroOferta();

        $generos = $oferta->getGenerosDistintos();

        if (isset($_GET['pagina'])) {
            if ($_GET['pagina'] == 1) {
                header("Location:" . base_url . 'oferta/verOfertas');
            } else {
                $pagina = $_GET['pagina'];
            }
        }else {
            $pagina = 1;
        }

        $librosXPagina = $this->librosXPagina();
        $empezar_desde = ($pagina - 1) * $librosXPagina;
        $numFilas = $ofertas->rowCount();

        $totalPaginas = ceil($numFilas / $librosXPagina);

        $ofertas = $oferta->getAllPaginacion($empezar_desde, $librosXPagina);
        
        require_once 'views/libro/oferta/verOfertas.php';
    }

    public function verOfertaIndividual() {
        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            $libro = new Oferta();
            $libro->setIsbn($isbn);

            $ofer = $libro->getOneLibroOferta();
        }
        require_once 'views/libro/oferta/verOfertaIndividual.php';
    }

    public function save() {

        if (isset($_POST)) {
            $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : false;
            $descuento = isset($_POST['descuento']) ? $_POST['descuento'] : false;


            if ($isbn && $descuento) {
                $oferta = new Oferta();

                $oferta->setIsbn($isbn);
                $oferta->setDescuento($descuento);

                $ofer = $oferta->getOneLibroOferta();

                if (isset($_GET['isbn'])) {
                    $isbn = $_GET['isbn'];
                    $oferta->setIsbn($isbn);

                    $save = $oferta->edit();
                    if ($save) {
                        $_SESSION['edit'] = 'complete';
                    } else {
                        $_SESSION['edit'] = 'failed';
                    }
                } else {
                    if ($ofer) {                          //para controlar si el libro ya esta en oferta
                        $save = false;
                    } else {
                        $save = $oferta->save();
                    }

                    if ($save) {
                        $_SESSION['oferta'] = 'complete';
                    } else {
                        $_SESSION['oferta'] = 'failed';
                    }
                }
            } else {
                $_SESSION['oferta'] = 'failed';
            }
        } else {
            $_SESSION['oferta'] = 'failed';
        }
        header("Location:" . base_url . 'oferta/gestion');
    }

    public function editar() {
        Utils::isAdmin();
        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            $edit = true;

            $oferta = new Oferta();
            $oferta->setIsbn($isbn);
            $libro = new Libro();
            $libro->setIsbn($isbn);

            $ofer = $oferta->getOne();
            $lib = $libro->getOne();
            require_once 'views/libro/oferta/crear.php';
        } else {
            header("Location:" . base_url . "oferta/gestion");
        }
    }

    public function eliminar() {
        Utils::isAdmin();

        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            $oferta = new Oferta();
            $oferta->setIsbn($isbn);

            $delete = $oferta->delete();
            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }

        header("Location:" . base_url . "oferta/gestion");
    }

    public function filtrar() {
        if (empty($_POST['titulo']) && empty($_POST['genero'])) {
            $precio = $_POST['precios'];
            $oferta = new Oferta();
            $ofertas = $oferta->getFiltroPrecios($precio);
        } else if (empty($_POST['precios']) && empty($_POST['genero'])) {
            $search = $_POST['titulo'];
            $oferta = new Oferta();
            $ofertas = $oferta->getFiltroTitulo($search);
        } else if (empty($_POST['titulo']) && empty($_POST['precios'])) {
            $genero = $_POST['genero'];
            $oferta = new Oferta();
            $ofertas = $oferta->getFiltroGenero($genero);
        } else if (empty($_POST['precios'])) {
            $search = $_POST['titulo'];
            $genero = $_POST['genero'];
            $oferta = new Oferta();
            $ofertas = $oferta->getTituloGenero($search, $genero);
        } else if (empty($_POST['titulo'])) {
            $genero = $_POST['genero'];
            $precio = $_POST['precios'];
            $oferta = new Oferta();
            $ofertas = $oferta->getGeneroPrecio($genero, $precio);
        } else if (empty($_POST['genero'])) {
            $search = $_POST['titulo'];
            $precio = $_POST['precios'];
            $oferta = new Oferta();
            $ofertas = $oferta->getTituloPrecio($search, $precio);
        } else {
            $search = $_POST['titulo'];
            $precio = $_POST['precios'];
            $genero = $_POST['genero'];
            $oferta = new Oferta();
            $ofertas = $oferta->getTituloPrecioGenero($search, $genero, $precio);
        }

        $generos = $oferta->getGenerosDistintos();
        if($ofertas->rowCount() == 0){
            $sinResultados = true;
        }
        $filtro = true;
        
        require_once 'views/libro/oferta/verOfertas.php';
    }

}
