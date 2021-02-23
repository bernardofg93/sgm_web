
<div class="container-login cont-image">
<h1><?= isset($_SESSION['user']) ? $_SESSION['user']->nombre_us : ''?></h1>
<img src="<?=base_url?>assets/img/Logo.png" alt="" class="logo">
    <form action="<?=base_url?>usuario/login" method="POST">
        <input type="email" name="email" id="" placeholder="Email:">
        <input type="password" name="password" id="" placeholder="Password:">
        <input type="submit"value="Login">
        <a href="<?= base_url ?>usuario/registro">Registrarme</a>
    </form>
</div>

