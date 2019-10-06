<div>
    <div class="formFiltro">
        <form action="<?= base_url ?>oferta/filtrar" method="post">
            <input type="text" name="titulo" placeholder="Título...">
            <select name="genero">
                <option value="">Género</option>
                <?php
                while ($gen = $generos->fetchObject()) {
                    echo '<option value="' . $gen->genero . '">' . $gen->genero . '</option>';
                }
                ?>
            </select>
            <select name="precios">
                <option value="">Precio</option>
                <option value="0">menor a $100</option>
                <option value="1">entre $100 y $200</option>
                <option value="2">entre $200 y $300</option>
                <option value="3">entre $300 y $400</option>
                <option value="4">entre $400 y $500</option>
                <option value="5">mas de $500</option>
            </select>

            <input type="submit" value="Buscar">
        </form>
    </div>
    <div>
        <?php if(isset($sinResultados)) :?>
        <h2>No hay resultados para su búsqueda</h2>
        <?php endif;?>
        <?php while ($ofer = $ofertas->fetchObject()): ?>
            <div class="seccionlibros">
                <a href="<?= base_url ?>oferta/verOfertaIndividual&isbn=<?= $ofer->isbn ?>"><img class="portada" src="<?= $ofer->portada ?>"></a> 
                <div class="clear"></div>
                <div class="precioPortada">- <?= $ofer->descuento ?>%</div>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="clear"></div>
    <div class="divPaginacion" <?= isset($filtro) ? 'style="display: none"' : '' ?>>
        <a href="<?= base_url ?>oferta/verOfertas&pagina=<?= $pagina - 1 ?>"> <button class="paginacion botonAdmin next_prev_paginacion"<?= $pagina <= 1 ? 'disabled="disabled"' : '' ?>><</button></a>
        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <a href="<?= base_url ?>oferta/verOfertas&pagina=<?= $i ?>"> <div class="paginacion botonAdmin <?= $pagina == $i ? 'active' : '' ?>"><?= $i ?></div></a>
        <?php endfor; ?>
        <a href="<?= base_url ?>oferta/verOfertas&pagina=<?= $pagina + 1 ?>"> <button class="paginacion botonAdmin next_prev_paginacion"<?= $pagina >= $totalPaginas ? 'disabled="disabled"' : '' ?>>></button></a>
    </div>
</div>
