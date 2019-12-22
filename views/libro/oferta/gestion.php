<a href="<?= base_url ?>usuario/admin"><div class="botonBack botonAdmin"><</div></a>
<h2>Gestión de ofertas</h2>

<!-- SESIÓN PARA CUANDO SE CREA UNA OFERTA-->
<div>
    <?php if (isset($_SESSION['oferta']) && $_SESSION['oferta'] == 'complete'): ?>
        <p class="alerta_verde">El libro se ha agregado a la sección oferta!</p>
    <?php elseif (isset($_SESSION['oferta']) && $_SESSION['oferta'] == 'failed'): ?>
        <p class="alerta_roja">No se ha podido agregar el libro, ya se encuentra en Oferta</p>
    <?php endif; ?>
    <?php Utils::deleteSession('oferta'); ?>
</div>

<!-- SESIÓN PARA CUANDO SE EDITA UNA OFERTA-->
<div>
    <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == 'complete'): ?>
        <p class="alerta_verde">La oferta se actualizó correctamente!</p>
    <?php elseif (isset($_SESSION['edit']) && $_SESSION['edit'] == 'failed'): ?>
        <p class="alerta_roja">No se ha podido actualizar la oferta</p>
    <?php endif; ?>
    <?php Utils::deleteSession('edit'); ?>
</div>

<!-- SESIÓN PARA CUANDO SE ELIMINA UNA OFERTA-->
<div>
    <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
        <p class="alerta_verde">La oferta se eliminó correctamente!</p>
    <?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
        <p class="alerta_roja">No se ha podido eliminar la oferta</p>
    <?php endif; ?>
    <?php Utils::deleteSession('delete'); ?>
</div>

<a href="<?= base_url ?>/oferta/crearOferta"><div class="botonAdmin">Nueva oferta</div></a>

<table class="tablaGestion">
    <thead>
        <tr>
            <th>ISBN</th>
            <th>TÍTULO</th>
            <th>PRECIO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($ofer = $ofertas->fetchObject()): ?>
            <tr>
                <td data-titulo="ISBN"><a href="<?= base_url ?>libro/verLibroIndividual&isbn=<?= $ofer->isbn ?>" class="link_tabla"><?= $ofer->isbn; ?></a></td>
                <td data-titulo="Título"><?= $ofer->titulo; ?></td>
                <td data-titulo="Precio"><?= $ofer->new_precio; ?></td>
                <td>
                    <a href="<?= base_url ?>oferta/editar&isbn=<?= $ofer->isbn ?>" class="a_editar"> Editar</a>
                    <a href="<?= base_url ?>oferta/eliminar&isbn=<?= $ofer->isbn ?>" class="a_eliminar">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<div class="divPaginacion" <?= isset($filtro) ? 'style="display: none"' : '' ?>>
    <a href="<?= base_url ?>oferta/gestion&pagina=<?= $pagina - 1 ?>"> <button class="paginacion botonAdmin next_prev_paginacion"<?= $pagina <= 1 ? 'disabled="disabled"' : '' ?>><</button></a>
    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <a href="<?= base_url ?>oferta/gestion&pagina=<?= $i ?>"> <div class="paginacion botonAdmin <?= $pagina == $i ? 'active' : '' ?>"><?= $i ?></div></a>
    <?php endfor; ?>
    <a href="<?= base_url ?>oferta/gestion&pagina=<?= $pagina + 1 ?>"> <button class="paginacion botonAdmin next_prev_paginacion"<?= $pagina >= $totalPaginas ? 'disabled="disabled"' : '' ?>>></button></a>
</div>

