<?php if(get_field('cta_text')):?>
    <aside id="cta" class="hidden-print card mx-auto bg-light text-center mb-4 fl-animation fl-slide-up">
        <?php if(get_field('cta_headline')){ echo '<h5 class="card-header">' . get_field('cta_headline') . '</h5>'; };
                if(get_field('cta_text')){ echo '<div class="card-body"><p class="card-text">' . get_field('cta_text') . '</p>'; };
                 if(get_field('cta_url')){ 
                     $cta_url = get_field('cta_url');
                     if (is_numeric($cta_url)):
                     $cta_url = get_permalink($cta_url);
                     endif;
                     echo '<a href="' . $cta_url . '" class="btn-lg btn-wrap btn mx-auto btn-' . get_field('btn_color') . '">' . get_field('btn_text') . '</a></div>'; };                
                ?> </aside>
    <?php endif;?>