<?php if (isset($_SESSION['admin'])): ?>
    <a href="<?= base_url ?>pedido/gestion"><div class="botonBack botonAdmin"><</div></a>
<?php else: ?>
    <a href="<?= base_url ?>pedido/mis_pedidos"><div class="botonBack botonAdmin"><</div></a>
<?php endif; ?>    

<h2>Detalle del pedido</h2>
<?php if (isset($pedido)): ?>
    <?php if (isset($_SESSION['admin'])): ?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?= base_url ?>pedido/estado" method="post">
            <input type="hidden" value="<?= $pedido->nro_pedido ?>" name="pedido_nro">
            <select name="estado" id="selectDetalle">
                <option value="confirm" <?= $pedido->estado == 'confirm' ? 'selected' : '' ?>>Pendiente</option>
                <option value="preparation" <?= $pedido->estado == 'preparation' ? 'selected' : '' ?>>En preparación</option>
                <option value="ready" <?= $pedido->estado == 'ready' ? 'selected' : '' ?>>Preparado para enviar</option>
                <option value="sended" <?= $pedido->estado == 'sended' ? 'selected' : '' ?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado" id="detalleSubmit">
        </form>
    <?php endif; ?>
    <h2 class="divH2">Datos del pedido:</h2>
    <p> <strong class="strongPedido">Estado: </strong><?= Utils::showStatus($pedido->estado) ?></p>
    <p> <strong class="strongPedido">N° de pedido:</strong> <?= $pedido->nro_pedido ?></p>
    <p> <strong class="strongPedido">Total a pagar: $</strong><?= $pedido->monto ?></p>
    <p> <strong class="strongPedido">Productos:</strong></p>
    <table class="tablaGestion">
        <thead>
            <tr>
                <th>PORTADA</th>
                <th>TÍTULO</th>
                <th>PRECIO</th>
                <th>UNIDADES</th>
            </tr>   
        </thead>
        <tbody>
            <?php while ($libro = $libros->fetchObject()): ?>
                <tr>
                    <td><img alt="Portada de libro" src="<?= $libro->portada ?>" class="imgPedido"></td>
                    <td data-titulo="Titulo"><?= $libro->titulo ?></td>
                    <td data-titulo="Precio"><?= $libro->precio ?></td>
                    <td data-titulo="Unidades"><?= $libro->unidades ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php endif; ?>