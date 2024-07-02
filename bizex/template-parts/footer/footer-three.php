<?php 
    $bizex_copywrite_text = cs_get_option('bizex_copywrite_text');
    $f3_about_title       = cs_get_option('f3_about_title');
    $f3_about_desc        = cs_get_option('f3_about_desc');
    $footer_social = cs_get_option('footer_social');
    $f3_footer_ct = cs_get_option('f3_footer_ct');
    $f3_contact_title = cs_get_option('f3_contact_title');
?>
<footer id="bis-footer" class="bis-footer-section">
    <div class="container">
        <div class="bis-footer-widget-wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="bis-footer-widget bzx-headline pera-content ul-li-block">
                        <div class="address-widget">
                            <?php if(!empty($f3_about_title)):?>
                                <h3 class="widget-title"><?php echo wp_kses($f3_about_title, true);?></h3>
                            <?php endif;?>
                            <?php if(!empty($f3_about_title)):?>
                                <p><?php echo wp_kses($f3_about_desc, true);?></p>
                            <?php endif;?>
                            <?php if(!empty($footer_social)):?>
                            <div class="footer-social">
                                <?php foreach($footer_social as $icon):?>
                                    <a href="<?php echo esc_url($icon['link']);?>"><i class="<?php echo esc_attr($icon['icon']);?>"></i></a>
                                <?php endforeach;?>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <?php if(is_active_sidebar('footer-1')):?>
                <div class="col-lg-3 col-md-6">
                    <div class="bis-footer-widget bzx-headline pera-content ul-li-block">
                        <?php dynamic_sidebar( 'footer-1' );?>
                    </div>
                </div>
                <?php endif;?>
                <?php if(is_active_sidebar('footer-2')):?>
                    <div class="col-lg-3 col-md-6">
                        <div class="bis-footer-widget bzx-headline pera-content ul-li-block">
                            <?php dynamic_sidebar( 'footer-2' );?>
                        </div>
                    </div>
                <?php endif;?>
                <div class="col-lg-3 col-md-6">
                    <div class="bis-footer-widget bzx-headline pera-content ul-li-block">
                        <div class="contact-widget">
                            <?php if(!empty($f3_contact_title)):?>
                                <h3 class="widget-title"><?php echo esc_html($f3_contact_title);?></h3>
                            <?php endif;?>
                            <?php if(!empty($f3_footer_ct)):?>
                            <div class="bis-contact-item-area">
                                <?php foreach($f3_footer_ct as $item):?>
                                <div class="bis-contact-item d-flex">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bis-footer-copyright d-flex justify-content-between align-items-center">
            <div class="copyright-logo">
                <?php bizex_logo();?>
            </div>
            <div class="copyright-text">					
                <?php 
                    if(!empty($bizex_copywrite_text)){
                        echo wp_kses( $bizex_copywrite_text, true );
                    }else{
                        esc_html_e( '© Copyright Bisbuzz Consulting 2023', 'bizex' );
                    }
                ?> 
            </div>
        </div>
    </div>
</footer>