<?php

/**
 * The template for displaying the footer for homepage
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cogitantium
 */

?>

<!-- Contact -->
<section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route">
	<div class="overlay-mf"></div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="contact-mf">
					<div class="box-shadow-full">
						<div class="row">
							<div class="col-md-6">
								<div class="title-box-2">
									<h5 class="contact-title title-left contact-page">
										<?php echo get_theme_mod('setg_contact_title', 'Mail Me'); ?>
									</h5>
								</div>
								<?php echo do_shortcode('[contact-form-7 id="211" title="Contact form 1"]'); ?>
							</div>
							<div class="col-md-6 contact-page">
								<?php
								global $profile;
								$address = !empty($profile->addr2) ? $profile->addr1 . ', ' . $profile->addr2 : $profile->addr1;
								$contact = new WP_Query(array('pagename' => 'contact'));
								if ($contact->have_posts()) : $contact->the_post(); ?>
									<div class="title-box-2 pt-4 pt-md-0">
										<h5 class="title-left">
											<?php the_title(); ?>
										</h5>
									</div>
									<div class="more-info">
										<p class="lead">
											<?php the_content(); ?>
										</p>
										<ul class="list-ico">
											<?php if (!empty($address)) : ?>
												<li><i class="fas fa-map-marker-alt mr-2"></i><?php echo $address; ?></li>
											<?php endif;
												if (!empty($profile->phone)) : ?>
												<li><i class="fas fa-phone-square mr-2"></i><?php echo $profile->phone; ?></li>
											<?php endif;
												if (!empty($profile->wa)) : ?>
												<li><i class="fab fa-whatsapp-square mr-2"></i><?php echo $profile->wa; ?>
												<?php endif;
													if (!empty($profile->email)) : ?>
												<li><i class="fas fa-at mr-2"></i><?php echo $profile->email; ?></li>
											<?php endif; ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div><!-- .main -->
</div><!-- #content -->

<footer class="py-3 text-center">
	<div class="copyright">
		Copyright &copy;2019
		<a href="<?php echo esc_url(home_url('/')); ?>">
			<?php bloginfo('name'); ?>
		</a>
	</div>
</footer>

</div><!-- #page -->

<a href="#" class="back-to-top">
	<i class="fa fa-chevron-up"></i>
</a>
<div id="preloader"></div>

<?php wp_footer(); ?>

</body>

</html>