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
            <div id="clear"></div>
            <strong class="precioPortada">Descuento: <strong style="color: black"><?=$fil->descuento?>%</strong></strong>
            <strong class="precioPortada">Precio: <strong style="color: black">$<?=$fil->new_precio?></strong></strong>
            <a href="<?=base_url?>carrito/add&isbn=<?=$fil->isbn?>"><div class="boton btnAcciones botonPortada">Comprar</div></a>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <?php while ($ofer = $ofertas->fetchObject()): ?>
        <div class="librosInicio">
            <a href="<?= base_url ?>oferta/verOfertaIndividual&isbn=<?= $ofer->isbn ?>"><img class="portada" src="<?= $ofer->portada ?>"></a> 
            <div id="clear"></div>
            <strong class="precioPortada">Descuento: <strong style="color: black"><?=$ofer->descuento?>%</strong></strong>
            <strong class="precioPortada">Precio: <strong style="color: black">$<?=$ofer->new_precio?></strong></strong>
            <a href="<?=base_url?>carrito/add&isbn=<?=$ofer->isbn?>"><div class="boton btnAcciones botonPortada">Comprar</div></a>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
