<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bizex
 */
$blog_btn_text = cs_get_option('blog_btn_text');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bz-blog-item'); ?>>
	<?php if(has_post_thumbnail()){?>
	<div class="blog-img position-relative">
			<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'bizex-img-size-5' )?></a>
		
		<div class="bz-blog-author d-flex align-items-center position-absolute">
			<?php bizex_main_author_avatars(28); ?>
			<span class="text-uppercase"><?php esc_html_e('BY:', 'bizex');?> <a href="#"> <?php the_author()?></a></span>
		</div>
	</div>
	<?php }?>
	<div class="blog-meta-text headline pera-content">
		<div class="blog-meta">
			<a href="#"><i class="fal fa-calendar-alt"></i>  <?php echo date(get_option('date_format')); ?></a>
			<a href="#"><i class="fas fa-comments"></i> <?php esc_html_e( 'Comments', 'bizex' )?> (<?php echo esc_attr(get_comments_number());?>)</a>
		</div>
		<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		<p><?php the_excerpt();?></p>
		<a class="read_more" href="<?php the_permalink();?>"><?php if(!empty($blog_btn_text)){echo esc_html($blog_btn_text);}else{esc_html_e( 'Read More', 'bizex' );}?><i class="fal fa-long-arrow-right"></i></a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
