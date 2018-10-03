<div class="<?php the_cc_css_classes( 'card' ); ?>">
    <?php if ( get_cc_data( 'image' ) ) : ?> <a class="card-img-top" href="<?php the_cc_data( 'url', 'esc_url' ); ?>" <?php the_cc_target(); ?>>
					<?php the_cc_image( 'full' ); ?>
				</a>
        <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"> <a class="content_cards_title_link" href="<?php the_cc_data( 'url', 'esc_url' ); ?>" <?php the_cc_target(); ?>>
			<?php the_cc_data( 'title' ); ?>
		</a> </h5>
                <p class="card-text"> <a class="content_cards_description_link" href="<?php the_cc_data( 'url', 'esc_url' ); ?>" <?php the_cc_target(); ?>>
			<?php the_cc_data( 'description' ); ?>
                </a> </p>
            </div>
            <div class="card-footer">
                <?php if ( get_cc_data('favicon') ) : ?><img src="<?php the_cc_data( 'favicon', 'esc_url' ); ?>" alt="<?php the_cc_data( 'site_name', 'esc_attr' ); ?>" class="content_cards_favicon" />
                    <?php endif; ?>
                        <?php the_cc_data( 'site_name' ); ?>
            </div>
</div>