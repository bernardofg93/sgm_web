<?php

class eventosController
{
    public function index()
    {
        echo 'pagina index eventos';
    }

    public function home()
    {
        require_once 'views/layout/header.php';
        require_once 'views/layout/events.php';
        require_once 'views/layout/footer.php';
    }
}
