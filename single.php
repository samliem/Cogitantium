<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cogitantium
 */

get_header();
?>

	<div class="post-img">
		<?php $template_dir = get_template_directory_uri();
		$post_type = get_post_type(get_the_ID());
		if( $post_type == 'post' ) {
			$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
			if (empty($img)) {
				$img = get_theme_mod('setg_header_img', $template_dir . '/img/antoine-barres.jpg');
			} 
		} else {
			$img = get_theme_mod('setg_header_img', $template_dir . '/img/antoine-barres.jpg');
		} 
		?>
		
		<div class="page-header section-dark" style="background-image: url('<?php echo $img; ?>')">
			<div class="filter"></div>
			<div class="content-center">
				<div class="container">
					<div class="title-brand">
						<h1 class="presentation-title text-uppercase"><?php echo the_title(); ?></h1>
					</div>
					<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
						<?php
						if (function_exists('bcn_display')) {
							bcn_display();
						} ?>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="container section-gap">
		<div class="row">
		
			<div id="primary" class="content-area col-lg-8 mt-5">
				<main id="main" class="site-main">

					<?php if (have_posts()) :

						while (have_posts()) :
							the_post();

							get_template_part('template-parts/content', get_post_type());


						endwhile; // End of the loop.

					endif;
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!-- .row -->
	</div><!-- .container -->

<?php
get_footer();
