<div id="seccionFiltros">
    <form action="<?= base_url ?>oferta/filtrar" method="post">
        <input id="search" class="busqueda" placeholder="Titulo o autor del libro" name="search">
        <input type="submit" value="" id="btnBuscar">
    </form>
</div>
<?php if (isset($filtro)): ?>
    <?php while ($fil = $filtro->fetchObject()): ?>
        <div class="librosInicio">
            <a href="<?= base_url ?>oferta/verOfertaIndividual&isbn=<?= $fil->isbn ?>"><img class="portada" src="<?= $fil->portada ?>"></a> 
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <?php while ($ofer = $ofertas->fetchObject()): ?>
        <div class="librosInicio">
            <a href="<?= base_url ?>oferta/verOfertaIndividual&isbn=<?= $ofer->isbn ?>"><img class="portada" src="<?= $ofer->portada ?>"></a> 
        </div>
    <?php endwhile; ?>
<?php endif; ?>
