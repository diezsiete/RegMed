<div class="col-xs-12">
    <div class="text-center">
        <?php
        $button_name = isset($entity) ? 'actualizar' : 'crear';
        echo input_submit($button_name, $view, ucfirst($button_name))
        ?>
    </div>
</div>

<?php if($view): ?>
    <div class="col-md-12 text-center">
        <a href="<?php echo str_replace('__id__', $entity->id, site_url($formato->imprimir)) ?>"
           class="btn btn-default" target="_blank" ><i class="fa fa-print"></i> Imprimir
        </a>
    </div>
<?php endif ?>


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
                    <label for="cantidad" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="cantidad" class="form-control col-md-7 col-xs-12" type="text"
                               name="cantidad" placeholder="Ingresar la cantidad " value="<?php echo set_value('cantidad') ?>">
                    </div>
                    <div class="col-md-2">
                        <?php echo input_select('cantidad_unidad', false, false, $medicamento_unidades, 'mg') ?>
                    </div>
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                        <?php if($vali) echo $vali ?>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-3 col-xs-12">
                            Si la cantidad del medicamento no es posible describirla con el anterior campo, escribala
                            en el siguiente campo
                        </div>
                        <div class="col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-3 col-xs-12">
                            <input type="text" id="cantidad_excepcional" name="cantidad_excepcional" class="form-control col-md-7 col-xs-12"
                                   value="<?php echo set_value('cantidad_excepcional') ?>" placeholder="">
                        </div>
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