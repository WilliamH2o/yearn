<?php 
/**
 *
 * Display Posts Content 
 * 
 *
 */
?>
<section class="posts">
	

	<?php 
	// $i count to create div.row container for columns
	$i = 0;
	
	$args = array( 
		'numberposts' => get_field('recent_posts_count', 'options'), 
	);
	
	//$postslist = get_posts( $args );
	//foreach ($postslist as $post) : setup_postdata($post); 
	
	if ( have_posts() ) {
		while ( have_posts() ) { 
			the_post();
	

		$i += 1;
		if ( $i == 1 ) {
			echo '<div class="row">';
			$class_alpha_omega = 'alpha';
		}
		if ( $i == 2 ) {
			$class_alpha_omega = '';
		}
		
	?>
	<article class="recent-post <?php the_field('recent_post_div_class', 'options' );  echo ' ' . $class_alpha_omega ?>">
		<header class="entry-header-data">
		
			
			<?php 
			
			if ( get_field('display_post_thumbnail', 'options') == 'Yes' ) { 
	
				if ( has_post_thumbnail( $post->ID )  ) { 
					
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hero-medium' );
					
					$alt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true); 
					
			// linked featured image ?>			
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-thumbnail <?php the_field('post_thumbnail_class', 'options')?>">
				<img src="<?php echo $image[0]; ?>" alt="<?php if(count($alt)) echo $alt; ?>" class="post-image" />
			</a>
		
				<?php } // if has_post_thumbnail
			} // if has_post_thumbnail
			
			// linked title?>
			<h3 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
			
			<?php unc_the_excerpt_metabox() ?>
							
		</header>
					
				
					
		<?php if ( get_field('display_post_excerpt', 'options') == 'Yes' ) { ?>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
			<?php
		} ?>	
	</article>

	<?php
		if ($i == 2 ){
			echo '</div>';
			$i = 0;
			}
	?>
	<?php 	
		} // while
	} // if have_posts ?>

</section>