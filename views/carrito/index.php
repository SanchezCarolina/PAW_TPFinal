<h2>Carrito de compra</h2>
<?php $stats = Utils::statsCarrito(); ?>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
    <table class="tablaGestion">
        <thead>
            <tr>
                <th>PORTADA</th>
                <th>TÍTULO</th>
                <th>PRECIO</th>
                <th>UNIDADES</th>
                <th>ELIMINAR</th>
            </tr>   
        </thead>
        <tbody>
            <?php
            foreach ($carrito as $indice => $elemento):
                $libro = $elemento['libro'];
                ?>
                <tr>
                    <td><img alt="Portada del libro" src="<?= $libro->portada ?>" class="imgPedido"></td>
                    <td data-titulo="Titulo"><?= $libro->titulo ?></td>

                    <?php if (Utils::existeEnOferta($libro->isbn)): ?>
                    <td data-titulo="Precio"><?= $libro->new_precio ?></td>
                    <?php else: ?>
                    <td data-titulo="Precio"><?= $libro->precio ?></td>
                <?php endif; ?>

                    <td data-titulo="Unidades">
                        <div class="botonUnidMobile"><a href="<?= base_url ?>/carrito/down&index=<?= $indice ?>" class="botonUnidades botonAdmin">-</a></div>
                        <div class="botonUnidMobile"><a href="<?= base_url ?>/carrito/up&index=<?= $indice ?>" class="botonUnidades botonAdmin">+</a></div>
                        <?php if ($elemento['unidades'] <= $libro->stock): ?>
                            <?= $elemento['unidades'] ?>
                        <?php else: ?>
                            <p class="alerta_roja">Sin stock</p>
                            <?php
                            $sinStock = true;
                            ?>
                        <?php endif; ?>
                        <div class="updown-unidades">
                            <a href="<?= base_url ?>/carrito/down&index=<?= $indice ?>" class="botonUnidades botonAdmin">-</a>
                            <a href="<?= base_url ?>/carrito/up&index=<?= $indice ?>" class="botonUnidades botonAdmin">+</a>    
                        </div>

                    </td>
                    <td><a href="<?= base_url ?>carrito/remove&index=<?= $indice ?>"><div class="btnQuitar"></div></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <div id="deleteCarrito">
        <a href="<?= base_url ?>carrito/delete_all"><div class="botonAdmin botonPedido">Vaciar carrito</div></a>
    </div>
    <div id="resumenCarrito">   
        <h3>Precio Total: $<?= $stats['total'] ?></h3>
        <?php if (Utils::noStock($sinStock)): ?>
            <a href="<?= base_url ?>carrito/index"><div class="botonAdmin botonPedido">Realizar pedido</div></a>
        <?php else: ?>
            <a href="<?= base_url ?>pedido/realizar"><div class="botonAdmin botonPedido">Realizar pedido</div></a>
        <?php endif; ?>
    </div>

<?php else: ?>
    <p class="alerta_roja">El carrito está vacio, añade algun producto</p>
<?php endif; ?>