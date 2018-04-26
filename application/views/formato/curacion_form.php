<?php
$this->load->view('layout/header_formato_form', ['links' => [
    'vendors/flatpickr/flatpickr.min.css'
]]);
?>

<div class="col-xs-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha y hora de control", "Seleccione la fecha y hora de registro") ?>
</div>
<div class="col-md-12">
<div class="clearfix separator"></div>
</div>

    <div class="col-xs-12">
        <?php echo input_textarea('tipo_curacion', $view, "Tipo de curación", "Ingrese información sobre el tipo de curación.") ?>
    </div>

    <div class="col-xs-12">
        <?php echo input_textarea('acciones', $view, "Acciones", "Ingrese información sobre las acciones tomadas.") ?>
    </div>

    <div class="col-xs-12">
        <?php echo input_textarea('observacion', $view, "Observaciones", "Ingrese observaciones que considere importante informar al personal médico.") ?>
    </div>

    <div class="col-xs-12">
        <?php echo input_textarea('evolucion', $view, "Evolución", "Ingrese información sobre la evolución del paciente.") ?>
    </div>


<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
]]) ?>