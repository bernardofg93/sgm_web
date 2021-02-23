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
                    <button data-id="<?=$addres->id_direccion ?>" type="button" class="btn-borrar">Discart</button>
                </div>
            </div>
    <?php endwhile; ?>
    <?php endif; ?>
    </div>