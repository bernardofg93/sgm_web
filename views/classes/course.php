<div class="cont-admin">
    <?php require_once 'views/admin/aside.php';?>
    <div class="cont-cat-prod">
        
        <!-- condicion editar o crear categoria -->
        <?php if(isset($cat) && is_object($cat)) :?>
            <?php $action_cat = 'edit' ?>
        <?php else :?>
            <?php $action_cat = 'create' ?>
        <?php endif ;?>
       
        <!-- form para crear una categoria -->
        <div class="container-category">
            <h4>Create Category</h4>
            <form method="POST" id="formCatVideo" class="form-cat-prod">
                <label for="nombre_cat"></label>
                <input type="text" id="nombre_cat_productos" class="txt-box">
                <input type="hidden" id="action_cat" value="<?php echo $action_cat ?>" >
                <input type="submit" value="Save" class="btn-prod">
            </form>
        </div>
        
        <!-- form para crear un producto -->
        <div class="container-product">
            <h4>Create Product</h4>
            <form method="POST" id="formVideos" enctype="multipart/form-data">
                <legend></legend>
                <?php require_once 'views/classes/form.php'; ?>
            </form>
        </div>

    <!-- table de los productos -->
    <div class="cont-cat-form-prod-2">
        <table id="list-products" cellspacing="0" cellpadding="0">
             <thead id="thead">
                <tr>
                    <th> NAME </th>
                    <th> PRICE</th>
                    <th> STOCK </th>
                    <th> OFERT </th>
                    <th> OPTIONS</th>
                </tr>
            </thead>
            <tbody id="tbody">
            <?php while ($pro = $prod->fetch_object()) : ?>
                <tr>
                    <td><?=$pro->nombre_pro?></td>
                    <td><?=$pro->precio_pro?></td>
                    <td><?=$pro->stock_pro?></td>
                    <td><?=$pro->oferta_pro?>
                    <td>
                        <a href="<?= base_url ?>product/edit&id=<?=$pro->id_producto?>" >
                            <i class="fas fa-edit"></i>
                        </a>
                       <a data-id="<?=$pro->id_producto?>" type="button" class="btn btn-borrar" >
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
</div>
</div>
</div>
<script src="<?=base_url?>/assets/js/video.js"></script>