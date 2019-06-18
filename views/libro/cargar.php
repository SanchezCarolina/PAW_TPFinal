<h2>Cargar nuevo libro</h2>

<form action="<?=base_url?>libro/save" method="post">
    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" id="isbn">
    
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo">
    
    <label for="genero">Género:</label>
    <input type="text" name="genero" id="genero">
    
    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor">
    
    <label for="portadaForm">Portada:</label>
    <input type="text" name="portadaForm" id="portadaForm">
    
    <label for="reseña">Reseña:</label>
    <textarea name="reseña" id="reseña"> </textarea>
    
    <label for="fecha_carga">Fecha de carga:</label>
    <input type="date" name="fecha_carga" id="fecha_carga">
    
    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio">
    
    <label for="stock">Stock:</label>
    <input type="number" name="stock" id="stock">
    
    <input type="submit" value="Cargar">
</form>
