<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h2 class="alerta_aviso">Tu pedido se ha confirmado!</h2>
    <p class="parrafo">
        Tu pedido ha sido guardado exitosamente, una vez que se acredite el pago del mismo,
        será procesado y enviado.
    </p>
    <br>
    <?php if (isset($pedido)): ?>
        <h2 class="divH2">Datos del pedido:</h2>
        <p><strong class="strongPedido"> N° de pedido: </strong><?= $pedido->nro_pedido ?></p>
        <p><strong class="strongPedido"> Total a pagar:</strong> $<?= $pedido->monto ?></p>
        <p><strong class="strongPedido"> Productos:</strong></p>
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
                        <td data-titulo="Título"><?= $libro->titulo ?></td>
                        <td data-titulo="Precio"><?= $libro->precio ?></td>
                        <td data-titulo="Unidades"><?= $libro->unidades ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h2 class="alerta_aviso">Tu pedido no se ha podido procesar!</h2>
<?php endif; ?>
