<?php 
if ( is_front_page() && get_field('display_title_on_home_page', 'options' ) == 'Yes' ) {  ?>
	<h1 class="entry-title"><?php the_title(); ?></h1>


<?php } elseif (is_category()) { ?>
	<h1 class="archive_title">
		<span><?php echo "Articles Categorized:"; ?></span> <?php single_cat_title(); ?>
	</h1>

<?php } elseif (is_tag()) { ?> 
	<h1 class="archive_title">
		<span><?php echo "Articles Tagged:"; ?></span> <?php single_tag_title(); ?>
	</h1>

<?php } elseif (is_author()) { ?>
	<h1 class="archive_title">
		<span><?php echo "Articles By:"; ?></span> <?php get_the_author_meta('display_name'); ?>
	</h1>

<?php } elseif (is_day()) { ?>
	<h1 class="archive_title">
		<span><?php echo "Daily Archives:"; ?></span> <?php the_time('l, F j, Y'); ?>
	</h1>

<?php } elseif (is_month()) { ?>
	<h1 class="archive_title">
		<span><?php echo "Monthly Archives:"; ?></span> <?php the_time('F Y'); ?>
	</h1>
	
<?php } elseif (is_year()) { ?>
	<h1 class="archive_title">
		<span><?php echo "Yearly Archives:"; ?></span> <?php the_time('Y'); ?>
	</h1>
<?php } elseif( !is_front_page() ) { ?>
	<h1 class="entry-title"> <?php the_title(); ?></h1>	
<?php } ?>

	