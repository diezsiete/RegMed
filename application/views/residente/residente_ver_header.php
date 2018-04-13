<?php
$this->load->view('layout/header');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Residente</h2>
                <div class="panel_toolbox">
                    <a class="btn btn-default btn-sm" href="<?php echo site_url($formato_residente->consultar) ?>">Consultar</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="<?php echo $tab_active == "residente"  ? "active" : ""?>" >
                            <a href="<?php echo site_url(str_replace('__id__', $residente->cedula, $formato_residente->ver)) ?>"
                               id="residente" role="tab"
                               <?php echo "aria-expanded='" . ($tab_active == "residente" ? "true" : "false") ."'" ?>>
                                Datos personales
                            </a>
                        </li>
                        <li role="presentation" class="<?php echo $tab_active == "acudiente"  ? "active" : ""?>">
                            <a href="<?php echo site_url("residente/consultar/acudiente") ?>"
                               role="tab" id="acudiente"
                                <?php echo "aria-expanded='" . ($tab_active == "acudiente" ? "true" : "false") ."'" ?>>
                                Acudientes
                            </a>
                        </li>
                        <li role="presentation" class="<?php echo $tab_active == "objeto"  ? "active" : ""?>">
                            <a href="<?php echo site_url("residente/consultar/objeto") ?>"
                               role="tab" id="objeto" aria-expanded="false"
                                <?php echo "aria-expanded='" . ($tab_active == "objeto" ? "true" : "false") ."'" ?>>
                                Objetos personales
                            </a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        </div>
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="<?php echo $tab_active ?>">