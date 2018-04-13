<div class="col-md-12 text-center">
    <?php
   
    $button_name = isset($entity) ? 'actualizar' : 'crear';
    echo input_submit($button_name, $view, ucfirst($button_name))
    ?>
</div>
<?php 
if(!$view)
    echo form_close(); 
?>
</div>
</div>
</div>
</div>


<?php $this->load->view('layout/footer') ?>