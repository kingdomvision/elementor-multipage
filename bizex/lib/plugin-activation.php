<?php

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'bizex_register_required_plugins' );

function bizex_register_required_plugins() {

    $plugins = array(
        array(
			'name'               => esc_html__('Bizex Tools', 'bizex'),
			'slug'               => 'bizex-tools',
			'source'             => ( 'https://themexriver.com/wp/bizex/tools/plugin/bizex-tools.zip' ),
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),
        array(
            'name'     => 'Elementor Website Builder',
            'slug'     => 'elementor',
            'required' => true,
        ),
        array(
            'name'     => 'Elementor Header & Footer Builder',
            'slug'     => 'header-footer-elementor',
            'required' => true,
        ),
        array(
			'name'               => esc_html__('Envato Market', 'bizex'),
			'slug'               => 'envato-market',
			'source'             => esc_url( 'https://goo.gl/pkJS33' ),
            'external_url'       => esc_url( 'https://goo.gl/pkJS33' ),
			'required'           => true,
		), 
        array(
            'name'               => esc_html__('Slider Revolution', 'bizex'),
            'slug'               => 'revslider',
            'source'             => 'https://themexriver.com/wp/bizex/tools/plugin/revslider.zip',
            'required'           => true,
        ), 
        array(
            'name'     => esc_html__('Contact Form 7', 'bizex'),
            'slug'     => 'contact-form-7',
            'required' => false,
        ),
        array(
            'name'     => esc_html__('SVG Support', 'bizex'),
            'slug'     => 'svg-support',
            'required' => false,
        ),

        array(
            'name'     => esc_html__('MC4WP: Mailchimp for WordPress', 'bizex'),
            'slug'     => 'mailchimp-for-wp',
            'required' => false,
        ),

        array(
            'name'     => esc_html__( 'One Click Demo Import', 'bizex' ),
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ),
        array(
            'name'     => esc_html__( 'WooCommerce', 'bizex' ),
            'slug'     => 'woocommerce',
            'required' => false,
        ),

    );

    $config = array(
        'id'           => 'bizex',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa( $plugins, $config );
}
