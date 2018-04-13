<?php 
$this->load->view('layout/header');
?>
<div class="page-title">
    <div class="title_left">
        <h2><?php echo $formato->titulo ?>
            <small><?php echo  isset($formato->codigo) ? strtoupper($formato->codigo) : "" ?></small></h2>
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
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php echo $paginacion ?>

                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <?php $this->load->view('formato/consultar_tabla') ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<?php $this->load->view('layout/footer') ?>
