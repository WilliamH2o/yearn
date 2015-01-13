<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package yearn
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 *  @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'yearn' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( ' Older', 'yearn' ) ); ?>


			</div>

			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer ', 'yearn' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'yearn' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );

				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'yearn_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
 

function yearn_entry_meta() {
	$time_string = '<time class="published updated" datetime="%1$s">%2$s</time>';
	
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	if ( is_single() ) {
		$posted_on = sprintf(
			'<span class="entry-date meta col" title=" article date"> ' . $time_string . ' </span>'
		);
	} else {
		$posted_on = sprintf(
			'<span class="entry-date meta col" title=" article date"><a href="' . get_the_permalink() . '" class=" color-one " >' . $time_string . ' </span></a>'
		);
	}


	
	$meta_text = $posted_on;


		$byline = sprintf(
		'<span class="author vcard meta col" title=" article author "><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> ' . esc_html( get_the_author() ) . '</a> </span>'
	);
	
	$meta_text .= $byline;
	
	if ( yearn_categorized_blog() && get_post_type() != 'page' ) {
	// This blog has more than 1 category

		$categories_list = get_the_category_list( __( ', ', 'yearn' ) );

		$categories_list_text =  '<span class="entry-category meta col" title=" article categories "> ' . yearn_limit_taxonomies( $categories_list ) . '</span> ';

		$meta_text .= $categories_list_text;

	}

	$tag_list = get_the_tag_list( ' ', __( ', ', 'yearn' ), ' ' );

	// This blog has tags 
	if ( $tag_list != '' ) {

		$tag_list_text =  '<span class="entry-tags meta col" title=" article tags "> ' . yearn_limit_taxonomies( $tag_list ) . '</span>';

		$meta_text .= $tag_list_text;

	}
	
	echo $meta_text;
}
endif;

/**
 * Returns 1 taxonomy with " +# " of taxonomies
 *
 * used in yearn_entry_meta()
 */
function yearn_limit_taxonomies( $tax_list ) {

	if ( is_single() || is_page() ) {
		return $tax_list;
	}

	$tax_count = substr_count( $tax_list, ",") ;

	if ( $tax_count > 1 ) {
		$tax_count = ' +' . $tax_count;
	} else {
		$tax_count = '';
	}
	return strtok($tax_list, ',') . $tax_count;

}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function yearn_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'yearn_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'yearn_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so yearn_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so yearn_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in yearn_categorized_blog.
 */
function yearn_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'yearn_categories' );
}
add_action( 'edit_category', 'yearn_category_transient_flusher' );
add_action( 'save_post',     'yearn_category_transient_flusher' );
