<a href="<?=base_url?>usuario/admin"><div class="btnVolverCarrito"><</div></a>
<h2>Gestión de ofertas</h2>

<!-- SESIÓN PARA CUANDO SE CREA UNA OFERTA-->
<div>
    <?php if(isset($_SESSION['oferta']) && $_SESSION['oferta'] == 'complete'):?>
    <strong class="alerta_aviso strongAvisos">El libro se ha agregado a la sección oferta!</strong>
    <?php elseif(isset($_SESSION['oferta']) && $_SESSION['oferta'] == 'failed'): ?>
    <strong class="alerta_aviso strongAvisos">No se ha podido agregar el libro, ya se encuentra en Oferta</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('oferta'); ?>
</div>

<!-- SESIÓN PARA CUANDO SE EDITA UNA OFERTA-->
<div>
    <?php if(isset($_SESSION['edit']) && $_SESSION['edit'] == 'complete'):?>
    <strong class="alerta_aviso strongAvisos">La oferta se actualizó correctamente!</strong>
    <?php elseif(isset($_SESSION['edit']) && $_SESSION['edit'] == 'failed'): ?>
    <strong class="alerta_aviso strongAvisos">No se ha podido actualizar la oferta</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('edit'); ?>
</div>
    
<!-- SESIÓN PARA CUANDO SE ELIMINA UNA OFERTA-->
<div>
    <?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'):?>
    <strong class="alerta_aviso strongAvisos">La oferta se eliminó correctamente!</strong>
    <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
    <strong class="alerta_aviso strongAvisos">No se ha podido eliminar la oferta</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('delete'); ?>
</div>

<a href="<?=base_url?>/oferta/crearOferta"><div class="boton btnAcciones botonAdmin">Nueva oferta</div></a>

<table id="tablaGestionLibro">
    <tr>
        <th>ISBN</th>
        <th>PRECIO</th>
        <th>ACCIONES</th>
    </tr>
    <?php while($ofer = $ofertas->fetchObject()): ?>
        <tr>
            <td><a href="<?= base_url ?>libro/verLibroIndividual&isbn=<?= $ofer->isbn ?>"><?=$ofer->isbn;?></a></td>
            <td><?=$ofer->new_precio;?></td>
            <td>
                <div id="accionesOferta">
                    <a href="<?=base_url?>oferta/editar&isbn=<?=$ofer->isbn?>"> <div class="boton botonAccion btnAcciones">Editar</div></a>
                    <a href="<?=base_url?>oferta/eliminar&isbn=<?=$ofer->isbn?>"><div class="boton botonAccion btnAcciones">Eliminar</div></a>
                </div>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

