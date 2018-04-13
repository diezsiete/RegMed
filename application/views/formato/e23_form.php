<?php
$this->load->view('layout/header_formato_form', ['links' => [
    'vendors/flatpickr/flatpickr.min.css'
]]);
?>
<div class="col-md-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha y hora de control", "Seleccione la fecha y hora de registro") ?>
</div>

<div class="col-md-12">
    <?php echo input_textarea('observaciones', $view, "Observaciones de evolución médica", "Ingresar observaciones de evolución") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('recomendaciones', $view, "Recomendaciones", "Ingresar recomendaciones") ?>
</div>

<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
]]) ?>