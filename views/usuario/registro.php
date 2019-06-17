<div id="divRegistro"><h2>Registrarse como nuevo usuario</h2></div>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong class="alert_green" style="color: green; font-weight:bold; text-align: center">Registro completado correctamente!</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red" style="color: red; font-weight:bold; text-align: center">Registro fallido! Introduzca bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>


<form action="<?=base_url?>usuario/save" method="POST">
    
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre"  />

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido"  />

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" />

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" />

    <input type="submit" value="Registrarme" />
</form>
