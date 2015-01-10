<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the div#content and div.row and all content after
 *
 * @package yearn
 */
?>
		</div><!-- .row -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer color-one" role="contentinfo">
		<div class="row">
		
		<?php $footer_add_class = yearn_footer_width(); ?>
		<?php if ( is_active_sidebar( 'footer-first' ) ) { ?>
			<div class="footer-first <?php echo $footer_add_class; ?> col">
				<?php dynamic_sidebar( 'footer-first' ); ?>
			</div>
		<?php } ?>
		
		<?php if ( is_active_sidebar( 'footer-second' ) ) { ?>
			<div class="footer-second <?php echo $footer_add_class; ?> col">
				<?php dynamic_sidebar( 'footer-second' ); ?>
			</div>
		<?php } ?>
		
		<?php if ( is_active_sidebar( 'footer-third' ) ) { ?>
			<div class="footer-third <?php echo $footer_add_class; ?> col">
				<?php dynamic_sidebar( 'footer-third' ); ?>
			</div>
		<?php } ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
	jQuery(document).ready(function($) {
		var sf = $( 'ul.menu' );
		sf.superfish( {
			delay:		500,
			animation:   {opacity:'show',height:'show'},
			speed:		'fast'
		});
	});
</script>
</body>
</html>
