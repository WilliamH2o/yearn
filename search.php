<?php
/**
 * The template for displaying search results pages.
 *
 * @package yearn
 */

get_header(); ?>
	<div id="primary" class="content-area col">
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
				<?php yearn_paging_nav(); ?>
			<?php endif; ?>


		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
