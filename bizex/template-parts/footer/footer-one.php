<?php 
$f_title = cs_get_option('f_title');
$f_text = cs_get_option('f_text');
$f_btn = cs_get_option('f_btn');
$contact_title = cs_get_option('contact_title');
$cf_f_info = cs_get_option('cf_f_info');
$footer_social = cs_get_option('footer_social');
$chat_icon = cs_get_option('chat_icon');
$chat_text = cs_get_option('chat_text');
$bizex_copywrite_text = cs_get_option('bizex_copywrite_text');
$footer_links = cs_get_option('footer_links');
$no_f_w = '';
if(!is_active_sidebar('footer-1') || !is_active_sidebar('footer-2') || !is_active_sidebar('footer-3')){
    $no_f_w = 'no_footer_active';
}
?>
<footer id="bz-footer" class="bz-footer-section <?php echo esc_attr($no_f_w);?>">
    <div class="container"> 
        <?php if(!empty($f_title)):?>
        <div class="bz-footer-cta-content d-flex align-items-center justify-content-between">
            <div class="bz-section-title pera-content headline">
                <?php if(!empty($f_title)):?>
                <h2><?php echo wp_kses( $f_title, true );?>
                </h2>
                <?php endif;?>
                <?php if(!empty($f_text)):?>
                    <p><?php echo wp_kses( $f_text, true );?></p>
                <?php endif;?>
            </div>
            <?php if(!empty($f_btn['url']) || !empty($empty['text'])):?>
            <div class="bz-btn text-uppercase">
                <a href="<?php echo esc_url($f_btn['url']);?>"><?php echo esc_html($f_btn['text']);?> <i class="fas fa-long-arrow-right"></i></a>
            </div>
            <?php endif;?>
        </div>
        <?php endif;?>
        <?php if(is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')):?>
        <div class="bz-footer-widget-content-area">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="bz-footer-widget headline pera-content">
                        <div class="address-widget">
                            <?php if(!empty($contact_title)):?>
                                <h3 class="widget-title"><?php echo wp_kses( $contact_title, true );?></h3>
                            <?php endif;?>
                            <?php if(!empty($cf_f_info)):?>
                                <p><?php echo wp_kses( $cf_f_info, true );?></p>
                            <?php endif;?>
                            <?php if(!empty($footer_social)):?>
                            <div class="footer-social ul-li">
                                <ul>
                                    <?php foreach($footer_social as $icon):?>
                                        <li><a href="<?php echo esc_url($icon['link']);?>"><i class="<?php echo esc_attr($icon['icon']);?>"></i></a></li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <?php endif;?>
                            <?php if(!empty($chat_icon['url']) || !empty($chat_text)):?>
                            <div class="footer-chat d-flex align-items-center">
                                <div class="chat-hand">
                                    <img src="<?php echo esc_url($chat_icon['url']);?>" alt="">
                                </div>
                                <div class="chat-text">
                                    <?php echo esc_html($chat_text);?>
                                </div>
                            </div>
                            <?php endif;?>
                        </div>          
                    </div>
                </div>
                <?php if(is_active_sidebar('footer-1')):?>
                <div class="col-lg-3 col-md-6">
                    <?php dynamic_sidebar( 'footer-1' );?>
                </div>
                <?php endif;?>
                <?php if(is_active_sidebar('footer-2')):?>
                    <div class="col-lg-3 col-md-6">
                        <?php dynamic_sidebar( 'footer-2' );?>
                    </div>
                <?php endif;?>
                <?php if(is_active_sidebar('footer-3')):?>
                    <div class="col-lg-3 col-md-6">
                        <?php dynamic_sidebar( 'footer-3' );?>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <?php endif;?>
        <div class="bz-footer-copyright d-flex align-items-center justify-content-between">
            <div class="bz-footer-copyright-text">
                <?php 
                    if(!empty($bizex_copywrite_text)){
                        echo wp_kses( $bizex_copywrite_text, true );
                    }else{
                        esc_html_e( ' © 2023 Themexriver All Rights Reserved.', 'bizex' );
                    }
                ?> 
            </div>
            <?php if(!empty($footer_links)):?>
            <div class="bz-footer-copyright-menu ul-li">
                <ul>
                    <?php foreach($footer_links as $item):?>
                    <li><a href="<?php echo esc_url($item['link']['url']);?>"><?php echo esc_html($item['link']['text']);?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <?php endif;?>
        </div>
    </div>
</footer>