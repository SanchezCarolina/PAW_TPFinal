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
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <?php while ($lib = $libros->fetchObject()): ?>
        <div class="librosInicio">
            <a href="<?= base_url ?>libro/verLibroIndividual&isbn=<?= $lib->isbn ?>"><img class="portada" src="<?= $lib->portada ?>"></a> 
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<!--<div id="clear"></div>
<div class="center">
    <ul class="paginacion">
        <?php
        if(!$_GET){
            header("Location: ".base_url.'libro/verLibros?pagina=1');
        }
        $iniciar = ($_GET['pagina']-1)* $libros_x_pagina;
        //var_dump($iniciar);
        
        ?>
        <li><a href="<?=base_url?>libro/verLibros?pagina=<?=$pagina-1?>">❮</a></li>
        
        <?php for ($i=0; $i<$paginas; $i++):?>
        <li><a class="" id="a_paginacion" href="<?=base_url?>libro/verLibros?pagina=<?=$i+1?>"><?=$i+1?></a></li>
        <?php endfor;?>
        
        <li><a href="<?=base_url?>libro/verLibros?pagina=<?= $_GET['pagina']+1?>">❯</a></li>
    </ul> 
</div>-->
