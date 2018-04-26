<?php
$medicamento_model = $this->getModel('medicamento_model');
$medicamentos = $medicamento_model->findAll();
$vias         = $medicamento_model->vias;

$this->load->view('layout/header_formato_form', ['links' => [
    'vendors/chosen/chosen.min.css',
    'vendors/flatpickr/flatpickr.min.css'
]])
?>

<script>
    var medicamentos = {};
    var medicamento = false;
</script>

<script>
    <?php foreach($medicamentos as $med): ?>
    medicamentos[<?php echo $med->id ?>] = <?php echo json_encode($med) ?>;
    medicamentos[<?php echo $med->id ?>]['cantidad'] = <?php echo $med->cantidad + 0 ?>;
    <?php endforeach ?>
</script>


<?php if(!$view): ?>
    <div class="col-md-9">
        <div class="form-group">
            <label for="medicamento_id" class="control-label ">Seleccione Medicamento</label>
            <select class="form-control chosen" name="medicamento_id" id="medicamento_id"
                    data-placeholder="Seleccione medicamento...">
                <option></option>
                <?php foreach ($medicamentos as $m) {
                    if(isset($medicamento))
                        $selected = $m->id == $medicamento->id ? 'selected' : '';
                    else
                        $selected = $m->id == set_value('medicamento_id') ? 'selected' : '';
                    echo "<option value='".$m->id."' $selected>" . $m->getNombreCompleto() . "</option>";
                }
                ?>
            </select>
            <?php if($formato->key == 'e07'): ?>
                <p class="help-block">
                    Si no encuentra el medicamento, crearlo con el botón "Crear medicamento"
                </p>
            <?php endif ?>
        </div>
    </div>
    <div class="clearfix"></div>
<?php endif ?>

<div class="col-xs-4">
    <?php echo input_text('medicamento_nombre', $view, "Medicamento nombre", "Ingresar nombre.") ?>
</div>

<div class="col-xs-4">
    <?php echo input_text('medicamento_presentacion', $view, "Medicamento presentación", "Ingresar presentación.") ?>
</div>

<div class="col-xs-4">
    <?php echo input_text('medicamento_cantidad', $view, "Medicamento cantidad <small>( mg )</small>", "Ingresar la cantidad en mg.") ?>
</div>

<div class="col-xs-8">
    <?php
    $default = isset($medicamento) ? $medicamento->via : array_keys($vias)[0];
    echo input_button_radio('medicamento_via', $view, "Medicamento vía", $vias, $default)
    ?>
</div>

<div class="col-xs-4">
    <?php echo input_text('dosis', $view, "Dósis / dia", "Ingresar la dósis.") ?>
</div>

<div class="separator col-xs-12 clearfix"></div>

<div class="col-xs-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha y hora dósis") ?>
</div>

<div class="separator col-xs-12 clearfix"></div>

<div class="col-xs-12">
    <?php echo input_textarea('observaciones', $view, "Observaciones", "Ingrese observaciones que considere importante informar al personal médico.") ?>
</div>

<?php
$this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/chosen/chosen.jquery.min.js',
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
    'assets/js/e07.js'
]]);
?>