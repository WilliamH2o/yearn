<?php
/**
 * @package yearn
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header-data">
		<h3 class="entry-title color-one">
			<?php // if ( is_sticky() ) {
				// echo '<span class="sticky-pin" aria-hidden="true" data-icon="&#xe605;"></span> ';
			// } ?>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>

		<div class="entry-meta row">
			<?php  yearn_entry_meta(); ?>
		</div><!-- .entry-meta -->

	</header>

	<div class="entry-excerpt">
		<?php if (has_post_thumbnail($post->ID)) {
			the_post_thumbnail('feature-sidebar' );
			// yearn_the_featured_image();
		} ?>
		<?php the_excerpt(); ?>
	</div>

</article>