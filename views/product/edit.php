<div class="cont-admin">
    <?php require_once 'views/admin/aside.php';?>
    <div class="cont-cat-prod" id="click-form">
        <div class="container-product">
            <form method="POST" id="formProduct" class="fm-prod" enctype="multipart/form-data">
                <h4>Edit Product</h4>
                <?php require_once 'views/product/form.php'; ?>
            </form>
        </div>
    </div>
</div>
<script src="<?=base_url?>/assets/js/product.js"></script>