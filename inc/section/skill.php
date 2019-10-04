<section id="skill" class="skill">
	<div class="title">
		<h2 class="text-center display-4 text-uppercase">
			<?php echo get_theme_mod('setg_skill_title', 'skill');?>
		</h2>
	</div>

	<?php
	$skill = new WP_Query(array('post_type' => 'skill'));
	if ($skill->have_posts()) :
		while ($skill->have_posts()) :
			$skill->the_post();
			$skill_level = get_post_meta(get_the_ID(), 'skill_level', true);
			if (empty($skill_level))
				$skill_level = 0;
			?>
			<div class="progress-item">
				<span class="progress-title"><?php the_title(); ?></span>

				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $skill_level; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo "$skill_level%"; ?>">
						<span class="progress-percent">
							<?php echo "$skill_level%"; ?>
						</span>
					</div>
				</div><!-- .progress -->
			</div><!-- .skill-progress -->
	<?php endwhile;
	endif; ?>

</section>