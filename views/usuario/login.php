<div id="login">
    <h2>Login</h2>
    <form id="formLogin" action="<?=base_url?>usuario/login" method="post">
        <label>Usuario:</label>
        <input type="email" name="email" id="email">
        <label>Contraseña:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Iniciar Sesión" id="submitLogin">
    </form>
    
    <?php if(isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'failed'):?>
    <p class="alerta_aviso">Login fallido! Vuelva a introducir los datos</p>
    <?php endif; ?>
    <?php Utils::deleteSession('error_login'); ?>
</div>
   
    