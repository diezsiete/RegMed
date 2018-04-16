<?php $this->load->view('layout/header'); ?>



<div class="page-title">
    <div class="title_left">
        <h2>Usuarios
            <small>Registrados en la aplicación</small></h2>
    </div>

    <div class="">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <?php if($formato->crear): ?>
                <a class="btn btn-success pull-right" href="<?php echo site_url($formato->crear) ?>">
                    <i class="fa fa-plus-circle"></i> Crear</a>
            <?php endif ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <?php
        if (isset($insert_message) && $insert_message) {
            echo alert_dismissible($insert_message);
        }
        ?>
        <div class="x_panel">
            <div class="x_title">
                <?php echo $paginacion ?>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <?php if($entities): ?>
                    <?php echo form_open(site_url($formato->consultar)); ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <?php foreach($cols as $col_data): ?>
                                <th><?php echo $col_data->label ?></th>
                            <?php endforeach; ?>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($entities as $entity): ?>
                            <tr>
                                <?php foreach($cols as $col_data): ?>
                                    <td>
                                        <?php
                                        $call = isset($col_data->fn) ? $col_data->fn :
                                            "getAttrHtml".ucfirst($this->utils->toCamelCase($col_data->attr));
                                        echo $entity->$call();
                                        ?>
                                    </td>
                                <?php endforeach ?>
                                <td>
                                    <button type="submit" name="restaurar" value="<?php echo $entity->id ?>" class="btn btn-default btn-sm">
                                        Restaurar clave
                                    </button>
                                </td>
                                <td>
                                    <?php echo btns_crud($formato, $entity->id) ?>
                                </td>
                            </tr>
                        <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
                    <?php form_close() ?>
                <?php else: ?>
                    <p>No hay registros para mostrar</p>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<?php $this->load->view('layout/footer') ?>
