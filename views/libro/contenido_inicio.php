                <div id="slider">
                    <h2 class="divH2">Últimas ofertas</h2>
                 <section class="container">
                    <div id="carousel">
                    <?php while($ofer = $ofertas->fetchObject()):?>
                        <figure><a href="<?=base_url?>oferta/verOfertaIndividual&isbn=<?=$ofer->isbn?>"><img class="portadaFigure" src="<?= $ofer->portada?>"></a></figure>
                    <?php endwhile; ?>
                      
                    </div>
                </section>   
                <div id="clear"></div>    
                   
                </div>
                <div id="agregadosRecientes">
                    <h2 class="divH2">Agregados recientemente</h2>
                    <?php while($lib = $libros->fetchObject()):?>
                    <div class="librosInicio">
                        <a href="<?=base_url?>libro/verLibroIndividual&isbn=<?=$lib->isbn?>"><img class="portada" src="<?= $lib->portada?>"></a> 
                        <div id="clear"></div>
                        <strong class="precioPortada">Precio: <strong style="color: black">$<?=$lib->precio?></strong></strong>
                        <a href="<?=base_url?>carrito/add&isbn=<?=$lib->isbn?>"><div class="boton btnAcciones botonPortada">Comprar</div></a>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div id="clear"></div>
                <div id="masVendidos">
                    <h2 class="divH2">Más vendidos</h2>
                    <?php while($ven = $vendidos->fetchObject()):?>
                    <div class="librosInicio">
                        <a href="<?=base_url?>libro/verLibroIndividual&isbn=<?=$ven->isbn?>"><img class="portada" src="<?= $ven->portada?>"></a> 
                        <div id="clear"></div>
                        <strong class="precioPortada">Precio: <strong style="color: black">$<?=$ven->precio?></strong></strong>
                        <a href="<?=base_url?>carrito/add&isbn=<?=$ven->isbn?>"><div class="boton btnAcciones botonPortada">Comprar</div></a>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div id="clear"></div>
               
            