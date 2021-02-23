<div class="container-cart">
    <table class="cart-view">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <?php 
            foreach($cart as $index => $element) : 
            $product = $element['product'];
        ?>
        <tr>
            <td>
                <img src="<?=base_url?>uploads/images/products/<?=$product->imagen_pro?>" alt="">
            </td>
            <td>
                <a href="<?= base_url ?>product/view&id=<?=$product->id_producto?>"><?=$product->nombre_pro?></a>
            </td>
            <td>
                <?=$product->precio_pro?>
            </td>
            <td>
                <?=$element['units']?>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
    <div class="total-cart">
    <?php $stats = Utils::statsCart();?>
    <h3>Precio total: <?=$stats['total']?>$</h3>
    <a href="<?=base_url?>Order/MakeOrder">Hacer el pedido</a>
</div>
</div>