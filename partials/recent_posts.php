<?php 
/**
 *
 * Display Recent Posts Content 
 * 
 *
 */
?>
<section class="recent_posts">
	<h2>Recent Posts</h2>

	<?php 
	// $i count to create div.row container for columns
	$i = 0;
	
	$args = array( 
		'numberposts' => 4, 
	);
	
	$postslist = get_posts( $args );
	foreach ($postslist as $post) : setup_postdata($post); ?>
	
	<?php
		$i += 1;
		if ( $i == 1 ) {
			echo '<div class="row">';
			$class_alpha_omega = 'alpha';
		}
		if ( $i == 2 ) {
			$class_alpha_omega = '';
		}
		
	?>
	<article class="recent-post col <?php echo $class_alpha_omega ?>">
		<header class="entry-header-data">
		
			
			<?php if ( has_post_thumbnail( $post->ID )  ) { 
				
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hero-medium' );
				
				$alt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true); 
					
			// linked featured image ?>			
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-thumbnail">
				<img src="<?php echo $image[0]; ?>" alt="<?php if(count($alt)) echo $alt; ?>" class="post-image" />
			</a>
		
			<?php } // if has_post_thumbnail
			
			
			// linked title?>
			<h1 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
			
			<div class="entry-meta clearfix">
				
			<?php if ( !is_front_page() ) { ?>
				<span class="entry-date"><i class="fa fa-fw">&#xf017;</i>
				<?php echo the_time('F jS, Y'); ?>
				</span>
			<?php } ?>
			
			<?php if ( !is_front_page() ) { ?>							
				<span class="entry-author"><i class="fa fa-fw">&#xf007;</i>
				<?php the_author_link(); ?>
				</span>
			<?php } ?>
			
			
				<span class="entry-category"><i class="fa fa-fw">&#xf07c;</i>
				<?php the_category(', '); ?>
				</span>

			<?php if ( !is_front_page() ) { ?>	
				<?php the_tags('<span class="entry-tags"><i class="fa fa-fw">&#xf02c;</i> ', ',', '</span>'); ?>
			<?php } ?>
			
			<?php if ( !is_front_page() ) { ?>	
				<span class="entry-comments"><i class="fa fa-fw">&#xf086;</i>
				<?php echo get_comments_number(); ?>
				</span>
			<?php } ?>
			
			</div>
							
		</header>
					
				
					
		
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
		
	</article>

	<?php
		if ($i == 2 ){
			echo '</div>';
			$i = 0;
			}
	?>
	<?php endforeach; ?>

</section>