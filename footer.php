<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of div.site-content>div.row
 *
 * @package yearn
 */
?>
		<?php do_action( 'yearn_site_content_end', 'content', 'end' ); ?>
		</div><!-- .row -->
	<?php do_action( 'yearn_site_content_bottom', 'content', 'bottom' ); ?>
	</div><!-- .site-content -->
	<footer id="colophon" class="site-footer color-one" role="contentinfo">
		<?php do_action( 'yearn_colophon', 'colophon', '' ); ?>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
<?php do_action('yearn_wp_footer'); ?>
<script>



</body>
</html>
