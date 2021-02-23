<?php

class Utils 
{
    public static function statsCart() {
        $stats = array(
            'count' => 0,
            'total' => 0
        );

    if(isset($_SESSION['cart'])) {
        $stats['count'] = count($_SESSION['cart']);

        foreach($_SESSION['cart'] as $product){
            $stats['total'] += $product['precio']*$product['units'];
        }
    }

    return $stats;
}

}