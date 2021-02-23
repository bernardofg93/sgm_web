<?php if (isset($product)) : ?>
<div class="product-view">
    <h1><?=$product->nombre_pro?></h1>
    <div class="img">
        <img src="<?=base_url?>/uploads/images/products/<?=$product->imagen_pro?>" alt="">;
</div>
<div class="data">
    <p class="description"><?=$product->descripcion_pro?></p>
    <p class="price"><?=$product->precio_pro?></p>
    <a href="<?=base_url?>cart/add&id=<?=$product->id_producto?>">Comprar</a>
</div>
</div>
<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif;?>



