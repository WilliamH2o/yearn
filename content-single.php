<?php
/**
 * @package yearn
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<h1 class="entry-title color-two">
			<?php if ( is_sticky() ) {
				echo '<span class="sticky-pin" aria-hidden="true" data-icon="&#xe605;"></span> ';
			} ?>
			<?php the_title(); ?>
		</h1>

		<?php yearn_entry_meta(); ?>

	</header><!-- .entry-header -->

	<?php do_action('yearn_entry_content_top', 'entry_content', 'top'); ?>

	<div class="entry-content">

		<?php do_action('yearn_entry_content_begin', 'entry_content', 'begin'); ?>

		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>

		<?php the_content(); ?>

		<?php do_action('yearn_entry_content_end', 'entry_content', 'end'); ?>

		<?php wp_link_pages( array(
				'before' => '<div class="page-links"><span class="screen-reader-text">' . __( 'Pages:', 'yearn' ) . '</span>',
				'after'  => '</div>',
			) ); ?>

	</div><!-- .entry-content -->

	<?php do_action('yearn_entry_content_bottom', 'entry_content', 'bottom'); ?>

	<?php if ( current_user_can('edit_post', get_the_ID() ) ) { ?>
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'yearn' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	<?php } ?>
</article><!-- #post-## -->
