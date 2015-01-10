<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package yearn
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header-data">
		<h3 class="entry-title color-one"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		<div class="entry-meta row">
			<?php  yearn_entry_meta(); ?>
		</div><!-- .entry-meta -->
	</header>

	<div class="entry-excerpt">
		<?php if (has_post_thumbnail($post->ID)) { ?>
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('feature-sidebar' ); ?>
			</a>
			<?php // yearn_the_featured_image();
		} ?>
		<?php the_excerpt(); ?>
	</div>

</article>