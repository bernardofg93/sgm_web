<?php

class classesController
{
    public function index()
    {
        echo 'pagina index classes';
    }

    public function home()
    {
        require_once 'views/layout/header.php';
        require_once 'views/layout/clasess.php';
        require_once 'views/layout/footer.php';
    }
}
