<?php
$this->load->view('layout/header_formato_form', ['links' => [
    'vendors/flatpickr/flatpickr.min.css'
]]);
$valoraciones_dolor = $this->getModel('E21_model')->valoracionesDolor;
?>

<div class="col-md-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha y hora de control", "Seleccione la fecha y hora de registro") ?>
</div>

<div class="col-md-12">
    <?php echo input_textarea('antecedentes', $view, "Antecedentes", "Ingrese observaciones de los antecedentes") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('obsantropo', $view, "Características antropométricas", "Ingrese observaciones de características antropométricas.") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('obsintegu', $view, "Integridad integumentaria", "Ingrese observaciones de la Integridad integumentaria") ?>
</div>
<div class="col-md-12">
    <?php echo input_button_radio('valdolor', $view, "Valoración del Dolor", $valoraciones_dolor, "0") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('obscirculacion', $view, "Circulación", "Ingrese observaciones de circulación") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('obsrespira', $view, "Ventilación, respiración e intercambio gaseoso", "Ingrese observaciones sobre la respiración") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('obsmov', $view, "Rango de movimiento", "Ingrese observaciones del movimiento") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('obsflex', $view, "Flexibilidad", "Ingrese observaciones que considere importante informar al personal médico.") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('obsmuscular', $view, "Desempeño muscular", "Ingrese observaciones del desempeño muscular") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('obspostura', $view, "Postura", "Ingrese observaciones de postura") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('obscoord', $view, "Coordinación", "Ingrese observaciones de coordinación") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('obseq', $view, "Equilibrio", "Ingrese observaciones de equilibrio") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('obsintegridadner', $view, "Integridad de nervio periférico", "Ingrese observaciones de la integridad de nervio periférico") ?>
</div>
<div class="col-md-6">
    <?php echo input_textarea('obsmarcha', $view, "Marcha, locomoción y balance", "Ingrese observaciones de marcha y locomoción") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('obscapaero', $view, "Capacidad aeróbica", "Ingrese observaciones de la capacidad aeróbica") ?>
</div>
<div class="col-md-12">
    <div class="clearfix separator"></div>
</div>
<div class="col-md-12">
    <?php echo input_textarea('obsexfunc', $view, "Examen funcional", "Ingrese observaciones del examen funcional") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('diag', $view, "Diagnóstico fisioterapéutico", "Ingrese observaciones del diagnóstico") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('pronostico', $view, "Pronóstico", "Ingrese observaciones del pronóstico") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('plantratamiento', $view, "Plan de tratamiento", "Ingrese observaciones del plan de tratamiento") ?>
</div>

<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
]]) ?>