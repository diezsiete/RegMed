<?php
$this->load->view('layout/header', ['links' => [
    'vendors/chosen/chosen.min.css',
    'vendors/jquery.tagsinput/src/jquery.tagsinput.css'
]]);
?>


<script>
    var medicamentos = {};
    var medicamento = false;
    <?php foreach($medicamentos as $med): ?>
    medicamentos[<?php echo $med->id ?>] = <?php echo json_encode($med) ?>;
    medicamentos[<?php echo $med->id ?>]['cantidad'] = <?php echo $med->cantidad + 0 ?>;
    <?php endforeach ?>
    <?php if(isset($medicamento)): ?>
    medicamento = <?php echo json_encode($medicamento) ?>;
    medicamento['cantidad'] = <?php echo $medicamento->cantidad + 0 ?>;
    <?php endif ?>
</script>

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $formato->titulo ?>
                    <?php echo  isset($formato->codigo) ? "<small>".strtoupper($formato->codigo)."</small>" : "" ?>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php $url = isset($entity) ? str_replace('__id__', $entity->id, $formato->editar) : $formato->crear; ?>
                <?php echo form_open($url, [], ['residente_cedula' => $this->residente_helper->session()->cedula]); ?>

                <?php
                if(!isset($error_med_crear) && validation_errors()) {
                    echo "<div class='alert alert-danger'>Errores en formulario, verifique la información ingresada</div>";
                }
                if (isset($error_message)) {
                    echo "<div class='alert alert-danger'>$error_message</div>";
                }
                if (isset($insert_message)) {
                    echo "<div class='alert alert-success'>$insert_message</div>";
                }
                ?>
                <?php if(!$view): ?>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="medicamento_id" class="control-label ">Seleccione Medicamento</label>
                        <select class="form-control chosen" name="medicamento_id" id="medicamento_id"
                                data-placeholder="Seleccione medicamento...">
                            <option></option>
                            <?php foreach ($medicamentos as $m) {
                                if(isset($medicamento))
                                    $selected = $m->id == $medicamento->id ? 'selected' : '';
                                else
                                    $selected = $m->id == set_value('medicamento_id') ? 'selected' : '';
                                echo "<option value='".$m->id."' $selected>" . $m->getNombreCompleto() . "</option>";
                            }
                            ?>
                        </select>
                        <p class="help-block">
                            Si no encuentra el medicamento, crearlo con el botón "Crear medicamento"
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">&nbsp;</label>
                        <a class="form-control btn btn-small btn-success" data-toggle="modal"
                           data-target="#modal-crear-med">Crear medicamento</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            <?php endif ?>