<a href="<?=base_url?>libro/gestion"><div class="btnVolverCarrito"><</div></a>
<?php if(isset($edit) && isset($lib) && is_object($lib)):?>
    <h2>Editar libro "<?=$lib->titulo?>"</h2>
    <?php $url_action = base_url."libro/save&isbn=".$lib->isbn;?>
<?php else: ?>
    <h2>Cargar nuevo libro</h2>
    <?php $url_action = base_url."libro/save";?>
    <div id="buscarLibroCargar">
        <input id="cargaLibro" placeholder="Titulo o autor del libro">
        <button id="button" class="botonSmall"></button>
        <h4>Resultados para su búsqueda</h4>
        <div id="divSelect">
            <select id="miSelect" onChange="elegir()"></select>
        </div>
    </div>
<?php endif;?>  
    
<div id="divLibro">
    <form action="<?= $url_action ?>" method="post">
        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" id="isbn" value="<?= isset($lib) && is_object($lib) ? $lib->isbn : '' ?>">

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?= isset($lib) && is_object($lib) ? $lib->titulo : '' ?>">

        <label for="genero">Género:</label>
        <input type="text" name="genero" id="genero" value="<?= isset($lib) && is_object($lib) ? $lib->genero : '' ?>">

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" value="<?= isset($lib) && is_object($lib) ? $lib->autor : '' ?>">

        <label for="portadaForm">Portada:</label>
        <input type="text" name="portadaForm" id="portadaForm" value="<?= isset($lib) && is_object($lib) ? $lib->portada : '' ?>">

        <label for="resenia">Reseña:</label>
        <textarea name="resenia" id="resenia">"<?= isset($lib) && is_object($lib) ? $lib->resenia : '' ?>" </textarea>

        <label for="fecha_carga">Fecha de carga:</label>
        <input type="date" name="fecha_carga" id="fecha_carga" value="<?= isset($lib) && is_object($lib) ? $lib->fecha_carga : '' ?>">

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" value="<?= isset($lib) && is_object($lib) ? $lib->precio : '' ?>" min="1" max="10000">

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="<?= isset($lib) && is_object($lib) ? $lib->stock : '' ?>" min="1" max="10000" step="1">

        <input type="submit" value="Guardar">
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="<?=base_url?>/assets/js/book.js"></script>
 
