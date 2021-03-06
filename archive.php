<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package yearn
 */

$yearn_content_columns = get_theme_mod( 'yearn-archives-sections' );

get_header(); ?>

	<section id="primary" class="<?php yearn_content_columns( $yearn_content_columns ); ?> content-area col">
		<main id="main" class="site-main" role="main">

			<?php do_action('yearn_primary_top', 'primary', 'top'); ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title color-two">
					<?php
						if ( is_category() ) :

							printf( __( 'Category: %s', 'yearn' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						elseif ( is_tag() ) :

							printf( __( 'Tag: %s', 'yearn' ), '<span>' . single_tag_title( '', false ) . '</span>' );

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'yearn' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'yearn' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'yearn' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'yearn' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'yearn' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'yearn' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'yearn' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'yearn' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'yearn' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'yearn' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'yearn' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'yearn' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'yearn' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'yearn' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'yearn' );

						else :
							_e( 'Archives', 'yearn' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php do_action('yearn_entry_content_top', 'entry_content', 'top'); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php do_action('yearn_entry_content_end', 'entry_content', 'end'); ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

			<?php do_action('yearn_primary_bottom', 'primary', 'bottom' ); ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
if ( 'two_column' == $yearn_content_columns ) {
	get_sidebar();
}
?>
<?php get_footer(); ?>
