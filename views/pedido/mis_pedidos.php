<?php if (isset($gestion)): ?>
    <a href="<?= base_url ?>usuario/admin"><div class="botonBack botonAdmin"><</div></a>
    <h2>Gestionar pedidos</h2>
<?php else: ?>  
    <a href="<?= base_url ?>libro/index"><div class="botonBack botonAdmin"><</div></a>
    <h2>Mis pedidos</h2>
<?php endif; ?>    
<table class="tablaGestion">
    <thead>
        <tr>
            <th>N° PEDIDO</th>
            <th>TOTAL</th>
            <th>FECHA</th>
            <th>ESTADO  </th>
        </tr> 
    </thead>
    <tbody>
        <?php while ($p = $pedidos->fetchObject()): ?>
            <tr>
                <td data-titulo="N° Pedido"><a href="<?= base_url ?>pedido/detalle&nro_pedido=<?= $p->nro_pedido ?>" class="link_tabla"><?= $p->nro_pedido ?></a></td>
                <td data-titulo="Monto">$<?= $p->monto ?></td>
                <td data-titulo="Fecha"><?= $p->fecha ?></td>
                <td data-titulo="Estado"><?= Utils::showStatus($p->estado) ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<div class="divPaginacion" <?= isset($filtro) ? 'style="display: none"' : '' ?>>
    <a href="<?= base_url ?>pedido/mis_pedidos&pagina=<?= $pagina - 1 ?>"> <button class="paginacion botonAdmin next_prev_paginacion"<?= $pagina <= 1 ? 'disabled="disabled"' : '' ?>><</button></a>
    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <a href="<?= base_url ?>pedido/mis_pedidos&pagina=<?= $i ?>"> <div class="paginacion botonAdmin <?= $pagina == $i ? 'active' : '' ?>"><?= $i ?></div></a>
    <?php endfor; ?>
    <a href="<?= base_url ?>pedido/mis_pedidos&pagina=<?= $pagina + 1 ?>"> <button class="paginacion botonAdmin next_prev_paginacion"<?= $pagina >= $totalPaginas ? 'disabled="disabled"' : '' ?>>></button></a>
</div>