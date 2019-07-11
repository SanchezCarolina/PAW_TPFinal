<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Libreria Dracarys</title>
        <!--ESTILOS CSS -->
        <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/styles.css">
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
            <nav id="menu">
                <ul>
                    <a href=<?=base_url?>><li>Inicio</li></a>
                    <a href="<?=base_url?>libro/verLibros"><li>Libros</li></a>
                    <a href="<?=base_url?>oferta/verOfertas"><li>Ofertas</li></a>
                    <a href="<?=base_url?>usuario/contacto"><li>Contacto</li></a>
                </ul>
            </nav>
            <!--CONTENIDO PRINCIPAL-->
            <div id="contenido">