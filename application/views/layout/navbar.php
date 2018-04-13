<?php
$nav= $this->modulo->getFormatosAccesoByModulo();
$hay_formatos = false;
foreach($nav as $modulo)
    if(count($modulo['formatos']))
        $hay_formatos = true;
?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo site_url('/welcome') ?>" class="site_title"><span>RegMed</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <?php if($residente = $this->residente_helper->session()): ?>
                <div class="profile_pic">
                    <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $residente->foto )  ?> " class="img-circle profile_img"/>
                </div>
                <div class="profile_info">
                    <h2><?php echo $residente->nombre ?></h2>
                    <span><?php echo $residente->tipo_documento . " " . $residente->cedula ?></span><br>
                    <span class="edad"><?php echo $residente->anos ?> Años</span>
                </div>
            <?php endif ?>
            <div class="clearfix"></div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <?php if($hay_formatos): ?>
                <div class="menu_section">
                    <h3>Formatos</h3>
                    <ul class="nav side-menu">
                    <?php foreach($nav as $modulo_key => $modulo): ?>
                        <li class="active"><a> <?php echo $modulo['titulo'] ?> <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <?php foreach($modulo['formatos'] as $formato_key => $formato): ?>
                                    <li>

                                        <?php if($formato->crear): ?>
                                            <a href="<?php echo site_url($formato->crear) ?>" class="crear-formato">
                                                <i class="fa fa-plus-circle"></i>
                                            </a>
                                        <?php endif ?>
                                        <?php if(isset($formato->codigo) && $formato->codigo): ?>
                                            <span class="reporte-codigo badge"><?php echo strtoupper($formato->codigo) ?></span>
                                        <?php endif ?>
                                        <a href="<?php echo site_url($formato->consultar) ?>">
                                            <?php echo $formato->titulo ?>
                                        </a>

                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>