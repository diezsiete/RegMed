<?php 
$E14_model = $this->getModel('E14_model');
$alimentaciones = $E14_model->getAlimentaciones();
$orientaciones  = $E14_model->getOrientaciones();
$eliminaciones  = $E14_model->getEliminaciones();

$this->load->view('layout/header_formato_form', ['links' => [
    'vendors/flatpickr/flatpickr.min.css'
]]);

if(!$view && isset($entity)){
    $_POST['alimentacion'] = $entity->alimentacion;
    $_POST['orientacion'] = $entity->orientacion;
    $_POST['eliminacion'] = $entity->eliminacion;
}
?>

<div class="col-md-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha y hora de control", "Seleccione la fecha y hora de registro") ?>
</div>

<div class="col-md-3">
    <?php echo input_button_radio('bano', $view, "Baño", ["n/a" => "n/a", "Sola" => "Sola", "Asistida" => "Asistida"], "n/a"); ?>
</div>

<div class="col-md-9">
    <?php echo input_button_checkbox('alimentacion', $view, "Alimentación", $alimentaciones, "n/a") ?>
</div>

<div class="col-md-3">
    <?php echo input_button_radio('lubricacion', $view, "Lubricación", [
        "n/a" => "n/a",
        "Sola" => "Persona",
        "Asistida" => "Asistida",
    ], "n/a") ?>
</div>
<div class="col-md-5">
    <?php echo input_button_checkbox('orientacion', $view, "Orientación", $orientaciones, [
        "Tiempo", "Persona", "Lugar"
    ]) ?>
</div>

<div class="col-md-4">
    <?php echo input_button_radio('sueno', $view, "Sueño", [
        "n/a" => "n/a",
        "Ninguno" => "Ninguno",
        "Normal" => "Normal",
        "Inquieto" => "Inquieto",
    ], "n/a") ?>
</div>



<div class="col-md-3">
    <?php echo input_button_radio('curacion', $view, "Curación", [
        "n/a" => "n/a",
        "No" => "No",
        "Si" => "Si",
    ], "n/a") ?>
</div>

<div class="col-md-3">
    <?php echo input_button_radio('terapia_fisica', $view, "Terapia física", [
        "n/a" => "n/a",
        "No" => "No",
        "Si" => "Si",
    ], "n/a") ?>
</div>

<div class="col-md-3">
    <?php echo input_button_radio('terapia_ocupacional', $view, "Terapia ocupacional", [
        "n/a" => "n/a",
        "No" => "No",
        "Si" => "Si",
    ], "n/a") ?>
</div>

<div class="col-md-3">
    <?php echo input_button_checkbox('eliminacion', $view, "Eliminación", $eliminaciones, "n/a") ?>
</div>





<div class="col-md-12">
    <?php echo input_button_radio('deambulacion', $view, "Deambulación", [
        "n/a" => "n/a",
        "No" => "No",
        "Si" => "Si",
        "Con novedad" => "Con novedad",
        "Sin novedad" => "Sin novedad",
    ], "n/a") ?>
</div>

<div class="col-md-12">
    <?php echo input_textarea('observaciones', $view, "Observaciones", "Ingrese observaciones o detalles sobre seguimiento.", "", 10) ?>
</div>


<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
    'assets/js/e14.js'
]]) ?>