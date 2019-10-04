<section id="experience" class="exp home-section">
	<div class="title">
		<h2 class="text-center display-4 text-uppercase">
			<?php echo get_theme_mod('setg_exp_title', 'experience'); ?>
		</h2>
	</div>

	<?php
	$args = array(
		'post_type' => 'experience',
		'meta_key' => 'from_year',
		'orderby' => 'meta_value_num',
		'order' => 'ASC'
	);

	$experiences = new WP_Query($args);

	if ($experiences->have_posts()) : ?>

		<table class="table-responsive-md">
			<tr class="table-header">
				<th>
					<p>Title</p>
				</th>
				<th>
					<p>Company</p>
				</th>
				<th>
					<p>From/to</p>
				</th>
				<th>
					<p>job Desc</p>
				</th>
			</tr>

			<?php
				while ($experiences->have_posts()) : $experiences->the_post();
					$post_id = get_the_ID();
					$company = get_post_meta($post_id, 'company', true);
					$city = get_post_meta($post_id, 'city', true);
					$city = empty($city) ? '' : " - $city";
					$year = get_post_meta($post_id, 'from_year', true);
					$duration = get_post_meta($post_id, 'duration', true); ?>

				<tr>
					<td>
						<p><?php the_title(); ?></p>
					</td>
					<td>
						<p><?php echo "$company $city"; ?></p>
					</td>
					<td>
						<p><?php echo "$year - $duration"; ?></p>
					</td>
					<td><?php the_content(); ?></td>
				</tr>
			<?php endwhile; ?>
		</table>
	<?php endif; ?>
</section>