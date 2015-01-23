<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package yearn
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'yearn' ); ?></h1>
	</header><!-- .page-header -->

	<?php do_action('yearn_entry_content_top', 'entry_content', 'top'); ?>

	<div class="page-content">

		<?php do_action('yearn_entry_content_begin', 'entry_content', 'begin'); ?>

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'yearn' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'yearn' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'yearn' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>

		<?php do_action('yearn_entry_content_end', 'entry_content', 'end'); ?>

	</div><!-- .page-content -->

	<?php do_action('yearn_entry_content_bottom', 'entry_content', 'bottom'); ?>

</section><!-- .no-results -->
