<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/header.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/footer.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/home.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/events.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/classes.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/store.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/membership.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/login.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/register.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/admin.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/cart.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/layout.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e29c046690.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <!--BLOCK 1-->
        <header>
            <nav>
                <input type="checkbox" id="res-menu">
                <label for="res-menu">
                    <i class="fa fa-bars" id="sign-one"></i>
                    <i class="fa fa-times" id="sign-two"></i>
                </label>
                <ul class="navOne">
                    <li><i class="fas fa-globe"></i><a href="#">Language</a></li>
                    <li><i class="far fa-dot-circle"></i><a href="#">Live stream</a></li>
                    <?php if(isset($_SESSION['admin'])) : ?>
                    <li><i class="fas fa-user-cog"></i><a href="<?=base_url?>admin/gestion">ADMINISTRADOR</a></li>
                    <?php endif; ?>
                </ul>
                <ul class="navTwo">
                    <li><i class="fas fa-search"></i><a href="#">Search</a></li>
                    <?php if(!isset($_SESSION['identity'])) : ?>
                    <li class="item-none"><i class="fas fa-lock"></i><a href="<?= base_url ?>usuario/login">Log in</a></li>
                    <?php else: ?>
                        <li class="drop">
                        <i class="far fa-user"></i><a href="#">Account</a>
                        <ul>
                            <li><a href="<?= base_url ?>usuario/profile">Profile</a></li>
                            <li><a href="<?= base_url ?>cart/index">Cart</a></li>
                            <li><a href="<?= base_url ?>addres/myAddres">Address</a></li>
                            <li><a href="<?= base_url ?>usuario/logout">Log out</a></li>
                        </ul>
                    </li>
                    <?php endif;?>
                </ul>
                <ul class="navThree">
                    <li class="item-none"><i class="fas fa-globe"></i><a href="#">Language</a></li>
                    <li class="item-none"><i class="far fa-dot-circle"></i><a href="#">Live stream</a></li>
                    <li class="item-none"><i class="fas fa-search"></i><a href="#">Search</a></li>
                    <?php if(!isset($_SESSION['identity'])) : ?>
                    <li class="item-none"><i class="fas fa-lock"></i><a href="<?= base_url ?>usuario/login">Log in</a></li>
                    <?php else: ?>
                        <li class="item-none"><i class="fas fa-lock"></i><a href="<?= base_url ?>usuario/logout">Log out</a></li>
                    <?php endif;?>
                    <li><a href="<?= base_url ?>home/index">HOME</a></li>
                    <li><a href="<?= base_url ?>eventos/home">EVENTS</a></li>
                    <li><a href="<?= base_url ?>classes/home">CLASSES</a></li>
                    <li><a href="<?= base_url ?>membership/home">MEMBERSHIP</a></li>
                    <li><a href="<?= base_url ?>store/home">STORE</a></li>
                    <li class="drop">
                        <a href="#">ABOUT</a>
                        <ul>
                            <li><a href="#">Sergio/School</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Podcast</a></li>
                            <li><a href="#">Press.</a></li>
                        </ul>

                    </li>
                </ul>
            </nav>
        </header>