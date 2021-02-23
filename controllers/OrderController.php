<?php 
require_once 'models/Order.php';
class OrderController
{
    public function makeOrder()
    {
        require_once 'views/layout/header.php';
        require_once 'views/order/make.php';
        require_once 'views/layout/footer.php';
    }

    public function add()
    {
        if(isset($_SESSION['identity'])) {
            // guardar datos en bd
        }else{
            // Redigir al index
            header("Location:".base_url);
        }
    }
}