<?php
include_once( get_template_directory() . '/lib/ocdi/codestar.php');
function bizex_ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => 'Home One',
			'import_file_url'            => 'https://themexriver.com/wp/bizex/tools/demos/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/codestar.json',
					'option_name' => 'bizex',
				),
			),
			'import_preview_image_url'     => 'https://themexriver.com/wp/bizex/tools/screenshot.png',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.After Import Succesfuly go to Appearance->Menu And Set your Menu', 'bizex' ),
			'preview_url'                  => 'https://themexriver.com/wp/bizex/',
		),
		array(
			'import_file_name'             => 'Home Two',
			'import_file_url'            => 'https://themexriver.com/wp/bizex/tools/demos/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/codestar.json',
					'option_name' => 'bizex',
				),
			),
			'import_preview_image_url'     => 'https://themexriver.com/wp/bizex/tools/home2.png',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.After Import Succesfuly go to Appearance->Menu And Set your Menu', 'bizex' ),
			'preview_url'                  => 'https://themexriver.com/wp/bizex/homepage-two/',
		),
		array(
			'import_file_name'             => 'Home Three',
			'import_file_url'            => 'https://themexriver.com/wp/bizex/tools/demos/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/codestar.json',
					'option_name' => 'bizex',
				),
			),
			'import_preview_image_url'     => 'https://themexriver.com/wp/bizex/tools/home3.png',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.After Import Succesfuly go to Appearance->Menu And Set your Menu', 'bizex' ),
			'preview_url'                  => 'https://themexriver.com/wp/bizex/homepage-three/',
		),
		array(
			'import_file_name'             => 'Home Four',
			'import_file_url'            => 'https://themexriver.com/wp/bizex/tools/demos/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/codestar.json',
					'option_name' => 'bizex',
				),
			),
			'import_preview_image_url'     => 'https://themexriver.com/wp/bizex/tools/home4.png',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.After Import Succesfuly go to Appearance->Menu And Set your Menu', 'bizex' ),
			'preview_url'                  => 'https://themexriver.com/wp/bizex/home/',
		),
		array(
			'import_file_name'             => 'Home Five',
			'import_file_url'            => 'https://themexriver.com/wp/bizex/tools/demos/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/codestar.json',
					'option_name' => 'bizex',
				),
			),
			'import_preview_image_url'     => 'https://themexriver.com/wp/bizex/tools/home5.png',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.After Import Succesfuly go to Appearance->Menu And Set your Menu', 'bizex' ),
			'preview_url'                  => 'https://themexriver.com/wp/bizex/home-5/',
		),
		array(
			'import_file_name'             => 'Home Six',
			'import_file_url'            => 'https://themexriver.com/wp/bizex/tools/demos/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/codestar.json',
					'option_name' => 'bizex',
				),
			),
			'import_preview_image_url'     => 'https://themexriver.com/wp/bizex/tools/home6.png',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.After Import Succesfuly go to Appearance->Menu And Set your Menu', 'bizex' ),
			'preview_url'                  => 'https://themexriver.com/wp/bizex/home-6/',
		),
		array(
			'import_file_name'             => 'Home Seven',
			'import_file_url'            => 'https://themexriver.com/wp/bizex/tools/demos/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'lib/ocdi/demo/codestar.json',
					'option_name' => 'bizex',
				),
			),
			'import_preview_image_url'     => 'https://themexriver.com/wp/bizex/tools/home7.png',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.After Import Succesfuly go to Appearance->Menu And Set your Menu', 'bizex' ),
			'preview_url'                  => 'https://themexriver.com/wp/bizex/home-7/',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'bizex_ocdi_import_files' );

function bizex_ocdi_after_import( $selected_import ) {
	// Assign bizex menus to their locations where will be display.
    $primary  = get_term_by( 'name', 'Primary', 'nav_menu' );

    set_theme_mod( 
        'nav_menu_locations', 
        array( 
            'menu-1' => $primary->term_id,
        ) 
    );

	if ( 'Homepage Two' === $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Homepage Two' );
	}elseif( 'Homepage Three' === $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Homepage Three' );
	}elseif( 'Home 4' === $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home 4' );
	}elseif( 'Home 5' === $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home 5' );
	}elseif( 'Home 6' === $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home 6' );
	}elseif( 'Home 7' === $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home 7' );
	}else {
		$front_page_id = get_page_by_title( 'Home' );
	}

    // bizex Assign front page and posts page Set
    $front_page_id	= get_page_by_title( 'Home' );

    $blog_page_id	= get_page_by_title( 'Blog' );

	//Revulation Slider Import
	if( class_exists('RevSliderSliderImport') ) {
		foreach(array('slider_1', 'slider_2', 'slider_3', 'slider_4', 'slider_5', 'slider_6') as $slider) {
			$file = get_template_directory() . '/lib/ocdi/slider/'.$slider.'.zip';
			if( file_exists($file) ) {
				$importer = new RevSliderSliderImport();
				$response = $importer->import_slider( true, $file );
			}
		}
    }


    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'bizex_ocdi_after_import' );

function bizex_ocdi_before_content_import() {
    add_filter( 'wp_import_post_data_processed', 'bizex_ocdi_wp_import_post_data_processed', 99, 2 );
}
add_action( 'pt-ocdi/before_content_import', 'bizex_ocdi_before_content_import', 99 );

function bizex_ocdi_wp_import_post_data_processed( $postdata, $data ) {
    return wp_slash( $postdata );
}

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );