<?php
/**
 * The template for displaying search results pages.
 *
 * @package yearn
 */

$yearn_content_columns = get_theme_mod( 'yearn-archives-sections' );

get_header(); ?>
	<div id="primary" class="<?php yearn_content_columns( $yearn_content_columns ); ?> content-area col">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title color-two"><?php printf( __( 'Search Results for: %s', 'yearn' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>
			<?php if(function_exists('wp_pagenavi')) : ?>
				<?php wp_pagenavi(); ?>
			<?php else : ?>
				<?php the_posts_navigation(); ?>
			<?php endif; ?>


		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( 'two_column' == $yearn_content_columns ) {
	get_sidebar();
}
?>
<?php get_footer(); ?>
