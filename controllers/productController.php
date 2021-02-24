<?php
require_once 'models/User.php';
require_once 'models/Product.php';
require_once 'models/CategoryProduct.php';
class productController
{
    public function index()
    {
        echo 'esta es la pagina index de usuarios';
    }

    public function gestion()
    {
        require_once 'views/admin/layout.php';
    }

    public function personal()
    {
        require_once 'views/admin/personal.php';
    }

    public function category()
    {
        require_once 'views/admin/products.php';
    }

    public function view()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'] ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : false;
            $data =  new Product();
            $data->setId_producto($id);
            $product = $data->getOne();
            require_once 'views/layout/header.php';
            require_once 'views/product/view.php';
            require_once 'views/layout/footer.php'; 
        }
    }
    
    public function products(){
        $category =  new CategoryProduct();
        $cat = $category->getAll();
        $products = new Product();
        $prod = $products->getAll();
        require_once 'views/layout/header.php';
        require_once 'views/admin/products.php';
        require_once 'views/layout/footer.php';      
    }

    public function save()
    {
        // echo json_encode($_POST);
        //echo json_encode($_FILES);
        if (isset($_POST)) {
            $nombre = $_POST['nombre'] ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
            $descripcion = $_POST['descripcion'] ? filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING) : false;
            $precio = $_POST['precio'] ? filter_var($_POST['precio'], FILTER_VALIDATE_INT) : false;
            $stock = $_POST['stock'] ? filter_var($_POST['stock'], FILTER_VALIDATE_INT) : false;
            $oferta = $_POST['oferta'] ? filter_var($_POST['oferta'], FILTER_VALIDATE_INT) : false;

            if ($nombre && $descripcion && $precio && $stock && $oferta) {
                $product = new Product();
                $product->setNombre_pro($nombre);
                $product->setDescripcion_pro($descripcion);
                $product->setPrecio_pro($precio);
                $product->setStock_pro($stock);
                $product->setOferta_pro($oferta);

                if (isset($_FILES['img'])) {
                    $file = $_FILES['img'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png') {
                        if (!is_dir('uploads/images/products')) {
                            mkdir('uploads/images/products', 0777, true);
                        }
                        $product->setImagen_pro($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/products/' . $filename);
                    }
                }

                if ($_POST['action'] == 'create'){
                    $json = $product->save();
                }else{
                    $id_product = filter_var($_POST['id_producto'], FILTER_SANITIZE_NUMBER_INT);
                    $product->setId_producto($id_product);
                    $json = $product->edit();
                } 
            }
        }
        echo json_encode($json);
    }

    public function edit(){
       if(isset($_GET)){
        $id = $_GET['id'];
        $category =  new CategoryProduct();
        $cat = $category->getAll();
        $product = new Product();
        $product->setId_producto($id);
        $pro = $product->getOne();
        require_once 'views/layout/header.php';
        require_once 'views/product/edit.php';
        require_once 'views/layout/footer.php';
       }
    }

    public function delete()
    {
        if (isset($_GET)) {
            $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : false;
            $product = new Product();
            $product->setId_producto($id);
            $result = $product->delete();
        }
        echo json_encode($result);
    }

    public function users()
    {
        $users = new User();
        $users = $users->getUsers();
        require_once 'views/admin/users.php';
    }
}
