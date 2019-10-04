<?php

/**
 * cogitantium Theme Customizer
 *
 * @package cogitantium
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/*----------------------------------------------
## Register Custom Controls & Selective Refresh
-----------------------------------------------*/
include('customizer-register.php');
include('customizer-partial-refresh.php');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cogitantium_customize_preview_js()
{
	wp_enqueue_script('cogitantium-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'cogitantium_customize_preview_js');

function cogitantium_controls_enqueue_scripts()
{
	if (!is_customize_preview()) {
		return;
	}

	$handle = 'tnc-controls';
	$src = get_template_directory_uri() . '/js/customizer-custom-control.js';
	$deps = array('customize-controls');
	$ver = false;
	wp_enqueue_script($handle, $src, $deps, $ver);
}
add_action('customize_controls_enqueue_scripts', 'cogitantium_controls_enqueue_scripts');

function tnc_enqueue_scripts()
{
	if (!is_customize_preview()) {
		return;
	}

	global $tnc_options;

	$handle = 'cogitantium-customize-preview';
	$src = get_template_directory_uri() . '/js/customize-preview.js';
	$deps = array('customize-selective-refresh');
	wp_enqueue_script($handle, $src, $deps);

	// Export the choices to JS.
	wp_add_inline_script(
		$handle,
		sprintf(
			'wp.customize.selectiveRefresh.partialConstructor[ %s ].prototype.choices = %s;',
			wp_json_encode('toc'),
			wp_json_encode(array_keys($tnc_options))
		)
	);
}
add_action('wp_enqueue_scripts', 'tnc_enqueue_scripts');

add_action('wp_head', 'cogitantium_customizer_css');
function cogitantium_customizer_css()
{

	/*----------------------------------
	* WEBSITE theme
	----------------------------------*/
	$selected_theme = get_theme_mod('setg_theme', 'cyan');
	switch ($selected_theme) {
		case 'green':
			$overlay_color = '#28a745';
			break;
		case 'red':
			$overlay_color = '#be3131';
			break;
		case 'purple':
			$overlay_color = '#8400ff';
			break;
		case 'orange':
			$overlay_color = '#f0642d';
			break;
		default:
			$overlay_color = '#17a2b8';
	}

	$css_url = get_template_directory_uri() . "/css/color-theme/$selected_theme.css";

	?>

			<!-- THEME Style -->
			<link href="<?php echo $css_url; ?>" rel="stylesheet">
			<style id="hdr-bg-img">
				<?php
					echo set_bg_img('.page-header', 'setg_bg_img', get_template_directory_uri() . '/img/antoine-barres.jpg');
					?>
			</style>

		<?php if (is_home()) : ?>

			<!--------------------------------------------- 
			#Visibility
			---------------------------------------------->
				<style id="skill-visibility">
					<?php echo set_visibility('.skill-section', 'setg_skill_visibility'); ?>
				</style>
				<style id="exp-visibility">
					<?php echo set_visibility('.exp-section', 'setg_exp_visibility'); ?>
				</style>
				<style id="edu-visibility">
					<?php echo set_visibility('.edu-section', 'setg_edu_visibility'); ?>
				</style>
				<style id="portfolio-visibility">
					<?php echo set_visibility('.portfolio-section', 'setg_portfolio_visibility'); ?>
				</style>
				<style id="blog-visibility">
					<?php echo set_visibility('.blog-section', 'setg_blog_visibility'); ?>
				</style>
				<style id="toc_visibility">
					<?php echo set_toc_visibility('.tnc-filter', 'setg_train_visibility', 'setg_cert_visibility'); ?>
				</style>
				<style id="tnc-visibility">
					<?php echo set_visibility('.tnc-section', 'setg_tnc_visibility'); ?>
				</style>

			<!--------------------------------------------- 
			#Bg Image
			---------------------------------------------->
				<style id="edu-bg-img">
					<?php echo set_bg_img('#education', 'setg_edu_bg_img', ''); ?>
				</style>
				<style id="portfolio-bg-img">
					<?php echo set_bg_img('#portfolio', 'setg_portfolio_bg_img', get_template_directory_uri() . '/img/counters-bg.jpg'); ?>
				</style>
				<style id="blog-bg-img">
					<?php echo set_bg_img('#blog', 'setg_blog_bg_img', ''); ?>
				</style>
				<style id="tnc-bg-img">
					<?php echo set_bg_img('#tnc', 'setg_tnc_bg_img', ''); ?>
				</style>
				<style id="contact-bg-img">
					<?php echo set_bg_img('#contact', 'setg_contact_bg_img', get_template_directory_uri() . '/img/paralax-bg.png'); ?>); ?>
				</style>
			<!--------------------------------------------- 
			#Bg Color 
			---------------------------------------------->
				<style id="edu-bg-color">
					<?php echo set_bg_color('#education', 'setg_edu_bg_color', '#eee'); ?>
				</style>
				<style id="portfolio-bg-color">
					<?php echo set_bg_color('#portfolio', 'setg_portfolio_bg_color', $overlay_color); ?>
				</style>
				<style id="blog-bg-color">
					<?php echo set_bg_color('#blog', 'setg_blog_bg_color', '#f5f5f5'); ?>
				</style>
				<style id="tnc-bg-color">
					<?php echo set_bg_color('#tnc', 'setg_tnc_bg_color', '#B2AFAB'); ?>
				</style>
				<style id="contact-bg-color">
					<?php echo set_bg_color('#contact', 'setg_contact_bg_color', $overlay_color); ?>
				</style>
			<!--------------------------------------------- 
			#Overlay 
			---------------------------------------------->
				<style id="edu-overlay">
					<?php
						echo set_overlay('#education .overlay-mf', 'setg_edu_bg_img', 'setg_edu_bg_color', '#eee', '');
					?>
				</style>
				<style id="portfolio-overlay">
					<?php
						echo set_overlay(
							'#portfolio .overlay-mf',
							'setg_portfolio_bg_img',
							'setg_portfolio_bg_color',
							$overlay_color,
							get_template_directory_uri() . '/img/counters-bg.jpg'
						);
					?>
				</style>
				<style id="blog-overlay">
					<?php
						echo set_overlay('#blog .overlay-mf', 'setg_blog_bg_img', 'setg_blog_bg_color', '#f5f5f5', '');
					?>
				</style>
				<style id="tnc-overlay">
					<?php
						echo set_overlay('#tnc .overlay-mf', 'setg_tnc_bg_img', 'setg_tnc_bg_color', '#B2AFAB', '');
					?>
				</style>
				<style id="contact-overlay">
					<?php
						echo set_overlay(
							'#contact .overlay-mf', 
							'setg_contact_bg_img', 
							'setg_contact_bg_color', 
							$overlay_color, 
							get_template_directory_uri() . '/img/paralax-bg.png');
					?>
				</style>

			<?php endif;
			}

			/*-------------------------------------------------------------
		# Set Setting and Control
		--------------------------------------------------------------*/
			function set_setting($wp_customize, $setg, $default, $transport)
			{
				$wp_customize->add_setting($setg, array(
					'default'	=> $default,
					'transport'	=> $transport
				));
			}

			function set_control(
				$wp_customize,
				$setg,
				$sect,
				$ctrl,
				$label,
				$type,
				$priority,
				$desc = '',
				$input_attrs = array()
			) {

				$params = array(
					'label'	=> $label,
					'description' => $desc,
					'type'	=> $type,
					'priority'	=> $priority,
					'input_attrs' => $input_attrs,
					'settings'	=> $setg,
					'section'	=> $sect
				);

				switch ($type) {
					case 'color':

						$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $ctrl, $params));
						break;

					case 'image':
						$param_extra = array(
							'button_labels'	=> array(
								'select' => 'Select Image',
								'change' => 'Change Image',
								'remove' => 'Remove'
							),
							'default' => __('Default'),
							'placeholder' => __('No image selected'),
							'frame_title' => __('Select Image'),
							'frame_button' => __('Choose Image'),
						);

						$params = array_merge($params, $param_extra);
						$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $ctrl, $params));

						break;

					default:
						$wp_customize->add_control($ctrl, $params);
				};
			}
