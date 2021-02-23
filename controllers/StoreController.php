<?php
require_once 'models/Product.php';
class StoreController
{
    public function Home()
    {
        $product =  new Product();
        $prod = $product->getAll();
        require_once 'views/layout/header.php';
        require_once 'views/layout/store.php';
        require_once 'views/layout/footer.php';
    }
}
