<?php
$this->load->view('layout/header_formato_form', ['links' => [
    'vendors/flatpickr/flatpickr.min.css'
]]);
$disabled = $view ? 'disabled' : '';
if($view && $entity->problema_digestivo)
    $_POST['group1'] = 2;
?>

<div class="col-md-12">
    <?php echo input_flatpickr('fechahora', $view, "Fecha y hora de control", "Seleccione la fecha y hora de registro") ?>
</div>

<div class="col-md-6 clearfix">
    <?php echo input_text('peso', $view, "Peso Actual <small>kg</small>", "Ingresar Peso Actual en kg") ?>
</div>
<div class="col-md-6">
    <?php echo input_text('peso_conv', $view, "Peso Conveniente <small>kg</small>", "Ingresar Peso Conveniente en kg") ?>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
    <?php echo input_text('talla', $view, "Talla Actual <small>cm</small>", "Ingresar Talla Actual en cm") ?>
</div>
<div class="col-md-6">
    <?php echo input_text('altura_rodilla', $view, "Altura Rodilla <small>cm</small>", "Ingresar Altura Rodilla en cm") ?>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
    <?php echo input_text('carpo', $view, "C. Carpo <small>cm</small>", "Ingresar C. Carpo en cm") ?>
</div>
<div class="col-md-4">
    <?php echo input_text('cir_brazo', $view, "Circunferencia Brazo <small>cm</small>", "Ingresar Circunferencia Brazo en cm") ?>
</div>
<div class="col-md-4">
    <?php echo input_text('estructura_corporal', $view, "Estructura Corporal", "Ingresar la Estructura Corporal") ?>
</div>
<div class="clearfix col-md-6">
    <?php echo input_text('imc', $view, "IMC") ?>
</div>
<div class="col-md-6">
    <?php echo input_text('estado_nutricional', $view, "Estado Nutricional", "Estado Nutricional") ?>
</div>
<div class="col-md-12">
    <h4>Datos Médicos</h4>
</div>
<div class="col-md-12">
    <?php echo input_textarea('diagnostico_medico', $view, "Diagnóstico Médico", "Ingrese el diagnóstico médico.") ?>
</div>
<div class="col-md-12">
    <label>Problemas Digestivos</label>
    <div class="form-group radio">
        <label><input type="radio" name="group1" value="1"
                <?php echo !isset($_POST['group1']) || $_POST['group1'] == 1 ? "checked" : "" ?> <?php echo $disabled ?>>
            No
        </label>
        <label><input type="radio" name="group1" value="2"
                <?php echo isset($_POST['group1']) && $_POST['group1'] == 2 ? "checked" : "" ?>  <?php echo $disabled ?>>
            Si
        </label>
        <br>
        <input type="text" placeholder="¿Cuál?" class="group2" id="problema_digestivo" name="problema_digestivo"
               value="<?php echo set_value('problema_digestivo') ?>"  <?php echo $disabled ?>>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="indicadoresEstado">Indicadores del estado nutricional</label><br>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="hidden" name="cabello_facil" value="N">
                    <input type="checkbox" name="cabello_facil" value="S" <?php echo $disabled ?>
                        <?php echo set_value('cabello_facil') == "S" ? 'checked' : '' ?>>Cabello fácil de arrancar
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="hidden" name="encias" value="N">
                    <input type="checkbox" name="encias" value="S" <?php echo $disabled ?>
                        <?php echo set_value('encias') == "S" ? 'checked' : '' ?>>Encias sangrantes
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="hidden" name="palidez" value="N">
                    <input type="checkbox" name="palidez" value="S" <?php echo $disabled ?>
                        <?php echo set_value('palidez') == "S" ? 'checked' : '' ?>>Palidez Conjuntival
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="hidden" name="pigmentacion" value="N">
                    <input type="checkbox" name="pigmentacion" value="S" <?php echo $disabled ?>
                        <?php echo set_value('pigmentacion') == "S" ? 'checked' : '' ?>>Pigmentación o descamación en piel<br>
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="hidden" name="dermatitis" value="N">
                    <input type="checkbox" name="dermatitis" value="S" <?php echo $disabled ?>
                        <?php echo set_value('dermatitis') == "S" ? 'checked' : '' ?>>Dermatitis seborreica en cara
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="checkbox">
                <label>
                    <input type="hidden" name="edema" value="N">
                    <input type="checkbox" name="edema" value="S" <?php echo $disabled ?>
                        <?php echo set_value('edema') == "S" ? 'checked' : '' ?>>Edema<br>
                </label>
            </div>
        </div>

        <div class="clearfix col-md-12">
            <?php echo input_textarea('otros', $view, "Otros", "Ingrese otros indicadores del estado nutricional considere relevantes.") ?>
        </div>
    </div>
</div>
<div class="col-md-12">
    <?php echo input_textarea('examenes_laboratorio', $view, "Exámenes de Laboratorio", "Ingrese exámenes de laboratorio.") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('tratamiento_nutricional', $view, "Tratamiento Nutricional", "Ingrese exámenes de laboratorio.") ?>
</div>
<div class="col-md-12">
    <?php echo input_textarea('observaciones', $view, "Observaciones y Recomendaciones", "Ingrese observaciones y recomendaciones.") ?>
</div>

<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
    'assets/js/E35_form.js'
]]) ?>