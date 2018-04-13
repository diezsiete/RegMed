<?php
$medicamento_model = $this->getModel('medicamento_model');
$medicamentos = $medicamento_model->findAll();
$vias         = $medicamento_model->vias;

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

                    <div class="col-md-4">
                        <?php echo input_text('medicamento_nombre', $view, "Medicamento nombre", "Ingresar nombre.") ?>
                    </div>

                    <div class="col-md-4">
                        <?php echo input_text('medicamento_presentacion', $view, "Medicamento presentación", "Ingresar presentación.") ?>
                    </div>

                    <div class="col-md-4">
                        <?php echo input_text('medicamento_cantidad', $view, "Medicamento cantidad <small>( mg )</small>", "Ingresar la cantidad en mg.") ?>
                    </div>

                    <div class="col-md-6">
                        <?php
                        $default = isset($medicamento) ? $medicamento->via : array_keys($vias)[0];
                        echo input_button_radio('medicamento_via', $view, "Medicamento vía", $vias, $default)
                        ?>
                    </div>

                    <div class="col-md-6">
                        <?php echo input_text('dosis', $view, "Dósis / dia", "Ingresar la dósis.") ?>
                    </div>


                    <div class="separator col-md-12 clearfix"></div>
                  
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Horas dósis</label><br>
                                <?php echo $entity->getHorasDosisBadges() ?>
                            </div>
                        </div>
                    <?php endif ?>
                  
                
                    <div class="separator col-md-12 clearfix"></div>

                    <div class="col-md-12">
                        <?php echo input_textarea('observaciones', $view, "Observaciones", "Ingrese observaciones que considere importante informar al personal médico.") ?>
                    </div>


                    <div class="col-md-12">
                        <div class="text-center">
                            <?php
                            $button_name = isset($entity) ? 'actualizar' : 'crear';
                            echo input_submit($button_name, $view, ucfirst($button_name))
                            ?>
                        </div>
                    </div>


                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php $show = isset($error_med_crear) ? "ver" : "" ?>
<div class="modal fade <?php echo $show ?>" tabindex="-1" role="dialog" id="modal-crear-med" aria-labelledby="modal-crear-med-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open("enfermeria/medicamento-crear", ['class' => 'form-horizontal form-label-left', 'novalidate' => 'novalidate']); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-crear-med-label">Crear medicamento</h4>
            </div>
            <div class="modal-body">
                <?php if(isset($error_med_crear)): ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <?php echo $error_med_crear ?>
                        </div>
                    </div>
                <?php endif ?>
                <?php $vali = form_error('nombre'); ?>
                <div class="form-group<?php echo $vali ? ' has-error' : '' ?>">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nombre" required="required" class="form-control col-md-7 col-xs-12" name="nombre"
                               value="<?php echo set_value('nombre') ?>" placeholder="Nombre del medicamento">
                    </div>
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                        <?php if($vali) echo $vali ?>
                    </div>
                </div>
                <?php $vali = form_error('presentacion'); ?>
                <div class="form-group<?php echo $vali ? ' has-error' : '' ?>">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="presentacion">Presentación
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="presentacion" name="presentacion" class="form-control col-md-7 col-xs-12"
                               value="<?php echo set_value('presentacion') ?>" placeholder="Tableta, capsula, etc...">
                    </div>
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                        <?php if($vali) echo $vali ?>
                    </div>
                </div>
                <?php $vali = form_error('cantidad'); ?>
                <div class="form-group<?php echo $vali ? ' has-error' : '' ?>">
                    <label for="cantidad" class="control-label col-md-3 col-sm-3 col-xs-12">Canitdad</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="cantidad" class="form-control col-md-7 col-xs-12" type="text"
                               name="cantidad" placeholder="Ingresar la cantidad en mg" value="<?php echo set_value('cantidad') ?>">
                    </div>
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                        <?php if($vali) echo $vali ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Via</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div id="vias" class="btn-group" data-toggle="buttons">
                            <?php
                            $selected = false;
                            foreach($vias as $via):
                                if(!set_value('via') && !$selected){
                                    $checked = 'active';
                                    $selected = true;
                                }else
                                    $checked = $via == set_value('via') ? 'active' : '';
                                ?>
                                <label class="btn btn-default <?php echo $checked ?>"
                                       data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="via" value="<?php echo $via ?>"
                                        autofocus="true" <?php echo $checked ? "checked" : "" ?>> <?php echo $via ?>
                                </label>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="submit" value="Guardar" name="crear" class="btn btn-success" />
            </div>
            <?php echo form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php
$this->load->view('layout/footer', ['scripts' => [
    'vendors/chosen/chosen.jquery.min.js',
    'vendors/jquery.maskedinput2/jquery.maskedinput2.min.js',
    'vendors/jquery.tagsinput/src/jquery.tagsinput.js',
    'assets/js/e07.js',
]]);
?>