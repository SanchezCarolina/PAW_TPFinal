<a href="<?=base_url?>pedido/gestion"><div class="btnVolverCarrito"><</div></a>
<h2>Detalle del pedido</h2>
<?php if (isset($pedido)): ?>
    <?php if (isset($_SESSION['admin'])): ?>
        <h3 id="detalleH3">Cambiar estado del pedido</h3>
        <form action="<?=base_url?>pedido/estado" method="post">
            <input type="hidden" value="<?= $pedido->nro_pedido ?>" name="pedido_nro">
            <select name="estado" id="selectDetalle">
                <option value="confirm" <?=$pedido->estado == 'confirm' ? 'selected' : ''?>>Pendiente</option>
                <option value="preparation" <?=$pedido->estado == 'preparation' ? 'selected' : ''?>>En preparación</option>
                <option value="ready" <?=$pedido->estado == 'ready' ? 'selected' : ''?>>Preparado para enviar</option>
                <option value="sended" <?=$pedido->estado == 'sended' ? 'selected' : ''?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado" id="detalleSubmit">
        </form>
    <?php endif; ?>
    <h2 class="divH2">Datos del pedido:</h2>
    <p class="pPedido"> Estado: <?= Utils::showStatus($pedido->estado) ?></p>
    <p class="pPedido"> N° de pedido: <?= $pedido->nro_pedido ?></p>
    <p class="pPedido"> Total a pagar: $<?= $pedido->monto ?></p>
    <p class="pPedido"> Productos:</p>
    <table id="tablaGestionLibro">
        <tr>
            <th>PORTADA</th>
            <th>TÍTULO</th>
            <th>PRECIO</th>
            <th>UNIDADES</th>
        </tr>
        <?php while ($libro = $libros->fetchObject()): ?>
            <tr>
                <td><img src="<?= $libro->portada ?>" class="imgCarrito"></td>
                <td><?= $libro->titulo ?></td>
                <td><?= $libro->precio ?></td>
                <td><?= $libro->unidades ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>