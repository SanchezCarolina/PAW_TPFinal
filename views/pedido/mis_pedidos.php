<a href="<?=base_url?>usuario/admin"><div class="btnVolverCarrito"><</div></a>
<?php if (isset($gestion)): ?>
    <h2>Gestionar pedidos</h2>
<?php else: ?>
    <h2>Mis pedidos</h2>
<?php endif; ?>    
<table id="tablaGestionLibro">
    <tr>
        <th>N° PEDIDO</th>
        <th>TOTAL</th>
        <th>FECHA</th>
        <th>ESTADO  </th>
    </tr>
    <?php while ($p = $pedidos->fetchObject()): ?>
        <tr>
            <td><a href="<?= base_url ?>pedido/detalle&nro_pedido=<?= $p->nro_pedido ?>" class="a_pedido"><?= $p->nro_pedido ?></a></td>
            <td>$<?= $p->monto ?></td>
            <td><?= $p->fecha ?></td>
            <td><?= Utils::showStatus($p->estado) ?></td>
        </tr>
    <?php endwhile; ?>
</table>