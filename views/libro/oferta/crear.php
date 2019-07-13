<a href="<?=base_url?>libro/gestion"><div class="btnVolverCarrito"><</div></a>
<?php if(isset($edit) && isset($ofer) && is_object($ofer)):?>
<h2>Editar oferta</h2>
<?php $url_action = base_url."oferta/save&isbn=".$ofer->isbn;?>
<form action="<?=$url_action?>" method="post">
    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" value="<?= isset($ofer) && is_object($ofer) ? $ofer->isbn : '' ?>">
    
    <label for="descuento">Descuento(en %):</label>
    <input type="number" name="descuento" value="<?= isset($ofer) && is_object($ofer) ? $ofer->descuento : '' ?>">
    
    <input type="submit" value="Guardar">
</form>
<?php else: ?>
<h2>Nueva oferta</h2>

<form action="<?=base_url?>oferta/save" method="post">
    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" value="<?= isset($lib) && is_object($lib) ? $lib->isbn : '' ?>">
    
    <label for="descuento">Descuento(en %):</label>
    <input type="number" name="descuento" min="1" max="99" step="1">
    
    <input type="submit" value="Agregar">
</form>
<?php endif; ?>