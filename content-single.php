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

		<div class="entry-meta row">
			<?php yearn_entry_meta(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>

		<?php the_content(); ?>
		<?php wp_link_pages( array(
				'before' => '<div class="page-links"><span class="screen-reader-text">' . __( 'Pages:', 'yearn' ) . '</span>',
				'after'  => '</div>',
			) ); ?>

	</div><!-- .entry-content -->
	<?php if ( current_user_can('edit_post', get_the_ID() ) ) { ?>
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'yearn' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	<?php } ?>
</article><!-- #post-## -->
