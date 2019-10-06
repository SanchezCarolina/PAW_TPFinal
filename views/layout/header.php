<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Libreria Dracarys</title>
        <!--ESTILOS CSS -->
        <link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/css/styles.css">
        <link rel="stylesheet" href="<?=base_url?>assets/css/font.css">
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
    </head>
    <body>
        <div id="contenedorPrincipal">
            <!--CABECERA-->
            <header id="header">
                <div id="logo">
                    <div id="logoImg">
                        <img alt="Logo libreria" src="<?= base_url ?>assets/img/logo3.png">  
                    </div>
                    <div id="logoA">
                        <a href="<?= base_url ?>">Libreria Dracarys</a>
                    </div>

                </div>
                <div class="clear"></div>
                <!--BOTONES-->
                <?php if (!isset($_SESSION['identity'])): ?>
                    <div id="botones">
                        <a href=<?= base_url ?>usuario/inicio><div>Ingresar</div></a>
                        <a href=<?= base_url ?>usuario/registro><div>Registrarse</div></a>
                        <a href=<?= base_url ?>carrito/index><div>Carrito</div></a>
                    </div>
                <?php elseif (isset($_SESSION['admin'])): ?>
                    <div id="botones">
                        <a href="<?= base_url ?>usuario/admin"><div>Vista Admin</div></a>
                        <a href=<?= base_url ?>carrito/index><div>Carrito</div></a>
                        <a href="<?= base_url ?>usuario/logout"><div>Salir</div></a>
                    </div>
                <?php else: ?>
                    <div id="botones">
                        <a href=<?= base_url ?>carrito/index><div>Carrito</div></a>
                        <a href=<?= base_url ?>pedido/mis_pedidos><div>Mis Pedidos</div></a>
                        <a href=<?= base_url ?>usuario/logout><div>Salir</div></a>
                    </div>
                <?php endif; ?>
            </header>
            <!--MENÚ-->
            <div id="menuMobile">
                <input type="checkbox" id="btn-menu">
                <div id="divMenu">
                    <label for="btn-menu" id="labelMenu"><img alt="Menu horizontal"src="<?= base_url ?>/assets/img/menu.png"></label>
                </div>
                <nav id="menuM">
                    <ul>
                        <li><a href=<?= base_url ?>>Inicio</a></li>
                        <li><a href="<?= base_url ?>libro/verLibros">Libros</a></li>
                        <li><a href="<?= base_url ?>oferta/verOfertas">Ofertas</a></li>
                        <li><a href="<?= base_url ?>usuario/contacto">Contacto</a></li>
                    </ul>
                </nav>
            </div>
            <div id="menuHorizontal">
                <nav id="menu">
                    <ul>
                        <li><a href=<?= base_url ?>>Inicio</a></li>
                        <li><a href="<?= base_url ?>libro/verLibros">Libros</a></li>
                        <li><a href="<?= base_url ?>oferta/verOfertas">Ofertas</a></li>
                        <li><a href="<?= base_url ?>usuario/contacto">Contacto</a></li>
                    </ul>
                </nav>
            </div>

            <!--CONTENIDO PRINCIPAL-->
            <div id="contenido">