<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package yearn
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'itemized' ); ?>>
	<header class="entry-header-data">

		<h3 class="entry-title color-one">
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		</h3>

			<?php  yearn_entry_meta(); ?>

	</header>

	<div class="entry-excerpt">
		<?php if (has_post_thumbnail($post->ID)) { ?>
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('feature-image' ); ?>
			</a>
			<?php
		} ?>
		<?php the_excerpt(); ?>
	</div>

</article>