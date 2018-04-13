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
    <?php echo input_text('peso_imc', $view, "IMC", "IMC") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('evolucion', $view, "Evolución", "Ingresar observaciones de evolución") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('dieta_recomendaciones', $view, "Dieta y recomendaciones", "Ingresar recomendaciones") ?>
</div>
<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
]]) ?>