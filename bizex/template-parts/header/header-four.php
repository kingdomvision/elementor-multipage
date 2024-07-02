<?php 
$h_button = cs_get_option('h_button'); 
$h_button_t = cs_get_option('h_button_t'); 
?>
<header id="bizx-header" class="bizx-header-section">
    <div class="container">
        <div class="bizx-header-content d-flex align-items-center justify-content-between">
            <div class="bizx-header-logo-menu d-flex align-items-center">
                <div class="brand-logo">
                    <?php bizex_logo();?>
                </div>
                <div class="bizx-header-menu-navigation">
                    <nav class="bizx-main-navigation-area clearfix ul-li">
                        <?php bizex_main_menu();?>
                    </nav>
                </div>
            </div>
            <div class="bizx-header-btn d-flex align-items-center">
                <?php if(!empty($h_button['text']) || $h_button['url']):?>
                <div class="bizx-login">
                    <a href="<?php echo esc_url($h_button['url']);?>"><i class="far fa-caret-circle-down"></i> <?php echo esc_html($h_button['text']);?></a>
                </div>
                <?php endif;?>
                <?php if(!empty($h_button_t['text']) || $h_button_t['url']):?>
                <div class="bizx-sign-up">
                    <a href="<?php echo esc_url($h_button_t['url']);?>"><?php echo esc_html($h_button_t['text']);?></a>
                </div>
                <?php endif;?>
            </div>
        </div>
        <?php bizex_mobile_menu();?>
    </div>
</header>