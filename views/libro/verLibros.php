<div id="seccionFiltros">
    <form action="<?= base_url ?>libro/filtrar" method="post">
        <input id="search" class="busqueda" placeholder="Titulo o autor del libro" name="search">
        <input type="submit" value="" id="btnBuscar">
    </form>
</div>
<?php if (isset($filtro)): ?>
    <?php while ($fil = $filtro->fetchObject()): ?>
        <div class="librosInicio">
            <a href="<?= base_url ?>libro/verLibroIndividual&isbn=<?= $fil->isbn ?>"><img class="portada" src="<?= $fil->portada ?>"></a>
            <div id="clear"></div>
            <strong class="precioPortada">Precio: <strong style="color: black">$<?=$fil->precio?></strong></strong>
            <a href="<?=base_url?>carrito/add&isbn=<?=$fil->isbn?>"><div class="boton btnAcciones botonPortada">Comprar</div></a>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <?php foreach ($libros as $lib): ?>
        <div class="librosInicio">
            <a href="<?= base_url ?>libro/verLibroIndividual&isbn=<?= $lib['isbn'] ?>"><img class="portada" src="<?= $lib['portada'] ?>"></a> 
            <div id="clear"></div>
            <strong class="precioPortada">Precio: <strong style="color: black">$<?=$lib['precio']?></strong></strong>
            <a href="<?=base_url?>carrito/add&isbn=<?=$lib['isbn']?>"><div class="boton btnAcciones botonPortada">Comprar</div></a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>