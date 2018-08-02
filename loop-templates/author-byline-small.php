<div class="byline media mr-3">
    <?php if ( has_post_thumbnail() ) {
        echo  '<a class="hidden-print media-left d-none d-md-block" href="' . get_the_permalink() . '">' . get_the_post_thumbnail($post->ID, 'square-xsm', array( 'class' => 'align-middle d-flex mr-3 rounded-circle' )) . '</a>'; };?> <address class="author media-body d-flex flex-column"><?php echo '<a class="entry-author-link" itemprop="url" rel="author" href="' . get_the_permalink() . '"><span class="entry-author-name" itemprop="name">' . get_the_title() . '</span></a>';?>
            <?php if(!get_field('constituency')) { 
                echo '<span rel="role" class="small text-muted ">' . get_field('job_title') . '</span>';
}
                else {
                    echo '<span rel="role" class="small text-muted d-none d-sm-inline">' . get_the_excerpt('') . '</span>';
                }?>
            </address> </div>