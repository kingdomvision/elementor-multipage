<?php 
    $ft_shape = cs_get_option('ft_shape');
    $title = cs_get_option('title');
    $newsletter = cs_get_option('newsletter');
    $f_p_title = cs_get_option('f_p_title');
    $f_p_no = cs_get_option('f_p_no');
?>
<footer id="bz-footer-2" class="bz-footer-section-2 position-relative">
    <?php if(!empty($ft_shape['url'])):?>
        <span class="footer-shape1 position-absolute"><img src="<?php echo esc_url($ft_shape['url']);?>" alt="<?php echo esc_attr($ft_shape['alt']);?>"></span>
    <?php endif;?>
    <div class="container">
        <div class="bz-footer-newslateer-2 headline position-relative">
            <?php if(!empty($title)):?>
                <h3><?php echo wp_kses( $title, true );?></h3>
            <?php endif;?>
            <?php if(!empty($newsletter)){echo do_shortcode( $newsletter );}?>
        </div>
        <div class="bz-footer-menu-area d-flex justify-content-between align-items-center">
            <div class="bz-brand-logo">
                <?php bizex_logo();?>
            </div>
            <div class="bz-footer-menu text-center ul-li">
                <?php bizex_footer_menu();?>
            </div>
            <?php if(!empty($f_p_title) || !empty($f_p_no)):?>
            <div class="bz-footer-cta d-flex align-items-center ">
                <div class="bz-footer-cta-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="bz-footer-cta-text">
                    <span class="hd-title text-uppercase"><?php echo esc_html($f_p_title);?></span>
                    <span class="hd-value text-uppercase"><?php echo esc_html($f_p_no);?></span>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</footer>