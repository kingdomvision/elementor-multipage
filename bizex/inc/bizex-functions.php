<?php 

function bizex_perloader(){ 
    $preloader_enable = cs_get_option('preloader_enable');

    if($preloader_enable == true):
?>
    <div class="bizex-preloader">
		<div class="sk-folding-cube">
			<div class="sk-cube1 sk-cube"></div>
			<div class="sk-cube2 sk-cube"></div>
			<div class="sk-cube4 sk-cube"></div>
			<div class="sk-cube3 sk-cube"></div>
		</div>
	</div>
<?php 
endif;
}

/**
 * bizex Main Menu Register
 *
 * @return void
 */
function bizex_main_menu(){

    if(get_post_meta(get_the_ID(), 'bizex_page_meta', true)) {
        $menu_meta = get_post_meta(get_the_ID(), 'bizex_page_meta', true);
    } else {
        $menu_meta = array();
    }

    if( array_key_exists( 'onepage-nav', $menu_meta )) {
        $onepagemenu = $menu_meta['onepage-nav'];
    } else {
        $onepagemenu = false;
    }

    echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu clearfix'], wp_nav_menu( array( 
        'echo'           => false,
        'theme_location' => $onepagemenu == false ? 'menu-1' : 'menu-3',
        'menu_id'        =>'main-nav',
        'menu_class'     =>'nav navbar-nav clearfix',
        'container'=>false,
        'fallback_cb'    => 'Bizex_Bootstrap_Navwalker::fallback',
    )) );	
}
/**
 * Footer Menu
 *
 * @return void
 */
function bizex_footer_menu(){
    wp_nav_menu( array( 
        'theme_location' => 'menu-2', 
        'fallback_cb'    => 'Bizex_Bootstrap_Navwalker::fallback',
    ));	
}

/**
 * bizex Header Option
 *
 * @return void
 */
function bizex_header_option(){
    if('header-style-one' === bizex_site_header()){
        get_template_part('template-parts/header/header', 'one');
    }elseif('header-style-two' === bizex_site_header()){
        get_template_part('template-parts/header/header', 'two');
    }elseif('header-style-three' === bizex_site_header()){
        get_template_part('template-parts/header/header', 'three');
    }elseif('header-style-four' === bizex_site_header()){
        get_template_part('template-parts/header/header', 'four');
    }else{
      get_template_part('template-parts/header/header', 'two');
    }
}

/**
 * bizex Header Option
 *
 * @return void
 */
function bizex_footer_option(){
    if('footer-style-one' === bizex_site_footer()){
        get_template_part('template-parts/footer/footer', 'one');
    }elseif('footer-style-two' === bizex_site_footer()){
        get_template_part('template-parts/footer/footer', 'two');
    }elseif('footer-style-three' === bizex_site_footer()){
        get_template_part('template-parts/footer/footer', 'three');
    }elseif('footer-style-four' === bizex_site_footer()){
        get_template_part('template-parts/footer/footer', 'four');
    }else{
      get_template_part('template-parts/footer/footer', 'one');
    }
}
/**
 * Bizex Search Popup
 *
 * @return void
 */
function bizex_search_overlay(){ ?>
    <div class="search-body">
		<div class="search-form">
			<form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form-area">
				<input class="search-input" type="search" name="s" value="<?php the_search_query();?>" placeholder="<?php esc_attr_e( 'Search Here', 'bizex' );?>">
				<button type="submit" class="search-btn1">
					<i class="fas fa-search"></i>
				</button>	
			</form>
			<div class="outer-close text-center search-btn">
				<i class="far fa-times"></i>
			</div>
		</div>
	</div>
<?php 
}

function bizex_header_markup(){ ?>
<?php 
$is_enable_offcanvas_nav = cs_get_option('is_enable_offcanvas_nav'); 
$call_title = cs_get_option('call_title'); 
$phone_no = cs_get_option('phone_no'); 
$h_button = cs_get_option('h_button'); 
?>
<header id="bz-header" class="bz-header-section header-type-one <?php if(bizex_site_header() == 'header-style-two'){echo esc_attr('white-bg');}?>">
    <div class="bz-header-content-wrapper align-items-center d-flex justify-content-between">
        <div class="bz-logo-navigation d-flex align-items-center">
            <div class="bz-brand-logo">
                <?php bizex_logo();?>
            </div>
            <div class="bz-header-menu">
                <nav class="bz-mabz-navigation-area clearfix ul-li">
                    <?php bizex_main_menu();?>
                </nav>
            </div> 
        </div>
        <div class="bz-header-search-sidebar-cta d-flex align-items-center">
            <?php if($is_enable_offcanvas_nav == true):?>
            <div class="bz-sidebar-btn navSidebar-button">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <?php endif;?>
            <div class="bz-header-search">
                <button class="search-btn"><i class="far fa-search"></i></button>
            </div>
            <?php if(!empty($call_title) || !empty($phone_no)):?>
            <div class="bz-header-cta">
                <span class="hd-title text-uppercase"><?php echo esc_html($call_title);?></span>
                <span class="hd-value text-uppercase"><?php echo esc_html($phone_no);?></span>
            </div>
            <?php endif;?>
            <?php if(!empty($h_button['text']) || !empty($h_button['url'])):?>
            <div class="bz-header-cta-btn">
                <a class="text-uppercase" href="<?php echo esc_url($h_button['url']);?>"><?php echo esc_html($h_button['text']);?> <i class="far fa-long-arrow-right"></i></a>
            </div>
            <?php endif;?>
        </div>
    </div>
    <?php bizex_mobile_menu();?>
</header>    
<?php 
}

/**
 * [Mobile Menu]
 *
 * @return  [type]  [return description]
 */
function bizex_mobile_menu(){ ?>
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
                    <?php bizex_logo_v2();?>
                </div>
                <div class="in-m-search">
                    <form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="text" name="s" value="<?php the_search_query();?>" placeholder="<?php esc_attr_e( 'Search...', 'bizex' );?>">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>
                <nav class="mobile-main-navigation  clearfix ul-li">
                    <?php bizex_main_menu();?>
                </nav>
            </div>
        </div>
        <!-- /Mobile-Menu -->
    </div>
<?php 
}

/**
 * Sidebar Nav
 *
 * @return void
 */
function bizex_sidebar_nav(){    
    $off_logo = cs_get_option('off_logo');    
    $aboout_title = cs_get_option('aboout_title');    
    $aboout_info = cs_get_option('aboout_info');    
    $galle_title = cs_get_option('galle_title');    
    $gallerys = cs_get_option('galle-gallery-1');    
    $gallery_ids = explode( ',', $gallerys );
    $social_title_title = cs_get_option('social_title_title');    
    $offc_social_icons = cs_get_option('offc_social_icons');    
?>
    <div class="xs-sidebar-group info-group">
		<div class="xs-overlay xs-bg-black">
			<div class="row loader-area">
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
			</div>
		</div>
		<div class="xs-sidebar-widget">
			<div class="sidebar-widget-container">
				<div class="widget-heading">
					<a href="#" class="close-side-widget">
						<?php esc_html_e( 'X', 'bizex' );?>
					</a>
				</div>
				<div class="sidebar-textwidget">

					<div class="sidebar-info-contents headline pera-content">
						<div class="content-inner">
                            <?php if(!empty($off_logo['url'])):?>
							<div class="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($off_logo['url']);?>" alt="<?php echo esc_attr($off_logo['alt']);?>"></a>
							</div>
                            <?php endif;?>
							<div class="content-box">
								<h5><?php echo esc_html($aboout_title);?></h5>
								<p class="text"><?php echo wp_kses( $aboout_info, true );?></p>
							</div>
							<div class="gallery-box ul-li">
                                <?php if(!empty($galle_title)):?>
								    <h5><?php echo esc_html($galle_title);?></h5>
                                <?php endif;?>
								<ul class="zoom-gallery">
                                    <?php foreach($gallery_ids as $item):?>
									    <li><a href="<?php echo esc_url(wp_get_attachment_url($item, 'full'));?>" data-source="<?php echo esc_url(wp_get_attachment_url($item, 'full'));?>"><img src="<?php echo esc_url(wp_get_attachment_url($item, 'large'));?>" alt="<?php esc_attr_e('Gallery', 'bizex');?>"></a></li>
                                    <?php endforeach;?>
								</ul>
							</div>
							<div class="content-box">
                                <?php if(!empty($social_title_title)):?>
                                    <h5><?php echo esc_html($social_title_title);?></h5>
                                <?php endif;?>
                                <?php if(!empty($offc_social_icons)):?>
								<ul class="social-box">
                                    <?php foreach($offc_social_icons as $sicon):?>
									    <li><a href="<?php echo esc_url($sicon['link']);?>" class="<?php echo esc_attr($sicon['icon']);?>"></a></li>
                                    <?php endforeach;?>
								</ul>
                                <?php endif;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
}


/***
 * Bizex Post Loop
 */
function bizex_post_loop(){
    if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /*
                * Include the Post-Type-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                */
            get_template_part( 'template-parts/content', get_post_type() );

        endwhile; ?>

        <div class="biz-pagination text-left ul-li">
            <?php bizex_pagination();?>
        </div> 

    <?php else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
}

/**
 * Single Post Loop
 *
 * @return void
 */
function bizex_single_post_loop(){
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'single' );

        bizex_single_post_pagination();

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
}

function bizex_archive_loop(){ ?>
    <?php if ( have_posts() ) : ?>

        <?php
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            get_template_part( 'template-parts/content', get_post_type() );

        endwhile; ?>

        <div class="biz-pagination text-left ul-li">
            <?php bizex_pagination();?>
        </div> 

    <?php else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>
<?php 
}

/**
 * Search Loop
 *
 * @return void
 */
function bizex_search_loop(){ ?>
    <?php if ( have_posts() ) : ?>

        <?php
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /**
             * Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called content-search.php and that will be used instead.
             */
            get_template_part( 'template-parts/content', 'search' );

        endwhile;?>

        <div class="biz-pagination text-left ul-li">
            <?php bizex_pagination();?>
        </div> 

    <?php else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>
<?php
}

/**
 * Blog Breadcrumb
 *
 * @return void
 */
function bizex_page_breadcrumb(){   
    $pg_shape_1 = cs_get_option('pg_shape_1');    
    $pg_shape_2 = cs_get_option('pg_shape_2');    
    $br_custom_title = cs_get_option('br_custom_title');    

?>
<section id="bz-breadcrumb" class="bz-breadcrumb-section">
    <div class="bz-breadcrumb-content position-relative text-capitalize text-center headline">
        <h2><?php if(!empty($br_custom_title)){echo esc_html($br_custom_title);}else{ the_title(); }?></h2>
        <?php if(!empty($pg_shape_1['url'])):?>
            <span class="bz-bread-side-shape position-absolute"><img src="<?php echo esc_url($pg_shape_1['url']);?>" alt="<?php echo esc_attr($pg_shape_1['alt']);?>"></span>
        <?php endif;?>
        <?php if(!empty($pg_shape_2['url'])):?>
            <span class="bz-bread-side-shape2 position-absolute"><img src="<?php echo esc_url($pg_shape_2['url']);?>" alt="<?php echo esc_attr($pg_shape_2['alt']);?>"></span>
        <?php endif;?>
    </div>
</section>
<?php 
}

/**
 * Blog Breadcrumb
 *
 * @return void
 */
function bizex_shop_breadcrumb(){ 
    $brs_custom_title = cs_get_option('brs_custom_title');    

?>
<section id="bz-breadcrumb" class="bz-breadcrumb-section">
    <div class="bz-breadcrumb-content position-relative text-capitalize text-center headline">
        <h2><?php if(!empty($brs_custom_title)){echo esc_html($brs_custom_title);}else{ the_title(); }?></h2>
        <?php if(!empty($pg_shape_1['url'])):?>
            <span class="bz-bread-side-shape position-absolute"><img src="<?php echo esc_url($pg_shape_1['url']);?>" alt="<?php echo esc_attr($pg_shape_1['alt']);?>"></span>
        <?php endif;?>
        <?php if(!empty($pg_shape_2['url'])):?>
            <span class="bz-bread-side-shape2 position-absolute"><img src="<?php echo esc_url($pg_shape_2['url']);?>" alt="<?php echo esc_attr($pg_shape_2['alt']);?>"></span>
        <?php endif;?>
    </div>
</section>
<?php 
}

/**
 * Blog Breadcrumb
 *
 * @return void
 */
function bizex_single_shop_breadcrumb(){ 
    $brss_custom_title = cs_get_option('brss_custom_title');    

?>
<section id="bz-breadcrumb" class="bz-breadcrumb-section">
    <div class="bz-breadcrumb-content position-relative text-capitalize text-center headline">
        <h2><?php if(!empty($brss_custom_title)){echo esc_html($brss_custom_title);}else{ the_title(); }?></h2>
        <?php if(!empty($pg_shape_1['url'])):?>
            <span class="bz-bread-side-shape position-absolute"><img src="<?php echo esc_url($pg_shape_1['url']);?>" alt="<?php echo esc_attr($pg_shape_1['alt']);?>"></span>
        <?php endif;?>
        <?php if(!empty($pg_shape_2['url'])):?>
            <span class="bz-bread-side-shape2 position-absolute"><img src="<?php echo esc_url($pg_shape_2['url']);?>" alt="<?php echo esc_attr($pg_shape_2['alt']);?>"></span>
        <?php endif;?>
    </div>
</section>
<?php 
}

/**
 * Blog Breadcrumb
 *
 * @return void
 */
function bizex_blog_breadcrumb(){ 
    $br_custom_title = cs_get_option('br_custom_title');    
    $br_shape = cs_get_option('br_shape');    
    $br_shape_tw = cs_get_option('br_shape_tw');    
?>
<section id="bz-breadcrumb" class="bz-breadcrumb-section">
    <div class="bz-breadcrumb-content position-relative text-capitalize text-center headline">
        <h2><?php if(!empty($br_custom_title)){echo esc_html($br_custom_title);}else{ esc_html_e( 'Blog', 'bizex' );}?></h2>
        <?php if(!empty($br_shape['url'])):?>
            <span class="bz-bread-side-shape position-absolute"><img src="<?php echo esc_url($br_shape['url']);?>" alt="<?php echo esc_attr($br_shape['alt']);?>"></span>
        <?php endif;?>
        <?php if(!empty($br_shape_tw['url'])):?>
            <span class="bz-bread-side-shape2 position-absolute"><img src="<?php echo esc_url($br_shape_tw['url']);?>" alt="<?php echo esc_attr($br_shape_tw['alt']);?>"></span>
        <?php endif;?>
    </div>
</section>
<?php 
}

/**
 * Blog Breadcrumb
 *
 * @return void
 */
function bizex_single_blog_breadcrumb(){ 
    $br_custom_title = cs_get_option('br_custom_title');    
    $br_shape = cs_get_option('br_shape');    
    $br_shape_tw = cs_get_option('br_shape_tw');    
?>
<section id="bz-breadcrumb" class="bz-breadcrumb-section single__breadcrumb">
    <div class="bz-breadcrumb-content position-relative text-capitalize text-center headline">
        <h2><?php the_title();?></h2>
        <?php if(!empty($br_shape['url'])):?>
            <span class="bz-bread-side-shape position-absolute"><img src="<?php echo esc_url($br_shape['url']);?>" alt="<?php echo esc_attr($br_shape['alt']);?>"></span>
        <?php endif;?>
        <?php if(!empty($br_shape_tw['url'])):?>
            <span class="bz-bread-side-shape2 position-absolute"><img src="<?php echo esc_url($br_shape_tw['url']);?>" alt="<?php echo esc_attr($br_shape_tw['alt']);?>"></span>
        <?php endif;?>
    </div>
</section>
<?php 
}

/**
 * Blog Breadcrumb
 *
 * @return void
 */
function bizex_archive_breadcrumb(){ 
    $br_custom_title = cs_get_option('br_custom_title');    
    $br_shape = cs_get_option('br_shape');    
    $br_shape_tw = cs_get_option('br_shape_tw');    
?>
<section id="bz-breadcrumb" class="bz-breadcrumb-section single__breadcrumb">
    <div class="bz-breadcrumb-content position-relative text-capitalize text-center headline">
        <h2>
        <?php
            the_archive_title();
            the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
        </h2>
        <?php if(!empty($br_shape['url'])):?>
            <span class="bz-bread-side-shape position-absolute"><img src="<?php echo esc_url($br_shape['url']);?>" alt="<?php echo esc_attr($br_shape['alt']);?>"></span>
        <?php endif;?>
        <?php if(!empty($br_shape_tw['url'])):?>
            <span class="bz-bread-side-shape2 position-absolute"><img src="<?php echo esc_url($br_shape_tw['url']);?>" alt="<?php echo esc_attr($br_shape_tw['alt']);?>"></span>
        <?php endif;?>
    </div>
</section>
<?php 
}

/**
 * Blog Breadcrumb
 *
 * @return void
 */
function bizex_search_breadcrumb(){ 
    $br_custom_title = cs_get_option('br_custom_title');    
    $br_shape = cs_get_option('br_shape');    
    $br_shape_tw = cs_get_option('br_shape_tw');    
?>
<section id="bz-breadcrumb" class="bz-breadcrumb-section single__breadcrumb">
    <div class="bz-breadcrumb-content position-relative text-capitalize text-center headline">
        <h2>
        <?php
        /* translators: %s: search query. */
         printf( esc_html__( 'Search Results for: %s', 'bizex' ), '<span>' . get_search_query() . '</span>' );
        ?>
        </h2>
        <?php if(!empty($br_shape['url'])):?>
            <span class="bz-bread-side-shape position-absolute"><img src="<?php echo esc_url($br_shape['url']);?>" alt="<?php echo esc_attr($br_shape['alt']);?>"></span>
        <?php endif;?>
        <?php if(!empty($br_shape_tw['url'])):?>
            <span class="bz-bread-side-shape2 position-absolute"><img src="<?php echo esc_url($br_shape_tw['url']);?>" alt="<?php echo esc_attr($br_shape_tw['alt']);?>"></span>
        <?php endif;?>
    </div>
</section>
<?php 
}

/**
 * Blog Breadcrumb
 *
 * @return void
 */
function bizex_404_breadcrumb(){ 
    $er_custom_title = cs_get_option('er_custom_title');    
    $br_shape = cs_get_option('br_shape');    
    $br_shape_tw = cs_get_option('br_shape_tw');    
?>
<section id="bz-breadcrumb" class="bz-breadcrumb-section">
    <div class="bz-breadcrumb-content position-relative text-capitalize text-center headline">
        <h2>
            <?php if(!empty($er_custom_title)){echo esc_html($er_custom_title);}else{esc_html_e( '404 Not Found', 'bizex' );}?>
        </h2>
        <?php if(!empty($br_shape['url'])):?>
            <span class="bz-bread-side-shape position-absolute"><img src="<?php echo esc_url($br_shape['url']);?>" alt="<?php echo esc_attr($br_shape['alt']);?>"></span>
        <?php endif;?>
        <?php if(!empty($br_shape_tw['url'])):?>
            <span class="bz-bread-side-shape2 position-absolute"><img src="<?php echo esc_url($br_shape_tw['url']);?>" alt="<?php echo esc_attr($br_shape_tw['alt']);?>"></span>
        <?php endif;?>
    </div>
</section>
<?php 
}

function error_404_content(){
    $error_code = cs_get_option('error_code');
    $error_title = cs_get_option('error_title');
    $error_info_title = cs_get_option('error_info_title');
    $error_button = cs_get_option('error_button');
    ?>
    <div class="error__info text-center">
        <h1><?php if(!empty($error_code)){echo esc_html($error_code);}else{esc_html_e( '404', 'bizex' );}?></h1>
        <h2><?php if(!empty($error_title)){echo esc_html($error_title);}else{esc_html_e( 'Oops... It looks like you ‘re lost !
', 'bizex' );}?></h2>
        <p><?php if(!empty($error_info_title)){echo esc_html($error_info_title);}else{esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'bizex' );}?></p>
        <div class="bz-btn text-uppercase">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if(!empty($error_button)){echo esc_html($error_button);}else{esc_html_e( '404', 'bizex' );}?> <i class="fas fa-long-arrow-right"></i></a>
        </div>
        
    </div>
<?php 
}