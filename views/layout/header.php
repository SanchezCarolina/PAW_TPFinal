<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Libreria Dracarys</title>
        <!--ESTILOS CSS -->
        <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/styles.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
    </head>
    <body>
        <div id="contenedorPrincipal">
            <!--CABECERA-->
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>assets/img/logo3.png">
                    <a>Libreria Dracarys</a>
                </div>
                <!--BOTONES-->
                <?php if(!isset($_SESSION['identity'])):?>
                <div id="botones">
                    <a href=<?=base_url?>usuario/inicio><div class="boton">Ingresar</div></a>
                    <a href=<?=base_url?>usuario/registro><div class="boton">Registrarse</div></a>
                    <a href=<?=base_url?>carrito/index><div class="boton">Carrito</div></a>
                </div>
                <?php elseif(isset($_SESSION['admin'])):?>
                <div id="botones">
                    <a href="<?=base_url?>usuario/admin"><div class="boton">Mi Vista</div></a>
                    <a href=<?=base_url?>carrito/index><div class="boton">Carrito</div></a>
                    <a href="<?=base_url?>usuario/logout"><div class="boton">Salir</div></a>
                </div>
                <?php else:?>
                <div id="botones">
                    <a href=<?=base_url?>carrito/index><div class="boton">Carrito</div></a>
                    <a href=<?=base_url?>pedido/mis_pedidos><div class="boton">Mis Pedidos</div></a>
                    <a href=<?=base_url?>usuario/logout><div class="boton">Salir</div></a>
                </div>
                <?php endif; ?>
            </header>
            <!--MENÚ-->
            
            <input type="checkbox" id="btn-menu">
            <div id="divMenu">
            <label for="btn-menu" id="labelMenu"><img src="<?=base_url?>/assets/img/menu.png"></label>
            </div>
            <nav id="menu">
                <ul>
                    <li><a href=<?=base_url?>>Inicio</a></li>
                    <li><a href="<?=base_url?>libro/verLibros">Libros</a></li>
                    <li><a href="<?=base_url?>oferta/verOfertas">Ofertas</a></li>
                    <li><a href="<?=base_url?>usuario/contacto">Contacto</a></li>
                </ul>
            </nav>
            <!--CONTENIDO PRINCIPAL-->
            <div id="contenido">