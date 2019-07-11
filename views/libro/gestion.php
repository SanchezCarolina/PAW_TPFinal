<a href="<?=base_url?>usuario/admin"><div class="btnVolverCarrito"><</div></a>
<h2>Gestión de libros</h2>

<!-- SESIÓN PARA CUANDO SE CARGA UN NUEVO LIBRO-->
<div>
    <?php if(isset($_SESSION['libro']) && $_SESSION['libro'] == 'complete'):?>
    <strong class="alerta_aviso strongAvisos">Libro cargado exitosamente!</strong>
    <?php elseif(isset($_SESSION['libro']) && $_SESSION['libro'] == 'failed'): ?>
    <strong class="alerta_aviso strongAvisos">No se ha podido cargar el libro, ya se encuentra en la base de datos</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('libro'); ?>
</div>  

<!-- SESIÓN PARA CUANDO SE EDITA UN LIBRO-->
<div>
    <?php if(isset($_SESSION['edit']) && $_SESSION['edit'] == 'complete'):?>
    <strong class="alerta_aviso strongAvisos">El libro se ha actualizado exitosamente!</strong>
    <?php elseif(isset($_SESSION['edit']) && $_SESSION['edit'] == 'failed'): ?>
    <strong class="alerta_aviso strongAvisos">No se ha podido actualizar el libro</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('edit'); ?>
</div>

<!-- SESIÓN PARA CUANDO SE ELIMINA UN LIBRO-->
<div>
    <?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'):?>
    <strong class="alerta_aviso strongAvisos">El libro se ha eliminado exitosamente!</strong>
    <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
    <strong class="alerta_aviso strongAvisos">No se ha podido eliminar el libro</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('delete'); ?>
</div>

<a href="<?=base_url?>/libro/cargar"><div class="boton btnAcciones botonAdmin">Cargar libro</div></a>

<table id="tablaGestionLibro">
    <tr>
        <th>ISBN</th>
        <th>TÍTULO</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>FECHA</th>
        <th>ACCIONES</th>
    </tr>
    <?php while($lib = $libros->fetchObject()): ?>
        <tr>
            <td><?=$lib->isbn;?></td>
            <td><?=$lib->titulo;?></td>
            <td><?=$lib->precio;?></td>
            <td><?=$lib->stock;?></td>
            <td><?=$lib->fecha_carga;?></td>
            <td>
                <a href="<?=base_url?>libro/editar&isbn=<?=$lib->isbn?>"><div class="boton btnAcciones">Editar</div></a>
                <a href="<?=base_url?>libro/eliminar&isbn=<?=$lib->isbn?>"><div class="boton btnAcciones">Eliminar</div></a>
                <a href="<?=base_url?>oferta/crearOferta&isbn=<?=$lib->isbn?>" id="a_oferta"><div class="boton btnAcciones">Añadir oferta</div></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

