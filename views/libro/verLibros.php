<?php while($lib = $libros->fetchObject()):?>
    <div class="librosInicio">
        <a href="<?=base_url?>libro/verLibroIndividual&isbn=<?=$lib->isbn?>"><img class="portada" src="<?= $lib->portada?>"></a> 
    </div>
<?php endwhile; ?>