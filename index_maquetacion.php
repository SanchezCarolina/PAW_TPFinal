<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Libreria Dracarys</title>
        <!--ESTILOS CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    </head>
    <body>
        <div id="contenedorPrincipal">
            <!--CABECERA-->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/logo3.png">
                    <a>Libreria Dracarys</a>
                </div>
                <!--BOTONES-->
                <div id="botones">
                    <div class="boton">
                        Ingresar
                    </div>
                    <div class="boton">
                        Registrarse
                    </div>
                    <div class="boton">
                        Carrito
                    </div>
                </div>
            </header>
            <!--MENÚ-->
            <nav id="menu">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Libros</a></li>
                    <li><a href="#">Ofertas</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
            <!--CONTENIDO PRINCIPAL-->
            <div id="contenido">
                <div id="slider">
                    <div class="galeria">
                        <div><img src="assets/img/imagen1.jpg" ></div>
                        <div><img src="assets/img/imagen3.jpg" ></div>
                        <div><img src="assets/img/imagen5.jpg"></div>
                        <div><img src="assets/img/imagen4.jpg"></div>
				    </div>
                </div>
                <div id="masVendidos">
                    <h2>Más vendidos</h2>
                    <div class="librosInicio">
                        <img id="portada" src="assets/img/vendido1.png">
                    </div>
                    <div class="librosInicio">
                        <img id="portada" src="assets/img/vendido2.png">
                    </div>
                    <div class="librosInicio">
                        <img id="portada" src="assets/img/vendido3.png">
                    </div>
                    <div class="librosInicio">
                        <img id="portada" src="assets/img/vendido4.png">
                    </div>
                    <div class="librosInicio">
                        <img id="portada" src="assets/img/vendido5.png">
                    </div>
                    <a href="#">Ver todo</a>
                </div>
                <div id="clear"></div>
                <div id="agregadosRecientes">
                    <h2>Agregados recientemente</h2>
                    <div class="librosInicio">
                        <img id="portada" src="assets/img/reciente1.png">
                    </div>
                    <div class="librosInicio">
                        <img id="portada" src="assets/img/reciente2.png">
                    </div>
                    <div class="librosInicio">
                        <img id="portada" src="assets/img/reciente3.png">
                    </div>
                    <div class="librosInicio">
                        <img id="portada" src="assets/img/reciente4.png">
                    </div>
                    <div class="librosInicio">
                        <img id="portada" src="assets/img/reciente5.png">
                    </div>
                    <a href="#">Ver todo</a>
                </div>
            </div>
            <!--PIE DE PÁGINA-->
            <footer id="footer">
                <p>Carolina Sánchez &copy; <?=date('Y')?></p>
            </footer>
        </div>
    </body>
</html>