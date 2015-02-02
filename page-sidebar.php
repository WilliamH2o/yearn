<?php
/**
 * Template Name: Sidebar
 *
 * Displays #Secondary
 *
 * @package yearn
 */

get_header(); ?>
	<div id="primary" class="content-area col">
		<main id="main" class="site-main" role="main">

			<?php do_action('yearn_primary_top', 'primary', 'top'); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( ( comments_open() || '0' != get_comments_number() ) && '0' == get_theme_mod( 'yearn-pages-comments' ) ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

			<?php do_action('yearn_primary_bottom', 'primary', 'bottom' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>
