<?php

$medicamento_model = $this->getModel('medicamento_model');
$medicamentos = $medicamento_model->findAll();
$vias         = $medicamento_model->vias;
$medicamento_unidades = ["0" => "n/a"] + $medicamento_model->unidades;

if(!isset($imprimir) || !$imprimir)
    $this->load->view('formato/e07_form_header', [
            'medicamentos' => $medicamentos
    ])
?>


<div class="col-xs-6">
    <?php echo input_text('medicamento_nombre', $view, "Medicamento nombre", "Ingresar nombre.") ?>
</div>
<div class="col-xs-6">
    <?php echo input_text('medicamento_presentacion', $view, "Medicamento presentación", "Ingresar presentación.") ?>
</div>



<?php if(!$view): ?>
    <div class="col-xs-4">
        <?php echo input_text('medicamento_cantidad', $view, "Medicamento cantidad", "Ingresar la cantidad númerica") ?>
    </div>
    <div class="col-xs-2">
    <?php
    $default = set_value("medicamento_cantidad_unidad") || set_value("medicamento_cantidad_unidad") === "0" ? set_value("medicamento_cantidad_unidad") : "mg" ;
    echo input_select('medicamento_cantidad_unidad', $view,"unidad", $medicamento_unidades, $default)
    ?>
    </div>
    <div class="col-xs-6">
        <?php echo input_text('medicamento_cantidad_excepcional', $view,"Cantidad excepcional", "Solo utilizar si no puede usar campo cantidad") ?>
    </div>
<?php else: ?>
    <div class="col-xs-12">
        <label>Cantidad</label><br>
        <?php echo $entity->getMedicamento()->getAttrHtmlCantidad() ?>
    </div>
<?php endif ?>


<div class="col-xs-8">
    <?php
    $default = isset($medicamento) ? $medicamento->via : array_keys($vias)[0];
    echo input_button_radio('medicamento_via', $view, "Medicamento vía", $vias, $default)
    ?>
</div>

<div class="col-xs-4">
    <?php echo input_text('dosis', $view, "Dósis / dia", "Ingresar la dósis.") ?>
</div>


<div class="separator col-xs-12 clearfix"></div>

<?php if(!$view): ?>
    <div class="col-md-6 hora-cont">
        <div class="col-md-8">
            <?php $vali = form_error('horas'); ?>
            <div class="form-group<?php echo $vali ? ' has-error' : '' ?>">
                <label for="hora" class="control-label">Agregar hora dósis</label>
                <input type="text" class="form-control" id="hora" name="hora"
                       value="">
                <?php if($vali)  echo "<p class='help-block'>$vali</p>" ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">&nbsp;</label>
                <br>
                <button id="hora-agregar" class="btn btn-small btn-primary" type="button">Agregar</button>
            </div>
        </div>
        <div class="col-md-12">
            <p class="help-block">Escriba la hora y presione "Agregar". Puede agregar multiples horas</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="horas">Horas dósis</label>
            <input name="horas" id="horas" value="<?php echo set_value('horas') ?>" />
        </div>
    </div>
<?php else: ?>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="control-label">Horas dósis</label><br>
            <?php echo $entity->getHorasDosisBadges() ?>
        </div>
    </div>
<?php endif ?>


<div class="separator col-xs-12 clearfix"></div>

<div class="col-xs-12">
    <?php echo input_textarea('observaciones', $view, "Observaciones", "Ingrese observaciones que considere importante informar al personal médico.") ?>
</div>

<?php
if(!isset($imprimir) || !$imprimir)
    $this->load->view('formato/e07_form_footer', [
        'vias' => $vias,
        'medicamento_unidades' => $medicamento_unidades
    ])
?>