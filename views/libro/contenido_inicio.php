                <div id="slider">
                    
                    <div class="galeria">
                        <div><img src="<?=base_url?>assets/img/imagen1.jpg" height="250" width="100%"></div>
                        
				    </div>
                   
                </div>
                <div id="agregadosRecientes">
                    <h2>Agregados recientemente</h2>
                    <?php while($lib = $libros->fetchObject()):?>
                    <div class="librosInicio">
                        <a href="<?=base_url?>libro/verLibroIndividual&isbn=<?=$lib->isbn?>"><img class="portada" src="<?= $lib->portada?>"></a> 
                    </div>
                    <?php endwhile; ?>
                </div>
                <div id="masVendidos">
                    <h2>Más vendidos</h2>
                    <div class="librosInicio">
                        <img class="portada" src="<?=base_url?>assets/img/vendido1.png">
                    </div>
                    <div class="librosInicio">
                        <img class="portada" src="<?=base_url?>assets/img/vendido2.png">
                    </div>
                    <div class="librosInicio">
                        <img class="portada" src="<?=base_url?>assets/img/vendido3.png">
                    </div>
                    <div class="librosInicio">
                        <img class="portada" src="<?=base_url?>assets/img/vendido4.png">
                    </div>
                    <div class="librosInicio">
                        <img class="portada" src="<?=base_url?>assets/img/vendido5.png">
                    </div>
                </div>
                <div id="clear"></div>
               
            