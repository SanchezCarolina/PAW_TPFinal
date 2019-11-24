<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.3"></script>
<?php if(isset($ofer)):?>
    <?php if(isset($ofer->isbn)):?>
        <?php if(isset($sin_stock)):?>
            <h2 class="alerta_roja">Lo sentimos, no hay stock para agregar al carrito</h2>
        <?php endif;?>
        <h1><?=$ofer->titulo?></h1>
        <div class="libIndividual"><img alt="Portada de libro" class="portadaIndividual" src="<?= $ofer->portada?>"></div>
        <div id="datosLibro">
            <p><strong class="titulosDatos">ISBN:</strong> <?=$ofer->isbn?></p>
            <p><strong class="titulosDatos">Género:</strong> <?=$ofer->genero?></p>
            <p><strong class="titulosDatos">Autor:</strong> <?=$ofer->autor?></p>
            <p><strong class="titulosDatos">Precio:</strong> $<?=$ofer->new_precio?></p>
            <p><strong class="titulosDatos">Stock disponible:</strong> <?=$ofer->stock?></p>
            <div class="botonLibIndividual">
                <a href="<?=base_url?>libro/vista&isbn=<?=$ofer->isbn?>"><div class="botonLibInd">Vista previa</div></a>
                <a href="<?=base_url?>carrito/add&isbn=<?=$ofer->isbn?>"><div class="botonLibInd">Comprar</div></a>
            </div>
        </div>
        <div class="clear"></div>
        <div id="description">
            <p id="pResenia"><strong class="titulosDatos">Reseña:</strong><br><br> <?=$ofer->resenia?></p>
        </div>
    <?php else: ?>
        <h1>El libro no existe</h1>
    <?php endif; ?>    
<?php else: ?>
    <h1>El libro no existe</h1>
<?php endif; ?>
<div class="fb-comments" data-href="http://localhost/SanchezTPFinal/libro/oferta/verOfertaIndividual" data-width="1000px" data-numposts="3"></div>