<section id="blog" class="blog paralax-mf bg-image">
	<div class="overlay-mf"></div>
	<div class="container">
		<div class="col title">
			<h2 class="text-center display-4 text-uppercase">
				<?php echo get_theme_mod('setg_blog_title', 'the latest blogs'); ?>
			</h2>
		</div>
		<div class="col text-center pb-3">

			<?php
			$blog = new WP_Query(array('pagename' => 'blog'));
			if ($blog->have_posts()) :
				$blog->the_post(); ?>
				<a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="link-all-post">
					<?php echo get_theme_mod('setg_blog_subtitle', 'All Blogs'); ?>
					<i class="fas fa-angle-double-right"></i>
				</a>
			<?php endif; ?>
		</div>
		<div class="posts-container">

			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 6,
				'no_found_rows' => true
			);

			$posts = new WP_Query($args);

			if ($posts->have_posts()) : ?>
				<div class="posts owl-carousel owl-theme">
					<?php while ($posts->have_posts()) : $posts->the_post(); ?>
						<div class="blog-item">
							<div class="card card-blog">
								<img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>">
								<div class="card-body">
									<div class="card-title"><?php the_title(); ?></div>
									<p class="card-text">
										<?php echo wp_trim_words(get_the_content(), 20); ?>
									</p>
									<a href="<?php echo get_post_permalink(get_the_ID()); ?>" class="btn btn-primary">Read More</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div><!-- .posts -->
			<?php endif; ?>
		</div><!-- .posts-container -->
	</div>
</section>