<section id="portfolio" class="paralax-mf bg-image">
	<div class="overlay-mf"></div>
	<div class="container">
		<div class="col title">
			<h2 class="text-center display-4 py-5 text-uppercase">
				<?php echo get_theme_mod('setg_portfolio_title', 'Portfolio'); ?>
			</h2>
		</div>
		<div class="row">
			<?php
			$portfolios = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => -1));
			if ($portfolios->have_posts()) :
				while ($portfolios->have_posts()) : $portfolios->the_post(); ?>
					<div class="col-lg-4 col-md-6 mb-3">
						<div class="card card-portfolio">
							<div class="card-header font-weight-bold text-center text-engraved text-uppercase">
								<?php the_title(); ?>
							</div>
							<div class="card-body">
								<div class="card-text">
									<?php echo wp_trim_words(get_the_content(), 20); ?>
								</div>
								<a href="<?php echo get_post_permalink(get_the_ID()); ?>" class="btn btn-primary">Read More
									<i class="fas fa-angle-double-right"></i>
								</a>
							</div>
						</div>
					</div>
			<?php endwhile;
			endif;
			?>
		</div><!-- .row -->
	</div>
</section>