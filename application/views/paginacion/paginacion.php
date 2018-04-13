<ul class="pagination pagination-sm no-margin pull-right">
    <li class="<?php echo $page == 1 ? "disabled" : "" ?>">
        <a href="<?php echo $page == 1 ? "#" : "?page=".($page-1) ?>">&laquo;</a>
    </li>
    <?php if($start > 1): ?>
        <li><a href="<?php echo "?page=1" ?>">1</a></li>
        <li class="disabled"><span>...</span></li>
    <?php endif ?>

    <?php for ( $i = $start ; $i <= $end; $i++ ) : ?>
        <li class="<?php echo $page == $i ? 'active' : '' ?>">
            <a href="<?php echo "?page=$i" ?>"><?php echo $i  ?></a>
        </li>
    <?php endfor ?>

    <?php if($end < $last): ?>
        <li class="disabled"><span>...</span></li>
        <li>
            <a href="<?php echo "?page=$last" ?>"><?php echo $last ?></a>
        </li>
    <?php endif ?>

    <li class="<?php echo $page == $last ? "disabled" : "" ?>">
        <a href="<?php echo $page == $last ? "#" : "?page=".($page+1) ?>">&raquo;</a>
    </li>
</ul>