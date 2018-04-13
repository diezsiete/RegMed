<?php
$this->load->view('layout/header_formato_form', ['links' => [
    'vendors/flatpickr/flatpickr.min.css'
]]);
?>
<div class="col-md-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha y hora de control", "Seleccione la fecha y hora de registro") ?>
</div>

<div class="col-md-6">
    <?php echo input_text('peso', $view, "Peso <small>kg</small>", "Ingresar Peso en kg") ?>
</div>
<div class="col-md-6">
    <?php echo input_text('talla', $view, "Talla <small>(cm)</small>", "Ingresar Talla residente") ?>
</div>
<div class="col-md-4">
    <?php echo input_text('tension_arterial', $view, "Tensión Arterial <small>(mmHg)</small>", "Ingresar Tensión Arterial") ?>
</div>
<div class="col-md-4">
    <?php echo input_text('frecuencia_respiratoria', $view, "Frecuencia respiratoria <small>/min</small>", "Ingresar frecuencia respiratoria") ?>
</div>
<div class="col-md-4">
    <?php echo input_text('frecuencia_cardiaca', $view, "Frecuencia Cardíaca <small>/min</small>", "Ingresar Frecuencia Cardíaca") ?>
</div>
<div class="col-md-6">
    <?php echo input_text('temperatura', $view, "Temperatura <small>(°C)</small>", "Ingresar Temperatura") ?>
</div>
<div class="col-md-6">
    <?php echo input_text('saturacion_o2', $view, "Saturación O2 <small>(%)</small>", "Ingresar Saturación Óxigeno") ?>
</div>

<div class="col-md-6">
    <?php echo input_textarea('info_cabeza', $view, "Información Cabeza", "Ingresar Información Cabeza") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('info_cara', $view, "Información Cara", "Ingresar Información Cara") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('info_cuello', $view, "Información Cuello", "Ingresar Información Cuello") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('info_torax', $view, "Información Torax", "Ingresar Información Torax") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('info_abdomen', $view, "Información Abdomen", "Ingresar Información Abdomen") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('info_genitourinario', $view, "Información Genitourinario", "Ingresar Información Genitourinario") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('info_osteoarticular', $view, "Información Osteoarticular", "Ingresar Información Osteoarticular") ?>
</div>

<div class="col-md-12">
    <?php echo input_textarea('diagnostico', $view, "Diagnóstico", "Ingresar el diagnóstico general") ?>
</div>

<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
]]) ?>