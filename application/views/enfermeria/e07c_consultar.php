<?php $this->load->view('layout/header') ?>



<div class="row">
    <?php if(isset($error_message) || isset($success_message)): ?>
        <div class="col-xs-12">
            <div class="alert-<?php echo isset($success_message) ? 'success' : 'danger' ?>">
                <?php echo isset($success_message) ? $success_message : $error_message ?>
            </div>
        </div>
    <?php endif ?>
    <?php if(isset($entities_administrar)): ?>
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <?php if($formato->crear): ?>
                        <a class="btn btn-success pull-right" href="<?php echo site_url($formato->crear) ?>">
                            <i class="fa fa-plus-circle"></i> Crear</a>
                    <?php endif ?>
                    <h2>
                        Suiministro de medicamentos para hoy
                        <small>Listado de medicamentos que deben administrarse al residente para hoy</small>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php if($entities_administrar): ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Hora Dósis</th>
                                <th>Medicamento</th>
                                <th>Dosis</th>
                                <th>Vía</th>
                                <th>Observaciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($entities_administrar as $entity): ?>
                                <tr>
                                    <td>
                                        <?php echo $entity->getHora(); ?>
                                    </td>
                                    <td>
                                        <?php echo $entity->getMedicamento()->getNombreCompleto() ?>
                                    </td>
                                    <td>
                                        <?php echo $entity->attrs->dosis ?>
                                    </td>
                                    <td>
                                        <?php echo $entity->getMedicamento()->via ?>
                                    </td>
                                    <td>
                                        <?php echo $entity->observaciones ?>
                                    </td>
                                    <td>
                                        <?php echo form_open($formato->crear, [], ['residente_cedula' => $this->residente_helper->session()->cedula]); ?>
                                            <?php foreach($entity->jsonSerialize() as $key => $value): ?>
                                                <input type="hidden" name="<?php echo $key ?>" value="<?php echo $value ?>">
                                            <?php endforeach ?>
                                        <input type="submit" value="Aplicar" name="crear" class="btn btn-sm btn-success" />
                                        <?php echo form_close(); ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No hay registros para mostrar</p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endif ?>
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php echo $paginacion ?>
                <h2><?php echo $formato->titulo ?>
                    <?php echo  isset($formato->codigo) ? "<small>".strtoupper($formato->codigo)."</small>" : "" ?>
                </h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <?php if($entities): ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Medicamento</th>
                            <th>Vía</th>
                            <th>Dosis</th>
                            <th>Observaciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($entities as $entity): ?>
                            <tr>
                                <td>
                                    <?php echo $entity->usuario_id ?>
                                </td>
                                <td>
                                    <?php echo $entity->getFecha() ?>
                                </td>
                                <td>
                                    <?php echo $entity->getHora(); ?>
                                </td>
                                <td>
                                    <?php echo $entity->getMedicamento()->getNombreCompleto() ?>
                                </td>
                                <td><?php echo $entity->getMedicamento()->via ?></td>
                                <td><?php echo $entity->dosis ?></td>
                                <td><?php echo $entity->observaciones ?></td>
                                <td>
                                    <?php echo btns_crud($formato, $entity->id) ?>
                                </td>
                            </tr>
                        <?php endforeach ?>

                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No hay registros para mostrar</p>
                <?php endif ?>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<?php $this->load->view('layout/footer') ?>
