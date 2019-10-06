<script type="text/javascript" src="<?=base_url?>assets/js/formularioEnvio.js"></script>
<?php if(isset($_SESSION['identity'])):?>
<a href="<?=base_url?>carrito/index"><div class="botonBack botonAdmin"><</div></a>

<h3>Complete los datos de envío</h3>
<form name="formEnvio" action="<?=base_url?>pedido/add" method="post">
    <label for="provincia">Provincia</label>
    <select name="provincia" onchange="cambia_provincia()" required> 
        <option value="0" selected>Seleccione...</option> 
        <option value="BuenosAires">Buenos Aires </option>
        <option value="BuenosAires_GBA">Buenos Aires-GBA </option>
        <option value="CapitalFederal">Capital Federal </option>
        <option value="Catamarca">Catamarca </option>
        <option value="Chaco">Chaco </option>
        <option value="Chubut">Chubut </option>
        <option value="Cordoba">Córdoba </option>
        <option value="Corrientes">Corrientes </option>
        <option value="EntreRios">Entre Ríos </option>
        <option value="Formosa">Formosa </option>
        <option value="Jujuy">Jujuy </option>
        <option value="LaPampa">La Pampa </option>
        <option value="LaRioja">La Rioja </option>
        <option value="Mendoza">Mendoza </option>
        <option value="Misiones">Misiones </option>
        <option value="Neuquen">Neuquén </option>
        <option value="RioNegro">Río Negro </option>
        <option value="Salta">Salta </option>
        <option value="SanJuan">San Juan </option>
        <option value="SanLuis">San Luis </option>
        <option value="SantaCruz">Santa Cruz </option>
        <option value="SantaFe">Santa Fe </option>
        <option value="SantiagoDelEstero">Santiago del Estero </option>
        <option value="TierraDelFuego">Tierra del Fuego </option>
        <option value="Tucuman">Tucumán </option>
    </select>
    
    <label for="localidad">Localidad</label>
    <select name="localidad" required> 
    <option value="-">- </option>
    </select> 
    
    <label for="cod_pos">Código postal</label>
    <input type="text" name="cod_pos" required>
    
    <label for="direccion">Dirección</label>
    <input type="text" name="direccion" required>
    
    <input type="submit" value="Confirmar">
</form>
<?php else:?>
<h2 class="alerta_aviso">Debes iniciar sesión para realizar un pedido</h2>
<?php endif; ?>


