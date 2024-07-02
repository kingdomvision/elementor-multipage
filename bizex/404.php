<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bizex
 */

get_header();
bizex_404_breadcrumb();
?>

<section id="error-page-404" class="bz-blog-feed-section 404-error-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="bz-blog-feed-area">
					<?php error_404_content();?>
				</div>
			</div>				
		</div>
	</div>
</section>

<?php
get_footer();
