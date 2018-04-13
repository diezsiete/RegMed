<?php
$this->load->view('layout/header_formato_form', ['links' => [
    'vendors/flatpickr/flatpickr.min.css'
]]);
$e28_model = $this->getModel('E28_model');
$last_peso = $e28_model->getLastPeso($this->residente_helper->session()->cedula);
$_POST['last_peso'] = $last_peso ? $last_peso : "No hay registro";
?>
<div class="col-md-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha y hora de control", "Seleccione la fecha y hora de registro") ?>
</div>
<div class="col-md-12">
<div class="clearfix separator"></div>
</div>

<div class="col-md-4">
    <?php echo input_text('last_peso', true, "Peso Anterior (kg)") ?>
</div>

<div class="col-md-4">
    <?php echo input_text('peso', $view, "Peso (kg)", "Ingresar Peso (kg)") ?>
</div>

<div class="col-md-4">
    <?php echo input_text('gluco', $view, "Glucosa (mg/dl)", "Ingrese la medida de glucosa (mg/dl)") ?>
</div>

<div class="col-md-6">
    <?php if(!$view): ?>
        <?php echo input_button_radio('evol', $view, "Evolución", [
            "+" => "Aumentó",
            "=" => "Permanecio constante",
            "-" => "Disminuyó",
        ], "=") ?>
    <?php else: ?>
        <div class="form-group">
            <label class="control-label">Evolución</label>
            <p><?php echo $entity->getAttrHtmlEvol() ?></p>
        </div>
    <?php endif ?>
</div>

<div class="col-md-12">
    <?php echo input_textarea('dieta', $view, "Dieta", "Ingrese la dieta que sigue el residente.") ?>
</div>

<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
]]) ?>