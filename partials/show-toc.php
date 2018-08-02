<?php if(get_field('show_toc')):?>
    <div class="col-md-4">
        <?php echo '<div class="toc-container"><h3 class="toc-title">'.get_the_title().'</h3><ul class="toc-body">' . toc_get_index(get_the_content()) . '</ul></div></h3>';?> </div>
    <?php endif;?>