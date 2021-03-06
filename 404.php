<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package yearn
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php do_action('yearn_primary_top', 'primary', 'top'); ?>

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'yearn' ); ?></h1>
				</header><!-- .page-header -->

				<?php do_action('yearn_entry_content_top', 'entry_content', 'top'); ?>

				<div class="page-content">

					<?php do_action('yearn_entry_content_begin', 'entry_content', 'begin'); ?>

					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'yearn' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( yearn_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php _e( 'Most Used Categories', 'yearn' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>

					<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'yearn' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

					<?php do_action('yearn_entry_content_end', 'entry_content', 'end'); ?>

				</div><!-- .page-content -->

				<?php do_action('yearn_entry_content_bottom', 'entry_content', 'bottom'); ?>

			</section><!-- .error-404 -->

			<?php do_action('yearn_primary_bottom', 'primary', 'bottom' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
