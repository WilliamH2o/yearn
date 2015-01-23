<?php
/**
 * The sidebar containing the sidebar widget area.
 *
 * @package yearn
 */
?>

<div id="secondary" class="widget-area col" role="complementary">
	<?php do_action('yearn_secondary_top', 'secondary', 'top'); ?>
	<div class="row">
		<?php do_action('yearn_secondary_begin', 'secondary', 'begin'); ?>
		<?php dynamic_sidebar( 'sidebar' ); ?>
		<?php do_action('yearn_secondary_end', 'secondary', 'end'); ?>
	</div>
	<?php do_action('yearn_secondary_bottom', 'secondary', 'bottom'); ?>
</div><!-- #secondary -->
