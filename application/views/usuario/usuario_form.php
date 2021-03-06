<?php
$this->load->view('layout/header_formato_form', ['form_open_multipart' => true]);
$tipos_documento = ['C.C.' => 'C.C.', 'C.E.' => 'C.E.', 'Pasaporte' => 'Pasaporte'];
$estados = ['Activo' => "Activo", 'Inactiva' => 'Inactivo'];
$max_upload_size = $this->utils->byte_2_size($this->utils->max_file_upload_in_bytes());
?>
    <div class="col-md-12">
        <?php echo input_text('nombre', $view, "Nombre Empleado*", "Ingresar Nombre Empleado") ?>
    </div>

    <div class="col-md-6">
        <?php echo input_text('cedula', $view, "Número de documento*", "Ingresar documento") ?>
    </div>
    <div class="col-md-6">
        <?php echo input_button_radio('tipo_documento', $view, "Tipo de documento*", $tipos_documento, "C.C.") ?>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <?php
        $attrs = isset($entity) ? ["readonly" => "readonly"] : [];
        echo input_text('id', $view, "Nombre Usuario*", "Ingresar Usuario", "", $attrs)
        ?>
    </div>
    <div class="col-md-9">
        <?php echo input_button_radio('rol_id', $view, "Rol Autorización*", $roles, "2") ?>
    </div>
    <div class="col-md-12">
        <?php echo input_button_radio('estado', $view, "Estado cuenta*", $estados, 'Activo') ?>
    </div>

    <div class="col-md-12">
        <div class="clearfix"></div>
        <hr>
    </div>
    

    <div class="col-md-4">
        <?php echo input_text('celular', $view, "Telefono/Celular*", "Ingresar teléfono/Celular Empleado") ?>
    </div>
    <div class="col-md-4">
        <?php echo input_text('direccion', $view, "Dirección*", "Ingresar dirección") ?>
    </div>
    <div class="col-md-4">
        <?php echo input_text('email', $view, "Correo Electrónico", "Ingresar Email") ?>
    </div>




    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Foto</label>
            <input type="file" name="foto" accept="image/jpeg" />
            <i>*El archivo deberá pesar máximo <?php echo $max_upload_size ?></i>
        </div>
    </div>


<?php $this->load->view('layout/footer_formato_form') ?>