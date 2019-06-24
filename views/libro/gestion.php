<link rel="stylesheet" type="text/css" href="<?=base_url?>/assets/css/styles.css">

<div id="divGestionLibro"><h2>Gestión de libros</h2></div>

<!-- SESIÓN PARA CUANDO SE CARGA UN NUEVO LIBRO-->
<div>
    <?php if(isset($_SESSION['libro']) && $_SESSION['libro'] == 'complete'):?>
    <strong class="alert_green">Libro cargado exitosamente!</strong>
    <?php elseif(isset($_SESSION['libro']) && $_SESSION['libro'] == 'failed'): ?>
    <strong class="alert_red">No se ha podido cargar el nuevo libro</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('libro'); ?>
</div>  
<!-- SESIÓN PARA CUANDO SE ELIMINA UN LIBRO-->
<div>
    <?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'):?>
    <strong class="alert_green">El libro se ha eliminado exitosamente!</strong>
    <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
    <strong class="alert_red">No se ha podido eliminar el libro</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('delete'); ?>
</div>
    
<a href="<?=base_url?>libro/cargar" class="boton botonAdmin">
	Cargar Libro
</a>

<div class="boton botonAdmin btnVolver"><a href="<?=base_url?>/usuario/admin">Volver</a></div>

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
                <a href="<?=base_url?>libro/editar&isbn=<?=$lib->isbn?>" class="boton botonAccion btnVerde">Editar</a>
                <a href="<?=base_url?>libro/eliminar&isbn=<?=$lib->isbn?>" class="boton botonAccion btnRojo">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

