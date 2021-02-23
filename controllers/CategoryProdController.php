<?php
require_once 'models/User.php';
require_once 'models/categoryProduct.php';

class CategoryProdController
{
    public function index()
    {
        echo 'esta es la pagina index de usuarios';
    }

    public function getCategory(){
        $category =  new CategoryProduct();
        $cat = $category->getAll();
        require_once 'views/admin/products.php';
    }

    public function save()
    {
        if (isset($_POST['action']) == 'create') {
            echo json_encode($_POST);
            $status = 1;
            $category = isset($_POST['nombre_cat_productos']) ? filter_var($_POST['nombre_cat_productos'], FILTER_SANITIZE_STRING) : false;
            $cat = new CategoryProduct();
            $cat->setNombre_cat_productos($category);
            $cat->setStatus_cat_prod($status);
            $test = $cat->save();
        }
        require_once 'views/admin/products.php';
    }

    public function users()
    {
        $users = new User();
        $users = $users->getUsers();
        require_once 'views/admin/users.php';
    }

}
