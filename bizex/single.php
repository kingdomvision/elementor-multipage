<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bizex
 */

get_header();
$bizexPostClass = '';
if(is_active_sidebar('sidebar-1')){
	$bizexPostClass = 'col-lg-8';
}else{
	$bizexPostClass = 'col-lg-10 offset-lg-1';
}
bizex_single_blog_breadcrumb()
?>
<section id="bz-blog-details" class="bz-blog-details-section">
	<div class="container">
		<div class="blog-details-content-area">
			<div class="row">
				<div class="<?php echo esc_attr($bizexPostClass);?>">
					<div class="blog-details-content">
						<?php bizex_single_post_loop();?>
					</div>
				</div>
				<?php get_sidebar();?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
