<?php 
$this->load->view('residente/residente_ver_header');
?>
<?php if($formato->crear): ?>
<div class="col-md-12">
    <a href="<?php echo site_url($formato->crear) ?>" class="btn btn-sm btn-success pull-right">
        <i class="fa fa-plus-circle"></i>Crear objeto
    </a>
</div>
<?php endif ?>
<?php
$this->load->view('formato/consultar_tabla');

$this->load->view('residente/residente_ver_footer');
?>
                            