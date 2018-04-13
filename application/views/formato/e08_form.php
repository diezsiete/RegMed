<?php $this->load->view('layout/header_formato_form', ['links' => [
    'vendors/flatpickr/flatpickr.min.css'
]]) ?>

<div class="col-md-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha y hora de control", "Seleccione la fecha y hora de registro") ?>
</div>
<div class="col-md-12">
<div class="clearfix separator"></div>
</div>
<div class="col-md-12">
    <?php echo input_text('tension_arterial', $view, "Tensión Arterial (mmHg)", "Ingresar tensión arterial") ?>
</div>
<div class="col-md-6">
    <?php echo input_text('frecuencia_cardiaca', $view, "Frecuencia Cardiaca /min", "Ingresar Frecuencia cardiaca") ?>
</div>
<div class="col-md-6">
    <?php echo input_text('frecuencia_respiratoria', $view, "Frecuencia Respiratoria /min", "Ingresar frecuencia respiratoria") ?>
</div>
<div class="clearfix"></div>
<div class="col-md-3">
    <?php echo input_text('saturacion', $view, "Saturación O2 %", "Ingresar Saturación de óxigeno %") ?>
</div>
<div class="col-md-3">
    <?php echo input_text('temperatura', $view, "Temperatura °C", "Ingresar Temperatura °C") ?>
</div>
<div class="col-md-3">
    <?php echo input_text('peso', $view, "Peso kg", "Ingresar Peso kg") ?>
</div>
<div class="col-md-3">
    <?php echo input_text('glucometria', $view, "Glucometría mg/dL", "Ingresar Glucometria (mg/dL)") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('observaciones', $view, "Observaciones", "Ingrese observaciones que considere importante informar al personal médico.") ?>
</div>


<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
]]) ?>