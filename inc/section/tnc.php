<?php 
	$toc = get_theme_mod('toc_visibility', 'all');

	$filter_display = 'block';

	if( $toc !== 'all')
		$filter_display = 'none';

	if($toc == 'certificate') {
		$train_active = '';
		$cert_active = 'active';
	} else {
		$train_active = 'active';
		$cert_active = '';
	}

?>
<section id="tnc" class="py-5 paralax-mf bg-image">
	<div class="overlay-mf"></div>
	<div class=" container">
		<div class="row">
			<div class="col">
				<h2 class="text-center display-4 text-engraved">
					<?php echo get_theme_mod('setg_tnc_title', 'Trainings & Certificates'); ?>
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col text-center tnc-filter"  style="display: <?php echo $filter_display; ?>">
				<div class="btn-group mt-3">
					<button class="btn btn-primary btn-tnc active" data-target="training">Training</button>
					<button class="btn btn-primary btn-tnc" data-target="certificate">Certificate</button>
				</div>
			</div>
		</div>
		<div id="training" class="tnc-category <?php echo $train_active; ?> mt-4">
			<div class="row">
				<?php
				/**----------------------------------------------
				 * Get Training post type
                    ----------------------------------------------*/
				$args = array(
					'post_type' => 'training',
					'meta_key'  => 'year_training',
					'orderby' => 'meta_value_num',
					'order' => 'ASC'
				);
				$trainings = new WP_Query($args);

				if ($trainings->have_posts()) : $i = 0;
					while ($trainings->have_posts()) : $trainings->the_post();
						$post_id = get_the_ID();
						$year = get_post_meta($post_id, 'year_training', true);
						$url = get_post_permalink($post_id);

						if ($i > 2)
							$i = 0; // reset

						switch ($i) {
							case 0:
								$animate = 'fadeInLeft animated';
								break;
							case 1:
								$animate = 'fadeInDown animated';
								break;
							case 2:
								$animate = 'fadeInRight animated';
								break;
						} ?>

							<div class="col-lg-4 col-md-6 mb-3">
								<div class="card card-tnc <?php echo $animate; ?>">
									<div class="card-header display-5 text-center bg-warning text-dark font-weight-bold">
										<?php echo get_the_title(); ?>
									</div>
									<div class="card-body">
										<div class="card-text">
											<?php the_excerpt(); ?>
										</div>
									</div>
									<a href="<?php echo get_the_permalink(); ?>" class="read-more btn btn-outline-primary">
										<i class="fas fa-plus mr-2"></i>Read more
									</a>
								</div>
							</div>
					<?php $i++; 
						endwhile;
					endif; ?>
			</div>
		</div><!-- .tnc-category -->

		<div id="certificate" class="tnc-category <?php echo $cert_active;?> mt-4">
			<div class="row">
				<?php
				$args = array(
					'post_type' => 'certificate',
					'meta_key'  => 'year_certificate',
					'orderby' => 'meta_value_num',
					'order' => 'ASC'
				);

				$certificates = new WP_Query($args);

				if ($certificates->have_posts()) : $i = 0;
					while ($certificates->have_posts()) : $certificates->the_post();
						$post_id = get_the_ID();
						$year = get_post_meta($post_id, 'year_certificate', true);
						$url_thumbnail = get_the_post_thumbnail_url($post_id, 'full');

						if ($i > 2)
							$i = 0; // reset

						switch ($i) {
							case 0:
								$animate = 'fadeInLeft animated';
								break;
							case 1:
								$animate = 'fadeInDown animated';
								break;
							case 2:
								$animate = 'fadeInRight animated';
								break;
						} ?>

							<div class="col-lg-4 col-md-6 mb-3">
								<div class="card card-tnc <?php echo $animate; ?>">
									<div class="card-header display-5 text-center bg-warning text-dark font-weight-bold">
										<?php the_title(); ?>
									</div>
									<div class="card-body">
										<div class="card-text">
											<?php the_excerpt(); ?>
										</div>
									</div>
									<div class="card-footer">
										<a href="<?php echo $url_thumbnail; ?>" class="btn btn-primary" data-lightbox="<?php echo 'image-' . $post_id; ?>">
											See More<i class="fas fa-angle-double-right ml-2"></i>
										</a>
									</div>
								</div>
							</div>

					<?php $i++;
						endwhile;
					endif; ?>

			</div><!-- .row -->
		</div><!-- .tnc-category -->
	</div><!-- .container -->
</section>