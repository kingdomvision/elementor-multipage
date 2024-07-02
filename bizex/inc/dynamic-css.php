<?php

// File Security Check
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

function bizex_theme_options_style() {

    //
    // Enqueueing StyleSheet file
    //
    wp_enqueue_style( 'bizex-theme-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css' );
    $css_output = '';
    $bizex_primary_color = cs_get_option('theme-color-set'); 
    $bizex_two_color = cs_get_option('bizex-color-two'); 
    $bizex_three_color = cs_get_option('bizex-color-three'); 
    
    //Theme Gradient COlor
    if(!empty($bizex_primary_color)){
        $css_output .= '        
        :root {
                --base-color:  linear-gradient( 90deg, '.esc_attr($bizex_primary_color['1']).' 0%, '.esc_attr($bizex_primary_color['2']).' 100%);
            }
        ';
    }

    if(!empty($bizex_two_color)){
        $css_output .= '        
            :root {
                --base-color-backup:  '.esc_attr($bizex_two_color).';
            }
        ';
    }

    if(!empty($bizex_three_color)){
        $css_output .= '        
            :root {
                --base-color2:  '.esc_attr($bizex_three_color).';
            }
        ';
    }
   

    wp_add_inline_style( 'bizex-theme-custom-style', $css_output );

}
add_action( 'wp_enqueue_scripts', 'bizex_theme_options_style' );
