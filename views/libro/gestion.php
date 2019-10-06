<a href="<?= base_url ?>usuario/admin"><div class="botonBack botonAdmin"><</div></a>
<h2>Gestión de libros</h2>

<!-- SESIÓN PARA CUANDO SE CARGA UN NUEVO LIBRO-->
<div>
    <?php if (isset($_SESSION['libro']) && $_SESSION['libro'] == 'complete'): ?>
        <p class="alerta_aviso">Libro cargado exitosamente!</p>
    <?php elseif (isset($_SESSION['libro']) && $_SESSION['libro'] == 'failed'): ?>
        <p class="alerta_aviso">No se ha podido cargar el libro, ya se encuentra en la base de datos</p>
    <?php endif; ?>
    <?php Utils::deleteSession('libro'); ?>
</div>  

<!-- SESIÓN PARA CUANDO SE EDITA UN LIBRO-->
<div>
    <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == 'complete'): ?>
        <p class="alerta_aviso">El libro se ha actualizado exitosamente!</p>
    <?php elseif (isset($_SESSION['edit']) && $_SESSION['edit'] == 'failed'): ?>
        <p class="alerta_aviso">No se ha podido actualizar el libro</p>
    <?php endif; ?>
    <?php Utils::deleteSession('edit'); ?>
</div>

<!-- SESIÓN PARA CUANDO SE ELIMINA UN LIBRO-->
<div>
    <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
        <p class="alerta_aviso">El libro se ha eliminado exitosamente!</p>
    <?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
        <p class="alerta_aviso">No se ha podido eliminar el libro</p>
    <?php endif; ?>
    <?php Utils::deleteSession('delete'); ?>
</div>

<a href="<?= base_url ?>/libro/cargar"><div class="botonAdmin">Cargar libro</div></a>

<table class="tablaGestion">
    <thead>
        <tr>
            <th>ISBN</th>
            <th>TÍTULO</th>
            <th>PRECIO</th>
            <th>STOCK</th>
            <th>FECHA</th>
            <th>ACCIONES</th>
        </tr> 
    </thead>
    <?php while ($lib = $libros->fetchObject()): ?>
        <tbody>
            <tr>
                <td data-titulo="ISBN"><?= $lib->isbn; ?></td>
                <td data-titulo="Titulo"><?= $lib->titulo; ?></td>
                <td data-titulo="Precio"><?= $lib->precio; ?></td>
                <td data-titulo="Stock disponible"><?= $lib->stock; ?></td>
                <td data-titulo="Fecha"><?= $lib->fecha_carga; ?></td>
                <td>
                    <a href="<?= base_url ?>libro/editar&isbn=<?= $lib->isbn ?>">Editar</a>
                    <a href="<?= base_url ?>libro/eliminar&isbn=<?= $lib->isbn ?>">Eliminar</a>
                    <?php if(Utils::existeEnOferta($lib->isbn)):?>
                    <a href="<?= base_url ?>oferta/editar&isbn=<?= $lib->isbn ?>" style="color: #500117">En oferta</a>
                    <?php else : ?>
                    <a href="<?= base_url ?>oferta/crearOferta&isbn=<?= $lib->isbn ?>">Añadir oferta</a>
                    <?php endif;?>
                </td>
            </tr>
        </tbody>
    <?php endwhile; ?>
</table>
<div class="clear"></div>
<div class="divPaginacion" <?= isset($filtro) ? 'style="display: none"' : '' ?>>
    <a href="<?= base_url ?>libro/gestion&pagina=<?= $pagina - 1 ?>"> <button class="paginacion botonAdmin next_prev_paginacion"<?= $pagina <= 1 ? 'disabled="disabled"' : '' ?>><</button></a>
    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <a href="<?= base_url ?>libro/gestion&pagina=<?= $i ?>"> <div class="paginacion botonAdmin <?= $pagina == $i ? 'active' : '' ?>"><?= $i ?></div></a>
    <?php endfor; ?>
    <a href="<?= base_url ?>libro/gestion&pagina=<?= $pagina + 1 ?>"> <button class="paginacion botonAdmin next_prev_paginacion"<?= $pagina >= $totalPaginas ? 'disabled="disabled"' : '' ?>>></button></a>
</div>
