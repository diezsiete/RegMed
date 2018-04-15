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
                    <?php echo btns_crud($formato, $entity->id) ?>
                </td>
            </tr>
        <?php endforeach ?>

        </tbody>
    </table>
<?php else: ?>
    <p>No hay registros para mostrar</p>
<?php endif ?>