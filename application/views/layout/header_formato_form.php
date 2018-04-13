<?php $this->load->view('layout/header') ?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $formato->titulo ?>
                    <?php echo  isset($formato->codigo) ? "<small>".strtoupper($formato->codigo)."</small>" : "" ?>
                </h2>
                <div class="panel_toolbox">
                    <a class="btn btn-default btn-sm" href="<?php echo site_url($formato->consultar) ?>">Consultar</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                if(validation_errors()) {
                    echo "<div class='alert alert-danger'>Errores en formulario, verifique la información ingresada</div>";
                }
                if (isset($error_message)) {
                    echo "<div class='alert alert-danger'>$error_message</div>";
                }
                if (isset($insert_message)) {
                    echo "<div class='alert alert-success'>$insert_message</div>";
                }
                ?>
<?php
if(!$view) {
    $url = isset($entity) ? str_replace('__id__', $entity->id, $formato->editar) : $formato->crear;
    $hiddens = [];
    $residente = $this->residente_helper->session();
    if($residente)
        $hiddens['residente_cedula'] = $residente->cedula;
    if(isset($form_open_multipart) && $form_open_multipart){
        echo form_open_multipart($url, [], $hiddens);
    }else
        echo form_open($url, [], $hiddens);
}
?>