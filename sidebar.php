<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package yearn
 */

if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area md-100 lg-25 col" role="complementary">
	<div class="row">
		<?php dynamic_sidebar( 'sidebar-right' ); ?>
	</div>
</div><!-- #secondary -->
