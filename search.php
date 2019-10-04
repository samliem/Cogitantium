<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Phasellus
 */

get_header();
?>

<div class="post-img">
	<?php
	$img = get_theme_mod('setg_header_img', get_template_directory_uri() . '/img/antoine-barres.jpg');
	?>

	<div class="page-header section-dark" style="background-image: url('<?php echo $img; ?>')">
		<div class="filter"></div>
		<div class="content-center">
			<div class="container">
				<h1 class="archive-title">
					<?php echo 'Search Results for "' . get_search_query() . '"';?>
				</h1>
			</div>
		</div>
	</div>
</div>

<div class="container section-gap">
	<div class="row">
		<div id="primary" class="content-area col-lg-8 mt-5">
			<main id="main" class="site-main">
				<?php

				while (have_posts()) :
					the_post();

					if( get_post_type(get_the_ID() ) != 'page' )
						get_template_part('template-parts/content', 'archive');
					
				endwhile; // End of the loop.

				?>

				<nav class="blog-pagination justify-content-center d-flex">
					<div class="pagination"><?php pagination('»', '«'); ?></div>
				</nav>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .row -->
</div><!-- .container -->

<?php
get_footer();
