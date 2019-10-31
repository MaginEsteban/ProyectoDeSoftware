<div class="row">
    <div class="col-8 mx-auto">
        <label for="">Seleccione el menu</label>
        <select class="form-control" id="menus_comedor">
            <?php foreach($menus as $menu): ?>
                <option value="<?= $menu->id_menu; ?>"><?=$menu->nombre; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

</div>

