<?php if(isset($lib)):?>
    <h1><?=$lib->titulo?></h1>
    <div class="libIndividual"><img class="portadaIndividual" src="<?= $lib->portada?>"></div>
    <div id="datosLibro">
        <p><strong class="titulosDatos">ISBN:</strong> <?=$lib->isbn?></p>
        <p><strong class="titulosDatos">Género:</strong> <?=$lib->genero?></p>
        <p><strong class="titulosDatos">Autor:</strong> <?=$lib->autor?></p>
        <p><strong class="titulosDatos">Precio:</strong> $<?=$lib->precio?></p>
        <p><strong class="titulosDatos">Stock disponible:</strong> <?=$lib->stock?></p>
        <div class="boton btnVerde"><a href="#">Vista previa</a></div>
        <div class="boton btnVerde"><a href="#">Comprar</a></div>
    </div>
    <div id="clear"></div>
    <div id="description">
        <p id="pResenia"><strong class="titulosDatos">Reseña:</strong><br> <?=$lib->resenia?></p>
    </div>
<?php else: ?>
    <h1>El libro no existe</h1>
<?php endif; ?>
