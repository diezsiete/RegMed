<?php $this->load->view('layout/header_formato_form', ['links' => [
    'vendors/flatpickr/flatpickr.min.css'
]]) ?>


<div class="col-md-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha y hora de control", "Seleccione la fecha y hora de registro") ?>
</div>
<div class="col-md-12">
    <div class="clearfix separator"></div>
</div>

<div class="col-md-6">
    <?php echo input_text('tension_arterial', $view, "Tensión Arterial (mmHg)", "Ingresar tensión arterial") ?>
</div>

<div class="col-md-6">
    <?php echo input_text('frecuencia_cardiaca', $view, "Frecuencia Cardiaca /min", "Ingresar Frecuencia cardiaca") ?>
</div>

<div class="col-xs-12">
    <?php echo input_textarea('observaciones', $view, "Observaciones", "Ingrese observaciones que considere importante.") ?>
</div>
<div class="col-xs-12">
    <?php echo input_textarea('tratamiento', $view, "Tratamiento", "Ingrese el tratamiento en caso de que haya.") ?>
</div>
<div class="col-xs-12">
    <?php echo input_textarea('diagnostico', $view, "Diagnóstico", "Ingrese el diagnóstico en caso de que haya.") ?>
    </div>



<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
]]) ?>