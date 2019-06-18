<link rel="stylesheet" type="text/css" href="<?=base_url?>/assets/css/styles.css">

<div id="divGestionLibro"><h2>Gestión de libros</h2></div>
<a href="<?=base_url?>libro/cargar" class="boton botonAdmin">
	Cargar Libro
</a>
	
<table id="tablaGestionLibro">
    <tr>
        <th>ISBN</th>
        <th>TÍTULO</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>FECHA</th>
    </tr>
    <?php while($lib = $libros->fetchObject()): ?>
        <tr>
            <td><?=$lib->isbn;?></td>
            <td><?=$lib->titulo;?></td>
            <td><?=$lib->precio;?></td>
            <td><?=$lib->stock;?></td>
            <td><?=$lib->fecha_carga;?></td>
        </tr>
    <?php endwhile; ?>
</table>

<div class="boton botonAdmin"><a href="<?=base_url?>/usuario/admin">Volver</a></div>