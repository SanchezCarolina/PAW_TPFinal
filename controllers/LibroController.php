<?php

require_once 'models/libro.php';
require_once 'models/oferta.php';

class libroController {
    
    public function index() {
        $libro = new Libro();
        $libros = $libro->getRecientes(5);
        $oferta = new Oferta();
        $ofertas = $oferta->getOfertasInicio(5);
        $vendido = new Libro();
        $vendidos = $libro->getMasVendidos(5);

        require_once 'views/libro/contenido_inicio.php';
    }

    public function gestion() {
        Utils::isAdmin();
        $libro = new Libro();
        $libros = $libro->getAll();

        if (isset($_GET['pagina'])) {
            if ($_GET['pagina'] == 1) {
                header("Location:" . base_url . 'libro/gestion');
            } else {
                $pagina = $_GET['pagina'];
            }
        }
        else{
            $pagina = 1;
        }
       
        $librosXPagina = $this->librosXPagina();
        $empezar_desde = ($pagina - 1) * $librosXPagina;
        $numFilas = $libros->rowCount();

        $totalPaginas = ceil($numFilas / $librosXPagina);

        $libros = $libro->getAllPaginacion($empezar_desde, $librosXPagina);
        
        $oferta = new Oferta();
        $ofertas = $oferta->getAll();
        
        require_once 'views/libro/gestion.php';
    }

    public function librosXPagina(){
        $cantLibros = 5;
        return $cantLibros;
    }

    public function verLibros() {

        $libro = new Libro();
        $libros = $libro->getAll();

        $generos = $libro->getGenerosDistintos();

        if (isset($_GET['pagina'])) {
            if ($_GET['pagina'] == 1) {
                header("Location:" . base_url . 'libro/verLibros');
            } else {
                $pagina = $_GET['pagina'];
            }
        }
        else{
            $pagina = 1;
        }
       
        $librosXPagina = $this->librosXPagina();
        $empezar_desde = ($pagina - 1) * $librosXPagina;
        $numFilas = $libros->rowCount();

        $totalPaginas = ceil($numFilas / $librosXPagina);

        $libros = $libro->getAllPaginacion($empezar_desde, $librosXPagina);

        require_once 'views/libro/verLibros.php';
    }

    public function verLibroIndividual() {
        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            $libro = new Libro();
            $libro->setIsbn($isbn);

            $oferta = new Oferta();
            $oferta->setIsbn($isbn);

            $ofer = $oferta->getOneLibroOferta();
            //$ofer = $oferta->getOne();
            //var_dump($ofer);
            $lib = $libro->getOne();
            if ($ofer) {
                //var_dump(true);
                require_once 'views/libro/oferta/verOfertaIndividual.php';
            } else {
                //var_dump(false);
                require_once 'views/libro/verLibroIndividual.php';
            }
            //var_dump($lib->isbn);
            //var_dump(Utils::isEnOferta($isbn));
        }
        //require_once 'views/libro/verLibroIndividual.php';
    }

    public function cargar() {
        Utils::isAdmin();
        require_once 'views/libro/cargar.php';
    }

    public function save() {

        if (isset($_POST)) {
            $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : false;
            $genero = isset($_POST['genero']) ? $_POST['genero'] : false;
            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
            $autor = isset($_POST['autor']) ? $_POST['autor'] : false;
            $portada = isset($_POST['portadaForm']) ? $_POST['portadaForm'] : false;
            $fecha_carga = isset($_POST['fecha_carga']) ? $_POST['fecha_carga'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $resenia = isset($_POST['resenia']) ? $_POST['resenia'] : false;

            if ($isbn && $genero && $titulo && $autor && $fecha_carga && $precio && $stock && $resenia) {
                $libro = new Libro();

                $libro->setIsbn($isbn);
                $libro->setGenero($genero);
                $libro->setTitulo($titulo);
                $libro->setAutor($autor);
                $libro->setPortada($portada);
                $libro->setFecha_carga($fecha_carga);
                $libro->setPrecio($precio);
                $libro->setStock($stock);
                $libro->setResenia($resenia);

                $lib = $libro->getOne();

                if (isset($_GET['isbn'])) {
                    $isbn = $_GET['isbn'];
                    $libro->setIsbn($isbn);

                    $save = $libro->edit(); //guardo en la BD los cambios que me llegan (actualizo datos)

                    if ($save) {
                        $_SESSION['edit'] = 'complete';
                    } else {
                        $_SESSION['edit'] = 'failed';
                    }
                } else {
                    if ($lib) {
                        $save = false;
                    } else {
                        $save = $libro->save(); //creo un nuevo libro en la BD (inserto datos)
                    }
                    if ($save) {
                        $_SESSION['libro'] = 'complete';
                    } else {
                        $_SESSION['libro'] = 'failed';
                    }
                }
            } else {
                $_SESSION['libro'] = 'failed';
            }
        } else {
            $_SESSION['libro'] = 'failed';
        }

        header("Location:" . base_url . 'libro/gestion');
    }

    public function editar() {
        Utils::isAdmin();
        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            $edit = true;

            $libro = new Libro();
            $libro->setIsbn($isbn);

            $lib = $libro->getOne();
            require_once 'views/libro/cargar.php';
        } else {
            header("Location:" . base_url . "libro/gestion");
        }
    }

    public function eliminar() {
        Utils::isAdmin();

        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            $libro = new Libro();
            $libro->setIsbn($isbn);

            $oferta = new Oferta();
            $oferta->setIsbn($isbn);

            $ofer = $oferta->delete();
            $delete = $libro->delete();

            if ($delete && $ofer) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }

        header("Location:" . base_url . "libro/gestion");
    }

    public function filtrar() {
        if (empty($_POST['titulo']) && empty($_POST['genero'])) {
            $precio = $_POST['precios'];
            $libro = new Libro();
            $libros = $libro->getFiltroPrecios($precio);
        } else if (empty($_POST['precios']) && empty($_POST['genero'])) {
            $search = $_POST['titulo'];
            $libro = new Libro();
            $libros = $libro->getFiltroTitulo($search);
        } else if (empty($_POST['titulo']) && empty($_POST['precios'])) {
            $genero = $_POST['genero'];
            $libro = new Libro();
            $libros = $libro->getFiltroGenero($genero);
        } else if (empty($_POST['precios'])) {
            $search = $_POST['titulo'];
            $genero = $_POST['genero'];
            $libro = new Libro();
            $libros = $libro->getTituloGenero($search, $genero);
        } else if (empty($_POST['titulo'])) {
            $genero = $_POST['genero'];
            $precio = $_POST['precios'];
            $libro = new Libro();
            $libros = $libro->getGeneroPrecio($genero, $precio);
        } else if (empty($_POST['genero'])) {
            $search = $_POST['titulo'];
            $precio = $_POST['precios'];
            $libro = new Libro();
            $libros = $libro->getTituloPrecio($search, $precio);
        } else {
            $search = $_POST['titulo'];
            $precio = $_POST['precios'];
            $genero = $_POST['genero'];
            $libro = new Libro();
            $libros = $libro->getTituloPrecioGenero($search, $genero, $precio);
        }

        $generos = $libro->getGenerosDistintos();
        if($libros->rowCount() == 0){
            $sinResultados = true;
        }
        $filtro = true;
        
        require_once 'views/libro/verLibros.php';
    }

    public function vista() {
        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];

            require_once 'views/libro/vistaPrevia.php';
        } else {
            header("Location: " . base_url);
        }
    }

}
