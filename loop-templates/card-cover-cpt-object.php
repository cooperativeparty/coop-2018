<?php
/**
 * @package understrap
 */
global $term;
global $faicon;
?>
    <li class="flex-grid-item col-xl-2 col-lg-3 col-sm-4 col-6"> <a class="flex-grid-content flex-column grid-border grid-border-white" href="<?php echo get_term_link( $term->term_id ); ?>"><i class="fa <?php echo $faicon;?>" aria-hidden="true"></i>
<?php echo '<h4>' . $term->name . '</h4>'; ?> </a> </li>