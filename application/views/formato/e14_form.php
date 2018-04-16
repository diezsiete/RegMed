<?php 
$E14_model = $this->getModel('E14_model');
$alimentaciones = $E14_model->getAlimentaciones();
$orientaciones  = $E14_model->getOrientaciones();
$eliminaciones  = $E14_model->getEliminaciones();

$links = [];
if(isset($residentes))
    $links[] = 'vendors/chosen/chosen.min.css';
$btn_consultar = !isset($residentes);
$links[] = 'vendors/flatpickr/flatpickr.min.css';
$this->load->view('layout/header_formato_form', ['links' => $links, 'btn_consultar' => $btn_consultar]);

if(!$view && isset($entity)){
    $_POST['alimentacion'] = $entity->alimentacion;
    $_POST['orientacion'] = $entity->orientacion;
    $_POST['eliminacion'] = $entity->eliminacion;
}



?>

<?php if(isset($residentes)): ?>
    <div class="col-xs-12">
        <?php $vali = form_error('residentes[]'); ?>
        <div class="form-group <?php echo $vali ? "has-error" : "" ?>">
            <label for="residentes" class="control-label ">Residentes</label>
            <br>
            <select class="chosen" name="residentes[]" id="residentes" multiple
                    data-placeholder="Seleccione residente...">
                <?php foreach ($residentes as $residente) {
                    //$selected = $m->id == set_value('medicamento_id') ? 'selected' : '';
                    echo "<option value='".$residente->cedula."' >" . $residente->nombre . "</option>";
                }
                ?>
            </select>
            <p class="help-block">
                <?php echo $vali ?  $vali : "Seleccione los residentes a los que desea aplicar este formato" ?>
            </p>
        </div>
    </div>
<?php endif ?>

<div class="col-xs-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha y hora de control", "Seleccione la fecha y hora de registro") ?>
</div>

<?php if(!$view || $this->input->post('bano') != 'n/a'): ?>
<div class="col-md-3">
    <?php
        echo input_button_radio('bano', $view, "Baño", ["n/a" => "n/a", "Sola" => "Sola", "Asistida" => "Asistida"], "n/a");
    ?>
</div>
<?php endif ?>

<div class="col-md-9">
    <?php echo input_button_radio('alimentacion', $view, "Alimentación", $alimentaciones, "n/a") ?>
</div>

    <div class="clearfix"></div>


<?php if(!$view || $this->input->post('lubricacion') != 'n/a'): ?>
<div class="col-md-3">
    <?php echo input_button_radio('lubricacion', $view, "Lubricación", [
        "n/a" => "n/a",
        "Sola" => "Persona",
        "Asistida" => "Asistida",
    ], "n/a") ?>
</div>
<?php endif ?>
<?php if(!$view || $this->input->post('orientacion') != 'n/a'): ?>
<div class="col-md-5">
    <?php echo input_button_checkbox('orientacion', $view, "Orientación", $orientaciones, [
        "Tiempo", "Persona", "Lugar"
    ]) ?>
</div>
<?php endif ?>
<?php if(!$view || $this->input->post('sueno') != 'n/a'): ?>
<div class="col-md-4">
    <?php echo input_button_radio('sueno', $view, "Sueño", [
        "n/a" => "n/a",
        "Ninguno" => "Ninguno",
        "Normal" => "Normal",
        "Inquieto" => "Inquieto",
    ], "n/a") ?>
</div>
<?php endif ?>
<div class="clearfix"></div>
<?php if(!$view || $this->input->post('curacion') != 'n/a'): ?>
<div class="col-md-3">
    <?php echo input_button_radio('curacion', $view, "Curación", [
        "n/a" => "n/a",
        "No" => "No",
        "Si" => "Si",
    ], "n/a") ?>
</div>
<?php endif ?>
<?php if(!$view || $this->input->post('terapia_fisica') != 'n/a'): ?>
<div class="col-md-3">
    <?php echo input_button_radio('terapia_fisica', $view, "Terapia física", [
        "n/a" => "n/a",
        "No" => "No",
        "Si" => "Si",
    ], "n/a") ?>
</div>
<?php endif ?>
<?php if(!$view || $this->input->post('terapia_ocupacional') != 'n/a'): ?>
<div class="col-md-3">
    <?php echo input_button_radio('terapia_ocupacional', $view, "Terapia ocupacional", [
        "n/a" => "n/a",
        "No" => "No",
        "Si" => "Si",
    ], "n/a") ?>
</div>
<?php endif ?>

<?php if(!$view || $this->input->post('eliminacion') != 'n/a'): ?>
<div class="col-md-3">
    <?php echo input_button_checkbox('eliminacion', $view, "Eliminación", $eliminaciones, "n/a") ?>
</div>
<?php endif ?>

<div class="clearfix"></div>


<?php if(!$view || $this->input->post('deambulacion') != 'n/a'): ?>
<div class="col-md-12">
    <?php echo input_button_radio('deambulacion', $view, "Deambulación", [
        "n/a" => "n/a",
        "No" => "No",
        "Si" => "Si",
        "Con novedad" => "Con novedad",
        "Sin novedad" => "Sin novedad",
    ], "n/a") ?>
</div>
<?php endif ?>

<div class="col-md-12">
    <?php echo input_textarea('observaciones', $view, "Observaciones", "Ingrese observaciones o detalles sobre seguimiento.", "", 10) ?>
</div>

<div class="col-md-12 text-center">
<?php
    $button_name = isset($entity) ? 'actualizar' : 'crear';
if(isset($entity) || !isset($crear_y_crear))
    echo input_submit($button_name, $view, ucfirst($button_name));
else{
    echo input_submit($button_name, $view, ucfirst($button_name));
    echo input_submit('crear_y_crear', $view, "Crear y continuar creando", ["class" => "btn btn-primary"]);
}
?>
</div>

<?php
$scripts = [];
if(isset($residentes)){
    $scripts[] = 'vendors/chosen/chosen.jquery.min.js';
}
$scripts[] = 'vendors/flatpickr/flatpickr.min.js';
$scripts[] = 'vendors/flatpickr/es.js';
$scripts[] = 'assets/js/e14.js';

$this->load->view('layout/footer_formato_form', [
    'scripts' => $scripts,
    'echo_input_submit' => false
])
?>