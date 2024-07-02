<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
bizex_blog_breadcrumb();
?>
<section id="bz-blog-feed" class="bz-blog-feed-section">
	<div class="container">
		<div class="bz-blog-feed-content">
			<div class="row">
				<div class="<?php echo esc_attr($bizexPostClass);?>">
					<div class="bz-blog-feed-area">
						<?php bizex_post_loop();?>
					</div>
				</div>		
				<?php get_sidebar();?>			
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
