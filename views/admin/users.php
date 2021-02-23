<div class="cont-admin">
    <?php require_once 'views/admin/aside.php';?>
    <div class="center-admin">
        <div style="width:1800px; display:block">
        <table cellspacing="0" cellpadding="0" class="table table-bordered table-hover m-0">
            <thead id="thead">
            <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>OPTIONS</th>
                </tr>
            </thead>
            <tbody id="tbody">
            <?php while ($us = $users->fetch_object()): ?>
                    <tr>
                        <td><?=$us->id_usuario;?></td>
                        <td><?=$us->nombre_us;?></td>
                        <td><?=$us->apelidos_us;?></td>
                        <td><?=$us->email_us;?></td>
                        <td><a href="#">BOTON</a></td>
                        <td><a href="#">BOTON</a></td>
                    </tr>
            <?php endwhile;?>
            </tbody>
        </table>
    </div>
</div>
</div>

<script src="<?=base_url?>/assets/js/table.js"></script>
