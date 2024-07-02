<?php 
    $h_button = cs_get_option('h_button');
?>
<header id="bzx-header" class="bzx-header-section">
    <div class="container">
        <div class="bzx-header-content d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <?php bizex_logo();?>
            </div>
            <div class="bzx-header-menu-navigation">
                <nav class="bzx-main-navigation-area clearfix ul-li">
                    <?php bizex_main_menu();?>
                </nav>
            </div>
            <div class="bzx-header-search-cta d-flex align-items-center">
                <div class="bzx-header-search">
                    <button class="search-btn"><i class="far fa-search"></i></button>
                </div>
                <?php if(!empty($h_button['text']) || !empty($h_button['url'])):?>
                <div class="bzx-header-cta-btn">
                    <a class="text-uppercase" href="<?php echo esc_url($h_button['url']);?>"><?php echo esc_html($h_button['text']);?> <i class="far fa-long-arrow-right"></i></a>
                </div>
                <?php endif;?>
            </div>
        </div>
        <div class="mobile_menu position-relative">
        <div class="mobile_menu_button open_mobile_menu">
            <i class="fal fa-bars"></i>
        </div>
        <div class="mobile_menu_wrap">
            <div class="mobile_menu_overlay open_mobile_menu"></div>
            <div class="mobile_menu_content">
                <div class="mobile_menu_close open_mobile_menu">
                    <i class="fal fa-times"></i>
                </div>
                <div class="m-brand-logo">
                    <?php bizex_logo();?>
                </div>
                <nav class="mobile-main-navigation  clearfix ul-li">
                    <?php bizex_main_menu();?>
                </nav>
            </div>
        </div>
        <!-- /Mobile-Menu -->
    </div>
    </div>
</header>
<?php bizex_search_overlay();?>