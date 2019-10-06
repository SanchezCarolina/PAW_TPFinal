<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <p class="alerta_aviso">Registro completado correctamente!</p>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <p class="alerta_aviso">Registro fallido! Introduzca bien los datos</p>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<div id="registro">
    <h2>Registrarse como nuevo usuario</h2>
    <form action="<?= base_url ?>usuario/save" method="POST">

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
</div>