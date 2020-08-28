<?php
function gilb_portfolio_metabox( $meta_boxes ) {

	$gilb_prefix = '_gilb_';
	$meta_boxes[] = array(
		'id'        => 'portfolio_single_metaboxs',
		'title'     => esc_html__( 'Portfolio Options', 'gilb' ),
		'post_types'=> array( 'portfolio' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $gilb_prefix . 'project_img',
				'type'  => 'image_advanced',
				'name'  => esc_html__( 'Portfolio Image', 'gilb' ),
				'placeholder' => esc_html__( 'Portfolio Image', 'gilb' ),
				'max_file_uploads' => 1,
				'max_status'       => false
			),
			array(
				'id'    => $gilb_prefix . 'img_size',
				'type'  => 'select',
				'name'  => esc_html__( 'Image Size', 'gilb' ),
				'placeholder' => esc_html__( 'Image Size', 'gilb' ),
				'options'	=> [
					'360x378'	=>	'360x378',
					'750x787'	=>	'750x787',
					'750x378'	=>	'750x378',
				]
			),
			array(
				'id'    => $gilb_prefix . 'ach_list',
				'type'  => 'text_list',
				'name'  => esc_html__( 'Add Link', 'gilb' ),
				'placeholder' => esc_html__( 'Add Link', 'gilb' ),
				'sort_clone' => true,
				'clone' => true,
				'options'	=> [
					'anc_label'	=>	'Label',
					'anc_url'	=>	'URL',
				]
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'gilb_portfolio_metabox' );