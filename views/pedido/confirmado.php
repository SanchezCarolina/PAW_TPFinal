<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h2 class="alerta_aviso">Tu pedido se ha confirmado!</h2>
    <p class="parrafo">
        Tu pedido ha sido guardado exitosamente, una vez que se acredite el pago del mismo,
        será procesado y enviado.
    </p>
    <br>
    <?php if (isset($pedido)): ?>
        <h2 class="divH2">Datos del pedido:</h2>
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
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h2 class="alerta_aviso">Tu pedido no se ha podido procesar!</h2>
<?php endif; ?>
