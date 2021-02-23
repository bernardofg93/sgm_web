<div class="container-myAddres" id="listado-contactos">
        <div class="my-addres click" >
                <div class="card-add-addres card-addres">
                    <a href="<?= base_url ?>addres/add" class="cont-card-add">
                        <i class="fas fa-plus"></i>
                        <p>Agregar dirección</p>
                    </a>
                </div>

            <?php if (isset($data) && is_object($data)) :?>
            <?php while($addres = $data->fetch_object()) :?>
                <div class="card-addres" id="card">
                    <div class="txt-card-addres">
                        <p><?= $addres->pais; ?></p>
                        <p><?= $addres->codigo_postal; ?></p>
                        <p><?= $addres->estado; ?></p>
                        <p><?= $addres->ciudad; ?></p>
                        <p><?= $addres->colonia; ?></p>
                        <p><?= $addres->telefono; ?></p>
                        <a href="#">Agregar Instrucciones de entrega</a>
                    </div>
                    <div class="options-addres">
                        <a href="<?=base_url?>addres/edit&id=<?=$addres->id_direccion ?>">Edit</a>
                        <a  type="button" data-id="<?=$addres->id_direccion ?>" class="btn-borrar">Discart</a>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
          
        </div>
    <legend></legend>
    <legend></legend>
</div>

<script src="<?=base_url?>assets/js/deleteAddres.js"></script>