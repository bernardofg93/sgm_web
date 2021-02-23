  <?php if(isset($register) && is_object($register)) :?>
        <?php $action = 'edit';?>
    <?php else :?>
        <?php $action = 'insert';?>
    <?php endif;?>
<div class="container-register cont-image">
    <h1>Registro</h1>
    <form method="POST" id="formRegister">
    <legend></legend>
        <input type="text" placeholder="Nombre" id="us_nombre">
        <input type="text" placeholder="Apellidos" id="us_apellidos">
        <input type="email" placeholder="Correo" id="correo">
        <input type="password" placeholder="Contraseña" id="password">
        <input type="hidden" id="action" value="<?php echo $action ?>">
        <input type="submit" value="Aceptar" class="boton-register">
    </form>
</div>

<script src="<?= base_url ?>assets/js/register.js"></script>