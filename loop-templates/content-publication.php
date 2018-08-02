<?php
/**
 * @package understrap
 */
       $pdf_field = get_field('document_url');
            $pdf_id = $pdf_field['id'];
            $pdf_url = $pdf_field['url'];
if($pdf_url) {
if (in_array("Content-Type: application/pdf", get_headers($pdf_url))) {
    $doc_url = $pdf_url;
} else {
    $doc_url = 'https://view.officeapps.live.com/op/embed.aspx?src='  . $pdf_url;
}}
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <!-- .entry-header -->
        <div class="embed-responsive embed-responsive-a4">
            <iframe class="embed-responsive-item" src="<?php if($pdf_url) echo $doc_url;?>" style="width:100%;" frameborder="0"></iframe>
        </div>
        <?php /*
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) ); */ 
		?>
            <!-- .entry-content -->
            <footer class="entry-footer">
                <?php // understrap_entry_footer(); ?>
            </footer>
            <!-- .entry-footer -->
    </article>
    <!-- #post-## -->