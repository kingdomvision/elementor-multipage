<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Bizex
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bizex_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'bizex_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bizex_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'bizex_pingback_header' );

/**
 * Authore Avater
 */
function bizex_main_author_avatars($size) {
    echo get_avatar(get_the_author_meta('email'), $size);
}
  
add_action('genesis_entry_header', 'bizex_post_author_avatars');


/**
 * bizex Single Post Nav
 */
function bizex_single_post_pagination(){ 
    $bizex_prev_post = get_previous_post();
    $bizex_next_post = get_next_post();
?>
<div class="bz-project-next-prev-btn d-flex text-uppercase justify-content-between">
	<a href="<?php echo esc_url(get_the_permalink($bizex_prev_post));?>"><i class="far fa-long-arrow-left"></i> <?php esc_html_e('Previous Post', 'bizex');?></a>
	<a href="<?php echo esc_url(get_the_permalink($bizex_next_post));?>"><?php esc_html_e('Next Post', 'bizex');?> <i class="far fa-long-arrow-right"></i></a>
</div>
<?php 
}



/**
 * Comment Message Box
 */
function bizex_comment_reform( $arg ) {

	$arg['title_reply']   = esc_html__( 'Leave a comment', 'bizex' );
	$arg['comment_field'] = '<div class="row"><div class="col-md-12"><div class="input-field mb-30"><textarea id="comment" class="form_control" name="comment" cols="77" rows="3" placeholder="' . esc_attr__( "Comment", "bizex" ) . '" aria-required="true"></textarea></div></div></div>';

	return $arg;

}
add_filter( 'comment_form_defaults', 'bizex_comment_reform' );


/**
 * Comment Form Field
 */
function bizex_modify_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );

	$fields['author'] = '<div class="row"><div class="col-md-4"><div class="input-field mb-30"><input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_attr__( "Name", "bizex" ) . '" size="22" tabindex="1"' . ( $req ? 'aria-required="true"' : '' ) . ' class="form_control" /></div></div>';

	$fields['email'] = '<div class="col-md-4"><div class="input-field mb-30"><input type="email" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_attr__( "Email", "bizex" ) . '" size="22" tabindex="2"' . ( $req ? 'aria-required="true"' : '' ) . ' class="form_control"  /></div></div>';

	$fields['url'] = '<div class="col-md-4"><div class="input-field mb-30"><input type="url" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( "Website", "bizex" ) . '" size="22" tabindex="2"' . ( $req ? 'aria-required="false"' : '' ) . ' class="form_control"  /></div></div></div>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'bizex_modify_comment_form_fields' );

// comment Move Field
function bizex_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'bizex_move_comment_field_to_bottom' );


/**
 * Comment List Modification
 */

function bizex_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;?>

	<li  <?php comment_class('comment');?> id="comment-<?php comment_ID()?>">
        <div class="comment_element d-flex position-relative">
            <?php if ( get_avatar( $comment ) ) {?>
                <div class="comment_img">
                    <?php echo get_avatar( $comment, 90 ); ?>
                </div>
            <?php }?>

            <div class="comment_content pera-content">
                <h4 class="name"><?php comment_author_link()?></h4>
				<span class="comment-date"><?php echo esc_html(get_the_time( get_option('date_format')));?></span>
                <?php if ( $comment->comment_approved == '0' ): ?>
                    <p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'bizex' );?></em></p>
                <?php endif;?>
                <?php comment_text();?>
                <div class="reply-btn position-absolute">
                	<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );?>
                </div>
            </div>
        </div>
	</li>


<?php
}

/**
 * Search Widget
 */
function bizex_search_widgets( $form ) {
    $form = '<div class="search-widget"><form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <input class="form_control" placeholder="' .esc_attr__( 'Type Keywords', 'bizex' ) . '" type="text"  value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit"><i class="far fa-search"></i></button>
    </form></div>';

    return $form;
}
add_filter( 'get_search_form', 'bizex_search_widgets', 100 );

/**
 * post Pagination
 */
function bizex_pagination() {
    global $wp_query;
    $links = paginate_links( array(
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
		'type'      => 'list',
		'mid_size'  => 3,
		'prev_text' => '<i class="far fa-long-arrow-left"></i>',
		'next_text' => '<i class="far fa-long-arrow-right"></i>',
    ) );

    echo wp_kses_post( $links );
}


function bizex_product_count( $cols ) {
	$product_count = cs_get_option('product_count');
  $cols = !empty($product_count) ? $product_count : '12';
  return $cols;
}
add_filter( 'loop_shop_per_page', 'bizex_product_count', 20 );