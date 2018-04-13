<?php 
$this->load->view('residente/residente_ver_header');
?>

<div class="row">
    <?php
    echo form_open('residente/crear/objeto', [], ['residente_cedula' => $residente->cedula]);
    ?>

    <?php
    if(validation_errors())
        echo "<div class='alert alert-danger'>Errores en formulario, verifique la información ingresada</div>";

    if (isset($error_message))
        echo "<div class='alert alert-danger'>$error_message</div>";
    ?>

    <div class="col-md-12">
        <?php echo input_text('nombre', $view, 'Nombre', 'Ingresar Nombre del Artículo') ?>
    </div>
    <div class="col-md-12">
        <?php echo input_textarea('descripcion', $view, 'Descripción física del objeto', 'Ingresar Descripción') ?>
    </div>

    <div class="col-md-12">
        <?php echo input_button_radio('estado', $view, 'Estado general', [
                'Nuevo' => 'Nuevo',
                'Buen estado' => 'Buen estado',
                'Deteriorado' => 'Deteriorado',
                'Mal estado' => 'Mal estado',
            ], 'Buen estado') ?>
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
                            