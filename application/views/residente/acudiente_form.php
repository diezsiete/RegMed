<?php 
$this->load->view('residente/residente_ver_header');
?>

<div class="row">
    <?php
    echo form_open('residente/crear/acudiente', [], ['residente_cedula' => $residente->cedula]);
    ?>

    <?php
    if(validation_errors())
        echo "<div class='alert alert-danger'>Errores en formulario, verifique la información ingresada</div>";

    if (isset($error_message))
        echo "<div class='alert alert-danger'>$error_message</div>";
    ?>

    <div class="col-md-6">
        <?php echo input_text('cedula', $view, 'Cédula Acudiente', 'Ingresar Cedula Acudiente') ?>
    </div>
    <div class="col-md-6">
        <?php echo input_text('nombre', $view, 'Nombre Acudiente', 'Ingresar Nombre Acudiente') ?>
    </div>
    <div class="col-md-4">
        <?php echo input_text('direccion', $view, 'Dirección', 'Ingresar Dirección del Acudiente') ?>
    </div>
    <div class="col-md-4">
        <?php echo input_text('telefono', $view, 'Teléfono', 'Ingresar Teléfono del Acudiente') ?>
    </div>
    <div class="col-md-4">
        <?php echo input_text('celular', $view, 'Celular', 'Ingresar celular del acudiente') ?>
    </div>
    <div class="col-md-12">
        <div class="clearfix"></div>
    </div>
    <div class="col-md-6">
        <?php echo input_text('email', $view, 'Email', 'Ingresar email del acudiente') ?>
    </div>
    <div class="col-md-6">
        <?php echo input_text('parentesco', $view, 'Ingresar Parentesco o relación del acudiente') ?>
    </div>
    <?php if(!$view): ?>
        <div class="col-md-12 text-center">
            <input type="submit" class="btn btn-success" name="crear" value="Crear">
        </div>
    <?php endif ?>


    <?php echo form_close(); ?>
</div>



<?php
$this->load->view('residente/residente_ver_footer');
?>
                            