<h2>Registrarse como nuevo usuario</h2>

<form action="index.php?controller=usuario&action=save" method="POST">
    
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required />

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido" required />

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" />

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" />

    <input type="submit" value="Registrarme" />
</form>
