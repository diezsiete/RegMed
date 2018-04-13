<?php if($entities): ?>
    <table class="table">
        <thead>
        <tr>
            <?php foreach($cols as $col_data): ?>
                <th><?php echo $col_data->label ?></th>
            <?php endforeach; ?>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($entities as $entity): ?>
            <tr>
                <?php foreach($cols as $col_data): ?>
                    <td>
                        <?php
                        $call = isset($col_data->fn) ? $col_data->fn :
                            "getAttrHtml".ucfirst($this->utils->toCamelCase($col_data->attr));
                        echo $entity->$call();
                        ?>
                    </td>
                <?php endforeach ?>
                <td>
                    <?php if($formato->ver): ?>
                        <a href="<?php echo str_replace('__id__', $entity->id, site_url($formato->ver));?>"
                           class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                    <?php endif ?>
                    <?php if($formato->editar): ?>
                        <a href="<?php echo str_replace('__id__', $entity->id, site_url($formato->editar)); ?>"
                           class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                    <?php endif ?>
                    <?php if($this->usuario_helper->session()->rol == 1): ?>
                        <a href="<?php echo str_replace('__id__', $entity->id, site_url($formato->borrar)); ?>"
                           class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>

        </tbody>
    </table>
<?php else: ?>
    <p>No hay registros para mostrar</p>
<?php endif ?>