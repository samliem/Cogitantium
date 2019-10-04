<section id="education" class="paralax-mf bg-image">
	<div class="overlay-mf"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="heading">
					<h3 class="display-5 text-engraved font-weight-bold">
						<?php echo get_theme_mod('setg_edu_title', 'Education'); ?>
					</h3>
					<h6 class="text-black-50 font-lite-black font-weight-bold">
						<?php echo get_theme_mod('setg_edu_subtitle', 'Formal Education'); ?>
					</h6>
				</div>
			</div>
			<div class="col-md-7">
				<div class="edu-wrapper">
					<?php
					$args = array(
						'post_type' => 'education',
						'meta_key' => 'from_year',
						'orderby' => 'meta_value_num',
						'order' => 'ASC'
					);

					$education = new WP_Query($args);

					if ($education->have_posts()) :
						$i = 0;
						$edu_timeline = '';
						$edu_content = '';
						while ($education->have_posts()) :
							$education->the_post();
							$post_id = get_the_ID();

							/*---------------------------------------------
                                * Get Post Meta
                                ----------------------------------------------*/
							$sekolah = esc_attr(get_post_meta($post_id, 'sekolah', true));
							$city = esc_attr(get_post_meta($post_id, 'city', true));
							$from_year = esc_attr(get_post_meta($post_id, 'from_year', true));
							$to_year = esc_attr(get_post_meta($post_id, 'to_year', true));
							$jurusan = esc_attr(get_post_meta($post_id, 'jurusan', true));
							$fakultas = esc_attr(get_post_meta($post_id, 'fakultas', true));
							?>
							<div class="education mb-5">
								<h4 class="text-primary font-weight-bold"><?php the_title(); ?></h4>
								<h5 class="font-weight-bold mt-1"><?php echo "$sekolah - $city"; ?></h5>
								<p class="text-warning mt-2 font-weight-bold"><?php echo "$from_year - $to_year"; ?></p>

								<?php if (!empty($jurusan)) :
											echo "<p>Major : $jurusan</p>";
										endif;

										if (!empty($fakultas)) :
											echo "<p>Faculty : $fakultas</p>";
										endif;

										the_content();
										?>
							</div>
					<?php endwhile;
					endif; ?>
				</div>
			</div>
		</div>
	</div><!-- .container -->
</section>