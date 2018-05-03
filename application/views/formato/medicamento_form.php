<?php
if(!isset($print_layout) || $print_layout) {
    $this->load->view('layout/header_formato_form');
    $medicamento_model = $this->getModel('medicamento_model');
    $vias         = $medicamento_model->vias;
    $medicamento_unidades = $medicamento_model->unidades;
}
?>

<div class="col-xs-12">
    <?php echo input_text('nombre', $view, 'Nombre *', 'Nombre del medicamento') ?>
</div>
<div class="col-xs-12">
    <?php echo input_text('presentacion', $view,'Presentación', 'Tableta, capsula, etc...') ?>
</div>
<div class="col-xs-6">
    <?php echo input_text('cantidad', $view,'Cantidad', 'Ingresar la cantidad númerica') ?>
</div>
<div class="col-xs-6">
    <?php
    $default = set_value("cantidad_unidad") || set_value("cantidad_unidad") === "0" ? set_value("cantidad_unidad") : "mg" ;
    echo input_select('cantidad_unidad', $view,"Cantidad unidad", ["n/a"] + $medicamento_unidades, $default)
    ?>
</div>
<div class="col-xs-12">
    <p class="help-block">
        Si la cantidad del medicamento no es posible describirla con el anterior campo, escribala
        en el siguiente campo
    </p>
</div>
<div class="col-xs-12">
    <?php echo input_text('cantidad_excepcional', $view,false) ?>
</div>

<div class="col-xs-12">
    <?php echo input_button_radio('via', $view, "Vía", $vias, 'Oral') ?>
</div>




<?php
if(!isset($print_layout) || $print_layout)
    $this->load->view('layout/footer_formato_form');
?>
