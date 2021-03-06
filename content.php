<?php
/**
 * @package yearn
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'itemized' ); ?>>

	<header class="entry-header-data">

		<h3 class="entry-title color-one">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>

		<?php yearn_entry_meta(); ?>

	</header>

	<div class="entry-excerpt">
		<?php if (has_post_thumbnail($post->ID)) {
			the_post_thumbnail('feature-image' );
		} ?>
		<?php the_excerpt(); ?>
	</div>

</article>