<?php 
require_once 'models/Product.php';
class CartController
{
    public function index(){
        require_once 'views/layout/header.php';
        $cart = $_SESSION['cart'];
        require_once 'views/cart/index.php';
        require_once 'views/layout/footer.php';
    }
    
    public function add(){
        if (isset($_GET['id'])){
            $product_id = $_GET['id'];
        }else{
            header('Location:'. base_url);
        }

        if(isset($_SESSION['cart'])){
            $counter = 0;
            foreach($_SESSION['cart'] as $indice => $elemento){
                if($elemento['id_product'] == $product_id){
                    $_SESSION['cart'][$indice]['units']++;
                    $counter++;
                }
            }
        }
        if(!isset($counter) || $counter == 0){
                  //conseguir producto
                  $product = new Product();
                  $product->setId_producto($product_id);
                  $product = $product->getOne();
                  //añadir al cart
                  if(is_object($product)){
                      $_SESSION['cart'][] = array(
                          'id_product' => $product->id_producto,
                          'precio' => $product->precio_pro,
                          'units' => 1,
                          "product" => $product
                      );
                  }
             }
             header("Location:".base_url."cart/index");
    }

    public function remove(){

    }

    public function delete_all(){
        unset($_SESSION['cart']);
        header("Location:".base_url."cart/index");
    }
}