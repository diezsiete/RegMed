<?php $this->load->view('layout/header') ?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Modificar Contraseña</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="col-md-12">
                    <?php
                    if (isset($error_message))
                        echo "<div class='alert alert-danger'>$error_message</div>";
                    if (isset($insert_message))
                        echo "<div class='alert alert-success'>".$insert_message."</div>";
                    ?>
                </div>
                <br />
                <?php echo form_open("usuario/modificar-pass", ['class' => 'form-horizontal form-label-left"']); ?>

                <?php $vali = form_error('passAct') ?>
                <div class="form-group<?php echo $vali ? ' has-error' : '' ?>">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passAct">Contraseña Actual</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" class="form-control" id="passAct" name="passAct" placeholder="Ingresar contraseña actual" value="<?php echo set_value('passAct') ?>">
                    </div>
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                        <?php if($vali)  echo $vali ?>
                    </div>
                </div>

                <?php $vali = form_error('passNuev') ?>
                <div class="form-group<?php echo $vali ? ' has-error' : '' ?>">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passNuev">Nueva Contraseña</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" class="form-control" id="passNuev" name="passNuev" placeholder="Ingresar contraseña nueva" value="<?php echo set_value('passNuev') ?>">
                    </div>
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                        <?php if($vali)  echo $vali ?>
                    </div>
                </div>
                <?php $vali = form_error('passConf') ?>
                <div class="form-group<?php echo $vali ? ' has-error' : '' ?>">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passConf">Confirmar Contraseña</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" class="form-control" id="passConf" name="passConf" placeholder="Ingresar confirmación" value="<?php echo set_value('passConf') ?>">
                    </div>
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                        <?php if($vali)  echo $vali ?>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>



<?php $this->load->view('layout/footer') ?>