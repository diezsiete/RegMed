<?php
$this->load->view('layout/header');
?>

<div class="page-title">
    <div class="title_left">
        <h2><?php echo $formato->titulo ?>
            <small><?php echo  $formato->getCodigo() ? strtoupper($formato->getCodigo()) : "" ?></small></h2>
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
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="<?php echo $tab_active == "consultar"  ? "active" : ""?>" >
                            <a href="<?php echo site_url($formato->consultar) ?>"
                               id="residente" role="tab"
                               <?php echo "aria-expanded='" . ($tab_active == "consultar" ? "true" : "false") ."'" ?>>
                                Consultar
                            </a>
                        </li>
                        <li role="presentation" class="<?php echo $tab_active == "graficas"  ? "active" : ""?>">
                            <a href="<?php echo site_url("enfermeria/graficas/e08") ?>"
                               role="tab" id="acudiente"
                                <?php echo "aria-expanded='" . ($tab_active == "graficas" ? "true" : "false") ."'" ?>>
                                Gráficas
                            </a>
                        </li>
                        
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        </div>
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="<?php echo $tab_active ?>">