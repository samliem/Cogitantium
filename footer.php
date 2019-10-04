<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cogitantium
 */

?>

	</div><!-- #content -->

	<footer class="py-3 text-center">
        <div class="copyright">
			Copyright &copy;2019 
			<a href="<?php echo esc_url( home_url('/') ); ?>">
				<?php bloginfo('name'); ?>
			</a>
        </div>
	</footer>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
