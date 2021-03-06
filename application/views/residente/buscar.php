<?php $this->load->view('layout/header') ?>

    <div class="page-title">
        <div class="title_left">
            <h2>Residentes</h2>
        </div>
        <?php if($formato->crear): ?>
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <a href="<?php echo site_url($formato->crear) ?>" class="btn btn-success pull-right">Crear</a>
            </div>
        <?php endif ?>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <p>Seleccione el residente para el cual desea ingresar o consultar información</p>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php if($residentes): ?>
                        <form action="" method="post">
                            <input type="hidden" name="prev_page" value="<?php echo $prev_page ?>" />
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cedula</th>
                                    <th>Estado</th>
                                    <th>Plan</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($residentes as $residente): ?>
                                    <tr>
                                        <td>
                                            <b><?php echo $residente->nombre ?></b>
                                            <br />
                                            <small>Ingreso : <?php echo $residente->fecha_ingreso ?></small>
                                        </td>
                                        <td><?php echo $residente->cedula ?></td>
                                        <td><?php
                                            $label_class = $residente->activo == "Si" ? "label-success" : "label-danger";
                                            $label_text  = $label_class == "label-success" ? "Activo" : "Inactivo";
                                            echo "<span class='label $label_class'>$label_text</span>";
                                        ?></td>
                                        <td><?php echo $residente->tipo_plan ?></td>
                                        <td>
                                            <button type="submit" value="<?php echo $residente->cedula ?>"
                                                    class="btn btn-success btn-xs" name="select_resident">
                                                Seleccionar
                                            </button>
                                        </td>
                                        <td>
                                            <?php echo btns_crud($formato, $residente->cedula) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            No hay residentes que concuerden con la busqueda
                        </div>
                    <?php endif ?>

                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('layout/footer') ?>