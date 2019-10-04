<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cogitantium
 */

get_header();
?>
<div class="post-img">
	<?php
	$img = get_theme_mod('setg_header_img', get_template_directory_uri() . '/img/antoine-barres.jpg');
	?>

	<div class="page-header section-dark" style="background-image: url('<?php echo $img; ?>')">
		<div class="filter"></div>
	</div>
</div>

<div class="container section-gap">
	<div class="row">
		<div id="primary" class="content-area col-lg-8 mt-5">
			<main id="main" class="site-main">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title p-3"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'cogitantium'); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'cogitantium'); ?></p>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>

<?php
get_footer();
