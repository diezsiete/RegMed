<?php
$tipos_doc = ['C.C.' => 'C.C.', 'C.E.' => 'C.E.', 'Pasaporte' => 'Pasaporte'];
$generos = ['Másculino' => 'Másculino', 'Femenino' => 'Femenino', 'Indefinido' => 'Indefinido'];
$tipos_contrato = ['Beneficiario' => 'Beneficiario', 'Cotizante' => 'Cotizante', 'Subsidiario' => 'Subsidiario'];
$escolaridades = ['Sin Estudios' => 'Sin Estudios', 'Primaria' => 'Primaria', 'Bachillerato' => 'Bachillerato', 'Pregrado' => 'Pregrado', 'Maestría/Posgrado/PhD' => 'Maestría/Posgrado/PhD'];
$estados_civiles = ['Soltero' => 'Soltero', 'Casado' => 'Casado', 'Viudo' => 'Viudo'];
$tipos_planes = ['Residente' => 'Residente', 'Plan Día' => 'Plan Día'];

$asterisk = $view ? "" : "*";
?>

<div class="col-md-6">
    <?php echo input_text('nombre', $view, 'Nombre Persona Mayor '.$asterisk, 'Ingresar nombre') ?>
</div>
<div class="col-md-4">
    <?php echo input_text('cedula', $view, 'Número de Documento '.$asterisk, 'Ingresar Documento') ?>
</div>
<div class="col-md-2">
    <?php echo input_select('tipo_documento', $view, 'Tipo Documento '.$asterisk, $tipos_doc) ?>
</div>

<div class="col-md-6">
    <?php echo input_flatpickr('fecha_nacimiento', $view, 'Fecha nacimiento '.$asterisk, '', '', [
        'data-dateformat' => "Y-m-d",
        'data-defaultdate' => "false",
        "data-enabletime" => "false",
    ]) ?>
</div>
<div class="col-md-6">
    <?php echo input_text('lugar_nacimiento', $view, 'Lugar Nacimiento '.$asterisk, 'Ingresar lugar Nacimiento') ?>
</div>

<div class="col-md-4">
    <?php echo input_button_radio('genero', $view, 'Género '.$asterisk, $generos, 'Femenino') ?>
</div>

<div class="col-md-4">
    <?php echo input_button_radio('estado_civil', $view, 'Estado Civil '.$asterisk, $estados_civiles) ?>
</div>

<div class="col-md-4">
    <?php echo input_text('numero_hijos', $view, 'Número de Hijos '.$asterisk, 'Ingresar Número de Hijos') ?>
</div>

<div class="col-md-6">
    <?php echo input_text('direccion', $view, 'Dirección '.$asterisk, 'Ingresar dirección') ?>
</div>
<div class="col-md-3">
    <?php echo input_text('estrato', $view, 'Estrato '.$asterisk, 'Ingresar estrato') ?>
</div>


<div class="col-md-3">
    <?php echo input_text('etnia', $view, 'Etnia', 'Ingresar etnia') ?>
</div>


<div class="col-md-8">
    <?php echo input_button_radio('escolaridad', $view, 'Nivel de Estudios '.$asterisk, $escolaridades) ?>
</div>
<div class="col-md-4">
    <?php echo input_text('ocupacion_anterior', $view, 'Ocupación Anterior', 'Ingresar Ocupación Anterior') ?>
</div>
<div class="clearfix col-md-12"><hr></div>
<div class="col-md-6">
    <?php echo input_button_radio('pensionado', $view, 'Pensión '.$asterisk, ['Si' => 'Si', 'No' => 'No'], 'Si') ?>
</div>
<div class="col-md-6">
    <?php echo input_text('valor_pension', $view, 'Valor Pensión', 'Ingresar Valor Pensión') ?>
</div>

<div class="col-md-6">
    <?php echo input_text('eps', $view, 'EPS/SISBEN '.$asterisk, 'Ingresar EPS') ?>
</div>

<div class="col-md-6">
    <?php echo input_button_radio('tipo_contrato', $view, 'Tipo Contrato '.$asterisk, $tipos_contrato, "Beneficiario") ?>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
    <?php echo input_text('prepagada', $view, 'Prepagada '.$asterisk, 'Ingresar Prepagada') ?>
</div>
<div class="col-md-6">
    <?php echo input_text('idprepagada', $view, 'Número Contrato Prepagada '.$asterisk, 'Ingresar Contrato Prepagada') ?>
</div>

<div class="col-md-12">
    <?php echo input_text('ips', $view, 'IPS '.$asterisk, 'Ingresar IPS') ?>
</div>
<div class="col-md-6">
    <?php echo input_text('ambulancia', $view, 'Servicio Particular de Ambulancia '.$asterisk, 'Ingresar Servicio Particular de Ambulancia') ?>
</div>
<div class="col-md-6">
    <?php echo input_text('servicio_de_urgencias', $view, 'Servicio de Urgencias '.$asterisk, 'Ingresar Servicio de Urgencias') ?>
</div>
<div class="clearfix col-md-12"><hr></div>

<div class="col-md-4">
    <?php echo input_button_radio('tipo_plan', $view, 'Tipo Plan '.$asterisk, $tipos_planes, "Residente") ?>
</div>

<div class="col-md-4">
    <?php echo input_flatpickr('fecha_ingreso', $view, 'Fecha Ingreso '.$asterisk, '', '', [
        'data-dateformat' => "Y-m-d",
    ]) ?>
</div>

<div class="col-md-4">
    <div class="pull-right">
        <?php echo input_button_radio('activo', $view, 'Activo '.$asterisk, ['Si' => 'Si', 'No' => 'No'], 'Si') ?>
    </div>
</div>

<?php if(!$view): ?>
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label" for="Foto">Foto</label>
            <input type="file" name="Foto" accept="image/x-png, image/gif, image/jpeg" id="Foto"/>
            <p class="help-block">*El archivo deberá pesar máximo 2 MB, resolución máxima 640 x 640.</p>
        </div>
    </div>
<?php endif ?>