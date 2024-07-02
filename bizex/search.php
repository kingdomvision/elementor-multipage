<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
bizex_search_breadcrumb();
?>
<section id="bz-blog-feed" class="bz-blog-feed-section">
	<div class="container">
		<div class="bz-blog-feed-content">
			<div class="row">
				<div class="<?php echo esc_attr($bizexPostClass);?>">
					<div class="bz-blog-feed-area">
						<?php bizex_search_loop();?>
					</div>
				</div>		
				<?php get_sidebar();?>			
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
