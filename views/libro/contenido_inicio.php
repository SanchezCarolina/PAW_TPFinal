<div class="slide-contenedor">
        <div class="miSlider fade">
            <img src="<?= base_url ?>assets/img/book.png" alt="">
        </div>
        <div class="miSlider fade">
            <img src="<?= base_url ?>assets/img/book1.jpg" alt="">
        </div>
        <div class="miSlider fade">
            <img src="<?= base_url ?>assets/img/book2.jpg" alt="">
        </div>
        <div class="direcciones">
            <a href="#" class="atras" onclick="avanzaSlide(-1)">&#10094;</a>
            <a href="#" class="adelante" onclick="avanzaSlide(1)">&#10095;</a>
        </div>
        <div class="barras">
            <span class="barra active" onclick="posicionSlide(1)"></span>
            <span class="barra" onclick="posicionSlide(2)"></span>
            <span class="barra" onclick="posicionSlide(3)"></span>
        </div>
</div>
<script src="<?= base_url ?>assets/js/main.js"></script>
<h2 class="divH2">Últimas ofertas</h2>
<?php while ($ofer = $ofertas->fetchObject()): ?>
    <div class="librosInicio">
        <a href="<?= base_url ?>oferta/verOfertaIndividual&isbn=<?= $ofer->isbn ?>"><img alt="Portada de libro" class="portada" src="<?= $ofer->portada ?>"></a> 
        <div class="clear"></div>

    </div>

<?php endwhile; ?>

<div class="clear"></div>    

<div id="agregadosRecientes">
    <h2 class="divH2">Agregados recientemente</h2>
    <?php while ($lib = $libros->fetchObject()): ?>
        <div class="librosInicio">
            <a href="<?= base_url ?>libro/verLibroIndividual&isbn=<?= $lib->isbn ?>"><img alt="Portada de libro" class="portada" src="<?= $lib->portada ?>"></a> 
            <div class="clear"></div>
        </div>
    <?php endwhile; ?>
</div>
<div class="clear"></div>
<div id="masVendidos">
    <h2 class="divH2">Más vendidos</h2>
    <?php while ($ven = $vendidos->fetchObject()): ?>
        <div class="librosInicio">
            <a href="<?= base_url ?>libro/verLibroIndividual&isbn=<?= $ven->isbn ?>"><img alt="Portada de libro" class="portada" src="<?= $ven->portada ?>"></a> 
            <div class="clear"></div>
        </div>
    <?php endwhile; ?>
</div>
<div class="clear"></div>

