<?php if(!isset($imprimir) || !$imprimir): ?>
    <?php
    if(!isset($echo_input_submit) || $echo_input_submit) {
        echo '<div class="col-md-12 text-center">';
        $button_name = isset($entity) ? 'actualizar' : 'crear';
        echo input_submit($button_name, $view, ucfirst($button_name));
        echo '</div>';
    }
    ?>

    <?php
    if(!$view)
        echo form_close();
    ?>

    <?php if($view): ?>
        <div class="col-md-12 text-center">
            <a href="<?php echo str_replace('__id__', $entity->id, site_url($formato->imprimir)) ?>"
               class="btn btn-default" target="_blank" ><i class="fa fa-print"></i> Imprimir
            </a>
        </div>
    <?php endif ?>

    </div>
    </div>
    </div>
    </div>


    <?php $this->load->view('layout/footer') ?>
<?php endif ?>
