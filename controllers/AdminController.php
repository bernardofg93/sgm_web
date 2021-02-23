<?php
require_once 'models/Product.php';
require_once 'models/User.php';
require_once 'models/CategoryProduct.php';
class AdminController 
{
    public function index()
    {
        echo 'esta es la pagina index de usuarios';
    }

    public function gestion(){
        require_once 'views/layout/header.php';
        require_once 'views/admin/layout.php';
        require_once 'views/layout/footer.php';   
    }

    public function personal(){
    require_once 'views/admin/personal.php';
    }

    public function courses(){
        require_once 'views/layout/header.php';
        require_once 'views/classes/course.php';
        require_once 'views/layout/footer.php';   
    }
    
    public function users(){
    $users = new User();
    $users = $users->getUsers();
    require_once 'views/layout/header.php';
    require_once 'views/admin/users.php';
    require_once 'views/layout/footer.php';   
    }
}