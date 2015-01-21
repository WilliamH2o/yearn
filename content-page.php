<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package yearn
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail();
		} ?>

		<?php if ( ! is_front_page() || '1' == get_theme_mod( 'yearn-home_page_title' ) ) {
			the_title( '<h1 class="entry-title color-two">', '</h1>' );
		} ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'yearn' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php  edit_post_link( __( 'Edit', 'yearn' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
