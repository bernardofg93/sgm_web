<div class="image">
    <?php if (isset($pro) && is_object($pro)) : ?>
        <img src="<?= base_url ?>uploads/images/products/<?= $pro->imagen_pro; ?>" />
    <?php endif; ?>
</div>

<p>Name:</p>
    <input 
        type="text" 
        id="nombre" 
        class="txt-box"
        value="<?= isset($pro) && is_object($pro) ? $pro->nombre_pro : '' ; ?>"
    >
<p>Description:</p>
    <input 
        type="text" 
        id="descripcion" 
        class="txt-box"
        value="<?= isset($pro) && is_object($pro) ? $pro->descripcion_pro : '' ; ?>"
    >
<div class="numbers">
    <li>
        <p>Precio:</p>
        <input 
            type="text" 
            id="precio" 
            class="txt-box"
            value="<?= isset($pro) && is_object($pro) ? $pro->precio_pro : '' ; ?>"
        >
    </li>
    <li>
        <p>Ofert</p>
        <input 
            type="number" 
            id="oferta" 
            class="txt-box"
            value="<?= isset($pro) && is_object($pro) ? $pro->oferta_pro : '' ; ?>"
        >
    </li>
</div>

<p>Category</p>
<select id="selectCat">
    <?php while ($cate = $cat->fetch_object()) : ?>
        <option value="<?= $cate->id_cat_productos ?>">
            <?= $cate->nombre_cat_productos ?>
        </option>
    <?php endwhile; ?>
</select>

<p>Image</p>
<input type="file" name="image" id="image" class="txt-box">
<input type="hidden" id="id_producto" value="<?= $pro->id_producto ?>" >

<?php if(isset($pro) && is_object($pro)): ?>
<input type="hidden" value="edit" id="action">
<?php else: ?>
<input type="hidden" value="create" id="action">
<?php endif; ?>

<input type="submit" value="Save" class="btn-prod">
<script src="<?=base_url?>/assets/js/video.js"></script>