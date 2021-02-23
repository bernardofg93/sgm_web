<section class="store">
    <div class="banner">
        <img src="img/store/1_Banner.png" alt="">
    </div>
    <div class="productsContainer">
    <?php while ($pro = $prod->fetch_object()) : ?>
        <div class="div product-1 product">
            <img src="<?= base_url ?>uploads/images/products/<?=$pro->imagen_pro?>" alt="">
            <a href="<?=base_url ?>Cart/add&id=<?=$pro->id_producto?>">Añadir al carrito</a>
        </div>
        <?php endwhile; ?>
    </div>
</section>

