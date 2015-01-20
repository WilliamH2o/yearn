<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of div.site-content>div.row
 *
 * @package yearn
 */
?>
		<?php do_action( 'yearn_content_end' ); ?>

		</div><!-- .row -->
	</div><!-- .site-content -->
	<footer id="colophon" class="site-footer color-one" role="contentinfo">
		<?php do_action( 'yearn_footer_begin' ); ?>
		<?php do_action( 'yearn_footer' ); ?>
		<?php do_action( 'yearn_footer_end' ); ?>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
<script>



</body>
</html>
