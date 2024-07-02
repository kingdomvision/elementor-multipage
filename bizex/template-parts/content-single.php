<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bizex
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-details-text-img-area pera-content">
        <div class="bz-blog-item">
        <div class="blog-img position-relative">
            <?php if(has_post_thumbnail()){?>
                <?php the_post_thumbnail( 'bizex-img-size-5' )?>
            <?php }?>
            <div class="bz-blog-author d-flex align-items-center position-absolute">
                <?php bizex_main_author_avatars(28); ?>
                <span class="text-uppercase"><?php esc_html_e('BY:', 'bizex');?> <a href="#"> <?php the_author()?></a></span>
            </div>
        </div>
        <div class="blog-meta-text headline pera-content">
            <div class="blog-meta">
                <a href="#"><i class="fal fa-calendar-alt"></i> <?php echo date(get_option('date_format')); ?></a>
                <a href="#"><i class="fas fa-comments"></i> <?php esc_html_e( 'Comments', 'bizex' )?> (<?php echo esc_attr(get_comments_number());?>)</a>
            </div>
        </div>
    </div>
    <div class="blog-details-text">
        <div class="entry-content">
            <?php
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bizex' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post( get_the_title() )
                    )
                );

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bizex' ),
                        'after'  => '</div>',
                    )
                );
            ?>
        </div> 
    </div>
</div>
<div class="bz-blog-share-tag d-flex justify-content-between ul-li align-items-center">
    <div class="blog-hash-tag">
        <?php bizex_entry_footer();?>
    </div>
    <?php if(function_exists('bizex_post_share')):?>
    <div class="blog-share d-flex align-items-center">
        <?php bizex_post_share();?>
    </div>
    <?php endif;?>
</div>
<?php 
    if(function_exists('bizex_authore_info')){
        bizex_authore_info();
    }
?>
</article><!-- #post-<?php the_ID(); ?> -->

