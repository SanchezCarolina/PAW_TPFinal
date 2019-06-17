 <link rel="stylesheet" type="text/css" href=<?=base_url?>/assets/css/styles.css>
       


<div id="login">
    <div id="divLogin"><h2>Login</h2></div>
    <form id="formLogin" action="<?=base_url?>usuario/login" method="post">
        <label>Usuario:</label>
        <input type="email" name="email" id="email">
        <label>Contraseña:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Iniciar Sesión">
    </form>
    <?php if(isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'failed'):?>
        <strong class="alert_red" style="color: red; font-weight:bold; text-align: center;">Login fallido! Introduzca bien los datos</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('error_login'); ?>
</div>
    
    