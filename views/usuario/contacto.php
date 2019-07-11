<h2>Formulario de contacto</h2>

<?php if(isset($_SESSION['correoEnviado']) && $_SESSION['correoEnviado'] = 'complete'):?>
<h2 class="alerta_aviso">Gracias por su mensaje, le responderemos a la brevedad</h2>
<?php elseif(isset($_SESSION['correoEnviado']) && $_SESSION['correoEnviado'] = 'failed'):?>
<h2 class="alerta_aviso">Lo sentimos, su mensaje no pudo ser enviado</h2>
<?php endif;?>
<?php Utils::deleteSession('correoEnviado'); ?>

<form action="<?=base_url?>usuario/recibirFormContacto" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="mensaje">Mensaje:</label>
    <textarea placeholder="Escriba aquí su duda y/o sugerencia..." name="mensaje" cols="30" rows="10" required></textarea>
    
    <input type="submit" value="Enviar">
</form>
