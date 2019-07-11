<h2>Carrito de compra</h2>
<?php $stats = Utils::statsCarrito(); ?>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
    <table id="tablaGestionLibro">
        <tr>
            <th>PORTADA</th>
            <th>TÍTULO</th>
            <th>PRECIO</th>
            <th>UNIDADES</th>
            <th>ELIMINAR</th>
        </tr>
        <?php
        foreach ($carrito as $indice => $elemento):
            $libro = $elemento['libro'];
            ?>
            <tr>
                <td><img src="<?= $libro->portada ?>" class="imgCarrito"></td>
                <td><?= $libro->titulo ?></td>
                <td><?= $libro->precio ?></td>
                <td>
                    <?php if ($elemento['unidades'] <= $libro->stock): ?>
                        <?= $elemento['unidades'] ?>
                    <?php else: ?>
                        <h2 class="alert_red">No hay stock suficiente</h2>
                        <?php
                        $sinStock = true;
                        ?>
                    <?php endif; ?>
                    <div class="updown_unidades">
                        <a href="<?= base_url ?>/carrito/up&index=<?= $indice ?>" class="botonUnidades td_a">+</a>
                        <a href="<?= base_url ?>/carrito/down&index=<?= $indice ?>" class="botonUnidades td_a">-</a>
                    </div>
                </td>
                <td><a href="<?= base_url ?>carrito/remove&index=<?= $indice ?>" class="td_a"><div class="boton btnQuitar btnAcciones">Quitar producto</div></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div id="deleteCarrito">
        <a href="<?= base_url ?>carrito/delete_all"><div class="boton btnAcciones btnDelete">Vaciar carrito</div></a>
    </div>
    <div id="resumenCarrito">   
        <h3>Precio Total: $<?= $stats['total'] ?></h3>
        <?php if (Utils::noStock($sinStock)): ?>
            <a href="<?= base_url ?>carrito/index"><div class="boton btnAcciones btnPedido">Realizar pedido</div></a>
        <?php else: ?>
            <a href="<?= base_url ?>pedido/realizar"><div class="boton btnAcciones btnPedido">Realizar pedido</div></a>
        <?php endif; ?>
    </div>

<?php else: ?>
<p class="alerta_aviso">El carrito está vacio, añade algun producto</p>
<?php endif; ?>