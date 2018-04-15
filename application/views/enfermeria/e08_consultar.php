<?php $this->load->view('enfermeria/e08_consultar_header'); ?>
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
<?php $this->load->view('enfermeria/e08_consultar_footer'); ?>



