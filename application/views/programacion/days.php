<div class="row">


    <button class="btn btn-primary mb-4 mx-auto" onClick="chech()" id="check_select_all">Seleccionar todo los dias</button>

    <div class="col-7 mx-auto shadow rounded">
        <?php foreach($dias as $dia): ?>
        <div class="form-check">
            <input class="form-check-input ml-n5" class="check" type="checkbox" value="<?=  $dia->id_dia_programacion ?>" >
            <label class="form-check-label ml-4" for="checkbox1">
                <?= $dia->nombre_dia ?>
            </label>
        </div>

        <?php endforeach; ?>

    </div>
</div>