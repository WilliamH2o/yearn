<?php
/**
 * The template for displaying all single posts.
 *
 * @package yearn
 */

$yearn_content_columns = get_theme_mod( 'yearn-posts-sections' );

get_header(); ?>

	<div id="primary" class="<?php yearn_content_columns( $yearn_content_columns ); ?> content-area col">
		<main id="main" class="site-main" role="main">

			<?php do_action('yearn_primary_top', 'primary', 'top' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

			<?php do_action('yearn_primary_bottom', 'primary', 'bottom' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if ( 'two_column' == $yearn_content_columns ) {
	get_sidebar();
}
?>
<?php get_footer(); ?>