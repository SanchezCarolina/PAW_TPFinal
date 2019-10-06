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

