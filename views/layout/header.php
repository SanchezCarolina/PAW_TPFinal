<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Libreria Dracarys</title>
        <!--ESTILOS CSS -->
        <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/styles.css">
        
		
        <!-- Slider 
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
		<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	--> 	
        <!-- Mis Scripts 
		<script type="text/javascript" src="<?=base_url?>assets/js/main.js"></script>
        -->
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
                    <div class="boton">
                        <a href=<?=base_url?>usuario/inicio>Ingresar</a>
                    </div>
                    <div class="boton">
                        <a href=<?=base_url?>usuario/registro>Registrarse</a>
                    </div>
                    <div class="boton">
                        Carrito
                    </div>
                </div>
                <?php else:?>
                <div id="botones">
                    <div class="boton">
                        <a href="<?=base_url?>usuario/logout">Cerrar Sesión</a>
                    </div>
                    <div class="boton">
                        Carrito
                    </div>
                </div>
                <?php endif; ?>
            </header>
            <!--MENÚ-->
            <nav id="menu">
                <ul>
                    <li><a href=<?=base_url?>>Inicio</a></li>
                    <li><a href="#">Libros</a></li>
                    <li><a href="#">Ofertas</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
            <!--CONTENIDO PRINCIPAL-->
            <div id="contenido">