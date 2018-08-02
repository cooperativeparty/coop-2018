<?php 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_call-to-action',
		'title' => 'Call to Action',
		'fields' => array (
			array (
				'key' => 'field_5898b0bfca5df',
				'label' => 'Call to action headline',
				'name' => 'cta_headline',
				'type' => 'text',
				'default_value' => 'What next?',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5898ac57566da',
				'label' => 'Call to action text',
				'name' => 'cta_text',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => 118,
			),
			array (
				'key' => 'field_5898ac6f566db',
				'label' => 'Call to action URL',
				'name' => 'cta_url',
				'type' => 'text',
				'instructions' => 'URL to CTA (Including https://) or page ID',
				'default_value' => '',
				'placeholder' => 'http://',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5898acab566dc',
				'label' => 'Button Text',
				'name' => 'btn_text',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => 80,
			),
			array (
				'key' => 'field_5898accf566dd',
				'label' => 'Button color',
				'name' => 'btn_color',
				'type' => 'select',
				'choices' => array (
					'primary' => 'Purple',
					'success' => 'Green',
					'info' => 'Cyan',
					'warning' => 'Orange',
					'danger' => 'Red',
					'inverse' => 'Black',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'tribe_events',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_campaign-options',
		'title' => 'Campaign options',
		'fields' => array (
			array (
				'key' => 'field_58b821ed24fe0',
				'label' => 'Campaign call to action',
				'name' => 'campaign_cta',
				'type' => 'text',
				'instructions' => 'Will be displayed above the form',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
            array (
				'key' => 'field_58dcef4a96d62',
				'label' => 'Video URL',
				'name' => 'campaign_video_url',
				'type' => 'text',
				'instructions' => 'Optional video URL (Including https://). If this is selected, this instead of an image will be displayed. ',
				'default_value' => '',
				'placeholder' => 'http://',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
            array (
				'key' => 'field_58dcf1fde794d',
				'label' => 'Video aspect ratio',
				'name' => 'campaign_video_aspect',
				'type' => 'radio',
				'instructions' => 'Video size if known',
				'choices' => array (
					'16by9' => 'Widescreen',
					'4by3' => 'Standard',
					'1by1' => 'Square',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_58b821c124fdf',
				'label' => 'Tags',
				'name' => 'campaign_tags',
				'type' => 'text',
				'instructions' => 'Tags which will be associated with contacts recruited through this page',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58b8224124fe1',
				'label' => 'Gravity form ID',
				'name' => 'campaign_gform_id',
				'type' => 'number',
				'instructions' => 'The ID of the Gravity Form associated with this page',
				'default_value' => '92',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'coop_campaign',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_category-options',
		'title' => 'Category Options',
		'fields' => array (
			array (
				'key' => 'field_589b4c77396c9',
				'label' => 'Point person',
				'name' => 'point_person',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'person',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_58ad98ecaeebc',
				'label' => 'Category Thumbnail',
				'name' => 'category_thumbnail',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'all',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_event-meta',
		'title' => 'Event Meta',
		'fields' => array (
			array (
				'key' => 'field_589ddbd599f0a',
				'label' => 'Speakers',
				'name' => 'speakers',
				'type' => 'relationship',
				'instructions' => 'Link to any speakers here',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'guest-author',
					1 => 'person',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_589df2669c9a2',
				'label' => 'Supported by',
				'name' => 'supported_by',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'tribe_organizer',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'tribe_events',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
    /*
	register_field_group(array (
		'id' => 'acf_featured-banner',
		'title' => 'Featured banner',
		'fields' => array (
			array (
				'key' => 'field_556465fde2f61',
				'label' => 'Show banner',
				'name' => 'show_banner',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
            array(
			'key' => 'field_5912f01536127',
			'label' => 'banner_headline',
			'name' => 'banner_headline',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
		),
			array (
				'key' => 'field_55646677e2f64',
				'label' => 'Banner content',
				'name' => 'banner_content',
				'type' => 'wysiwyg',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_556465fde2f61',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5564669fe2f65',
				'label' => 'Banner image',
				'name' => 'banner_image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_556465fde2f61',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_556466c6e2f66',
				'label' => 'Banner colour',
				'name' => 'banner_colour',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_556465fde2f61',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'#711f8e' => 'Purple',
					'#85bc25' => 'Green',
					'#10C2FF' => 'Cyan',
					'#F9A519' => 'Orange',
					'#EB3000' => 'Red',
					'#000000' => 'Black',
					'#282BB9' => 'Blue',
				),
				'default_value' => 'Purple : #711f8e',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_56ab6ecc8f87c',
				'label' => 'Transparency',
				'name' => 'banner_alpha',
				'type' => 'number_slider',
				'default_value' => 1,
                'units' => 'Percent',
				'min_value' => 0,
				'max_value' => 100,
				'increment_value' => '5',
			),
			array (
				'key' => 'field_575ad52f32000',
				'label' => 'Background-size',
				'name' => 'background-size',
				'type' => 'select',
				'choices' => array (
					'Cover' => 'cover',
					'Contain' => 'contain',
				),
				'default_value' => 'cover',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_575ad58b5b0d3',
				'label' => 'Background-repeat',
				'name' => 'background-repeat',
				'type' => 'true_false',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_556465fde2f61',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_5899fd281eaa2',
				'label' => 'Background blend mode',
				'name' => 'background_blend_mode',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_556465fde2f61',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'normal' => 'Normal',
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'color-burn' => 'Color Burn',
					'hard-light' => 'Hard Light',
					'soft-light' => 'Soft Light',
					'difference' => 'Difference',
					'exclusion' => 'Exclusion',
					'hue' => 'Hue',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'luminosity' => 'Luminosity',
				),
				'default_value' => 'soft-light',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'all',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'tribe_events',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));*/
	register_field_group(array (
		'id' => 'acf_microsite-settings',
		'title' => 'Microsite settings',
		'fields' => array (
			array (
				'key' => 'field_56ec0e420c1a4',
				'label' => 'Microsite Logo',
				'name' => 'microsite_logo',
				'type' => 'image',
				'instructions' => 'Upload a logo for this microsite',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56ec0e870c1a5',
				'label' => 'Microsite Colour',
				'name' => 'microsite_colour',
				'type' => 'color_picker',
				'instructions' => 'Colour used for branding on this Microsite',
				'default_value' => '#7114ae',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'devolved_region',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post-author',
		'title' => 'Post Author',
		'fields' => array (
			array (
				'key' => 'field_58cfee1d269f9',
				'label' => 'Author',
				'name' => 'coop_author',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'person',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'publication',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
        
       
}
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5a27c42599a75',
	'title' => 'Search engines',
	'fields' => array(
		array(
			'key' => 'field_59007087080a1',
			'label' => 'Hide from search engines',
			'name' => 'norobots',
			'type' => 'true_false',
			'instructions' => 'Discourage search engines from indexing this page?',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
	),
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5a27c425b0160',
	'title' => 'Social Media',
	'fields' => array(
		array(
			'key' => 'field_58da6b5d7d142',
			'label' => 'Suggested Tweet',
			'name' => 'suggested_tweet',
			'type' => 'textarea',
			'instructions' => 'Enter your suggested tweet here. A link to the article will be added automatically.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => 115,
			'rows' => 3,
			'new_lines' => '',
		),
		array(
			'key' => 'field_58da6a7429c3a',
			'label' => 'Custom sharer graphic',
			'name' => 'custom_sharer_graphic',
			'type' => 'image',
			'instructions' => 'Optional sharer image (if not specified a version of the featured image will be used)',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'preview_size' => 'facebook',
			'library' => 'all',
			'return_format' => 'array',
			'min_width' => 0,
			'min_height' => 0,
			'min_size' => 0,
			'max_width' => 0,
			'max_height' => 0,
			'max_size' => 0,
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'coop_campaign',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tribe_events',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
	),
	'active' => 1,
	'description' => '',
));

endif;
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5a2a75b8a362b',
	'title' => 'Book Options',
	'fields' => array(
		array(
			'key' => 'field_5a2a75f1bac3b',
			'label' => 'Show Table of Contents?',
			'name' => 'show_toc',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Show',
			'ui_off_text' => 'Hide',
		),
        array(
			'key' => 'field_5a2a8c6d1e5a9',
			'label' => 'Show Next / Previous Link',
			'name' => 'next__previous',
			'type' => 'true_false',
			'instructions' => 'Whether to display a link to the next/previous page (useful for chronological pages)',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'briefing',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => 'Automatically generate a table of contents from headings in this post?',
));

endif;
?>