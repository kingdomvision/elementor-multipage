<?php
$footer_bg_4 = cs_get_option('footer_bg_4');
$opening_title_4 = cs_get_option('opening_title_4');
$opening_text_4 = cs_get_option('opening_text_4');
$f4_footer_ct = cs_get_option('f4_footer_ct');
$bizex_copywrite_text = cs_get_option('bizex_copywrite_text');
$footer_menu_title = cs_get_option('footer_menu_title');
$newsletter_title_4 = cs_get_option('newsletter_title_4');
$newsletter_info_4 = cs_get_option('newsletter_info_4');
$newsletter_shortcode = cs_get_option('newsletter_shortcode');
$footer_social_icon_4 = cs_get_option('footer_social_icon_4');
$footer_app_store = cs_get_option('footer_app_store');
?>
<footer id="bizx-footer" class="bizx-footer-section" data-background="<?php echo esc_url($footer_bg_4['url']);?>">
    <div class="container">
        <div class="bizx-footer-content">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="bizx_footer_widget pera-content clearfix ul-li-block  bzx-headline">
                        <div class="bizx_footer_about">
                            <div class="bizx-footer_logo">
                                <?php bizex_logo();?>
                            </div>
                            <?php if(!empty($f4_footer_ct)):?>
                            <div class="bizx-contact-item-area">
                                <?php foreach($f4_footer_ct as $item):?>
                                    <div class="bizx-contact-item d-flex">
                                        <div class="inner-icon">
                                            <i class="<?php echo esc_attr($item['info_icon']);?>"></i>
                                        </div>
                                        <div class="inner-text">
                                            <?php echo wp_kses($item['info_text'], true);?>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                            <?php endif;?>
                            <span><?php echo esc_html($opening_title_4);?></span>
                            <p><?php echo wp_kses($opening_text_4, true);?></p>
                        </div>
                    </div>
                </div>
                <?php if(is_active_sidebar('footer-4')):?>
                <div class="col-lg-4 col-md-6">
                    <div class="bizx_footer_widget pera-content clearfix ul-li-block bzx-headline">
                        <div class="bizx_footer_menu">
                            <?php dynamic_sidebar( 'footer-4' );?>
                        </div>
                    </div>
                </div>
                <?php endif;?>
                <div class="col-lg-4 col-md-6">
                    <div class="bizx_footer_widget pera-content clearfix ul-li-block  bzx-headline">
                        <div class="bizx_footer_social">
                            <?php if(!empty($newsletter_title_4)):?>
                            <h3 class="bizx_widget_title">
                                <span><?php echo wp_kses($newsletter_title_4, true);?></span> 
                                <i></i>
                            </h3>
                            <?php endif;?>
                            <?php if(!empty($newsletter_info_4)):?>
                                <p><?php echo wp_kses($newsletter_info_4, true);?></p>
                            <?php endif;?>
                            <?php if(!empty($newsletter_shortcode)){ echo do_shortcode($newsletter_shortcode);}?>
                            <?php if(!empty($footer_app_store)):?>
                            <div class="footer-download-btn d-flex align-items-center">
                                <?php foreach($footer_app_store as $app):?>
                                    <a href="<?php echo esc_url($app['app_link']);?>"><img src="<?php echo esc_url($app['app_img']['url']);?>" alt="<?php esc_attr_e( 'App Store', 'bizex' );?>"></a>
                                <?php endforeach;?>
                            </div>
                            <?php endif;?>
                            <?php if(!empty($footer_social_icon_4)):?>
                            <div class="footer-social">
                                <?php foreach($footer_social_icon_4 as $icon):?>
                                <a href="<?php echo esc_url($icon['link']);?>"><i class="fb-bg <?php echo esc_attr($icon['icon']);?>"></i></a>
                                <?php endforeach;?>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bizex-footer-copyright text-center">
        <?php 
            if(!empty($bizex_copywrite_text)){
                echo wp_kses( $bizex_copywrite_text, true );
            }else{
                esc_html_e( ' © 2023 Themexriver All Rights Reserved.', 'bizex' );
            }
        ?> 
    </div>
</footer>