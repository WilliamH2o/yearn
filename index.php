<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package yearn
 */

$yearn_content_columns = get_theme_mod( 'yearn-archives-sections' );

get_header(); ?>

	<div id="primary" class="<?php yearn_content_columns( $yearn_content_columns ); ?> content-area col">
		<main id="main" class="site-main" role="main">

			<?php do_action('yearn_primary_top', 'primary', 'top'); ?>

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php
						$post = $wp_query->get_queried_object();
						$pagename = $post->post_title;
						echo $pagename ;
						?></h1>
				</header><!-- .page-header -->

				<?php do_action('yearn_entry_content_top', 'entry_content', 'top'); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php echo  get_post_format();
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
	</div><!-- #primary -->

<?php
if ( 'two_column' == $yearn_content_columns ) {
	get_sidebar();
}
?>
<?php get_footer(); ?>
