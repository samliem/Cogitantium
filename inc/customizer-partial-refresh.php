<?php 
/**
 * Customizer Selective Refresh
 */

function cogitantium_selective_refresh($wp_customize) {
	
	/*--------------------------------------------------------
	* Selective Refresh
	---------------------------------------------------------*/
	if (isset($wp_customize->selective_refresh)) {

		global $overlay_color;
		/*--------------------------------------------------------
		** Page header
		---------------------------------------------------------*/
		$wp_customize->selective_refresh->add_partial('setg_title', array(
			'selector'        => 'h1.presentation-title',
			'render_callback' => function () {
				echo get_theme_mod('setg_title', '');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_btn_header', array(
			'selector'			=> 'a.btn-download',
			'render_callback'	=> function () {
				echo get_theme_mod('setg_btn_header', 'download cv');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_bg_img', array(
			'selector' 			=> '#hdr-bg-img',
			'render_callback'	=> function () {
				echo set_bg_img(
					'.page-header',
					'setg_bg_img',
					get_template_directory_uri() . '/img/antoine-barres.jpg'
				);
			}
		));

		/*--------------------------------------------------------
		** Skill Sections
		---------------------------------------------------------*/
		$wp_customize->selective_refresh->add_partial('setg_skill_visibility', array(
			'selector'			=> '#skill-visibility',
			'render_callback'	=> function () {
				return set_visibility('.skill-section', 'setg_skill_visibility');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_skill_title', array(
			'selector'			=> '.skill h2',
			'render_callback'	=> function () {
				echo get_theme_mod('setg_skill_title', 'skill');
			}
		));

		/*--------------------------------------------------------
		** Experience Sections
		---------------------------------------------------------*/
		$wp_customize->selective_refresh->add_partial('setg_exp_visibility', array(
			'selector'	=> '#exp-visibility',
			'render_callback'	=> function () {
				echo set_visibility('.exp-section', 'setg_exp_visibility');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_exp_title', array(
			'selector'			=> '.exp h2',
			'render_callback'	=> function () {
				echo get_theme_mod('setg_exp_title', 'experience');
			}
		));

		/*--------------------------------------------------------
		** Education Sections
		---------------------------------------------------------*/
		$wp_customize->selective_refresh->add_partial('setg_edu_visibility', array(
			'selector'	=> '#edu-visibility',
			'render_callback'	=> function () {
				echo set_visibility('.edu-section', 'setg_edu_visibility');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_edu_title', array(
			'selector'			=> '#education h3',
			'render_callback'	=> function () {
				echo get_theme_mod('setg_edu_title', 'education');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_edu_subtitle', array(
			'selector'			=> '#education h6',
			'render_callback'	=> function () {
				echo get_theme_mod('setg_edu_subtitle', 'education');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_edu_bg_color', array(
			'selector'	=> '#edu-bg-color',
			'render_callback'	=> function () {
				echo set_bg_color('#education', 'setg_edu_bg_color', '#eee');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_edu_bg_img', array(
			'selector'	=> '#edu-bg-img',
			'render_callback'	=> function () {
				echo set_bg_img('#education', 'setg_edu_bg_img', '');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_edu_overlay', array(
			'selector'	=> '#edu-overlay',
			'settings'	=> array('setg_edu_bg_img', 'setg_edu_bg_color'),
			'render_callback'	=> function () {
				echo set_overlay('#education .overlay-mf', 'setg_edu_bg_img', 'setg_edu_bg_color', '#eee', '');
			}
		));

		/*--------------------------------------------------------
		** Portfolio Sections
		---------------------------------------------------------*/
		$wp_customize->selective_refresh->add_partial('portfolio_visibility', array(
			'selector'	=> '#portfolio-visibility',
			'settings'	=> 'setg_portfolio_visibility',
			'render_callback'	=> function () {
				echo set_visibility('.portfolio-section', 'setg_portfolio_visibility');
			}
		));

		$wp_customize->selective_refresh->add_partial('portfolio_title', array(
			'selector'	=> '#portfolio h2',
			'settings'	=> 'setg_portfolio_title',
			'render_callback'	=> function () {
				echo get_theme_mod('setg_portfolio_title', 'Portfolio');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_portfolio_bg_color', array(
			'selector'	=> '#portfolio-bg-color',
			'render_callback'	=> function () {
				echo set_bg_color('#portfolio', 'setg_portfolio_bg_color', $overlay_color);
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_portfolio_bg_img', array(
			'selector'	=> '#portfolio-bg-img',
			'render_callback'	=> function () {
				echo set_bg_img('#portfolio', 'setg_portfolio_bg_img', get_template_directory_uri() . '/img/counters-bg.jpg');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_portfolio_overlay', array(
			'selector'	=> '#portfolio-overlay',
			'settings'	=> array('setg_portfolio_bg_img', 'setg_portfolio_bg_color'),
			'render_callback'	=> function () {
				echo set_overlay(
					'#portfolio .overlay-mf',
					'setg_portfolio_bg_img',
					'setg_portfolio_bg_color',
					$overlay_color,
					get_template_directory_uri() . '/img/counters-bg.jpg'
				);
			}
		));

		/*--------------------------------------------------------
		** Blog Sections
		---------------------------------------------------------*/
		$wp_customize->selective_refresh->add_partial('blog_visibility', array(
			'selector'	=> '#blog-visibility',
			'settings'	=> 'setg_blog_visibility',
			'render_callback'	=> function () {
				echo set_visibility('.blog-section', 'setg_blog_visibility');
			}
		));

		$wp_customize->selective_refresh->add_partial('blog_title', array(
			'selector'	=> '#blog h2',
			'settings'	=> 'setg_blog_title',
			'render_callback'	=> function () {
				echo get_theme_mod('setg_blog_title', 'The Latest Blogs');
			}
		));

		$wp_customize->selective_refresh->add_partial('blog_subtitle', array(
			'selector'	=> '.link-all-post',
			'settings'	=> 'setg_blog_subtitle',
			'render_callback'	=> function () {
				echo get_theme_mod('setg_blog_subtitle', 'All Blogs');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_blog_bg_color', array(
			'selector'	=> '#blog-bg-color',
			'container_inclusive' => true,
			'render_callback'	=> function () {
				echo set_bg_color('#blog', 'setg_blog_bg_color', '#f5f5f5');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_blog_bg_img', array(
			'selector'	=> '#blog-bg-img',
			'render_callback'	=> function () {
				echo set_bg_img('#blog', 'setg_blog_bg_img', '');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_blog_overlay', array(
			'selector'	=> '#blog-overlay',
			'settings'	=> array('setg_blog_bg_img', 'setg_blog_bg_color'),
			'render_callback'	=> function () {
				echo set_overlay('#blog .overlay-mf', 'setg_blog_bg_img', 'setg_blog_bg_color', '#f5f5f5', '');
			}
		));

		/*--------------------------------------------------------
		** TNC Section
		---------------------------------------------------------*/
		$wp_customize->selective_refresh->add_partial('tnc_visibility', array(
			'selector'	=> '#tnc-visibility',
			'settings'	=> 'setg_tnc_visibility',
			'render_callback'	=> function () {
				echo set_visibility('.tnc-section', 'setg_tnc_visibility');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_tnc_title', array(
			'selector'			=> '#tnc h2',
			'render_callback'	=> function () {
				echo get_theme_mod('setg_tnc_title', 'Trainings & Certificates');
			}
		));

		$wp_customize->selective_refresh->add_partial('toc_visibility', array(
			'selector'	=> '#tnc',
			'type' => 'toc',
		));

		$wp_customize->selective_refresh->add_partial('setg_tnc_bg_color', array(
			'selector'	=> '#tnc-bg-color',
			'render_callback'	=> function () {
				echo set_bg_color('#tnc', 'setg_tnc_bg_color', '#B2AFAB');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_tnc_bg_img', array(
			'selector'	=> '#tnc-bg-img',
			'render_callback'	=> function () {
				echo set_bg_img('#tnc', 'setg_tnc_bg_img', '');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_tnc_overlay', array(
			'selector'	=> '#tnc-overlay',
			'settings'	=> array('setg_tnc_bg_img', 'setg_tnc_bg_color'),
			'render_callback'	=> function () {
				echo set_overlay('#tnc .overlay-mf', 'setg_tnc_bg_img', 'setg_tnc_bg_color', '#B2AFAB', '');
			}
		));

		/*--------------------------------------------------------
		** Contact Section
		---------------------------------------------------------*/
		$wp_customize->selective_refresh->add_partial('contact_title', array(
			'selector'	=> '#contact h5.contact-title',
			'settings'	=> 'setg_contact_title',
			'render_callback'	=> function () {
				echo get_theme_mod('setg_contact_title', 'Send Us Message');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_contact_bg_color', array(
			'selector'	=> '#contact-bg-color',
			'render_callback'	=> function () {
				echo set_bg_color('#contact', 'setg_contact_bg_color', $overlay_color);
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_contact_bg_img', array(
			'selector'	=> '#contact-bg-img',
			'render_callback'	=> function () {
				echo set_bg_img('#contact', 'setg_contact_bg_img', get_template_directory_uri() . '/img/counters-bg.jpg');
			}
		));

		$wp_customize->selective_refresh->add_partial('setg_contact_overlay', array(
			'selector'	=> '#contact-overlay',
			'settings'	=> array('setg_contact_bg_img', 'setg_contact_bg_color'),
			'render_callback'	=> function () {
				echo set_overlay(
					'#contact .overlay-mf',
					'setg_contact_bg_img',
					'setg_contact_bg_color',
					$overlay_color,
					get_template_directory_uri() . '/img/paralax-bg.png'
				);
			}
		));
	}
}
add_action('customize_register', 'cogitantium_selective_refresh');

/*---------------------------------------------------------
# Partial Refresh Render Callback
----------------------------------------------------------*/

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cogitantium_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cogitantium_customize_partial_blogdescription()
{
	bloginfo('description');
}

/*----------------------------------------------------------
## Set Background Image
-----------------------------------------------------------*/
function set_bg_img($selector, $setting, $default)
{
	$bg_img = get_theme_mod($setting, $default);

	$return = sprintf(
		'%s { background-image: url(%s) }',
		$selector,
		$bg_img
	);

	return $return;
}

/*----------------------------------------------------------
## Set Background Color
-----------------------------------------------------------*/
function set_bg_color($selector, $setting, $default)
{
	$bg_color = get_theme_mod($setting, $default);

	$return = sprintf(
		'%s { background-color: %s }',
		$selector,
		$bg_color
	);

	return $return;
}

/*----------------------------------------------------------
## Set Visibility
-----------------------------------------------------------*/
function set_visibility($selector, $setting)
{
	$return = '';
	$is_hide = get_theme_mod($setting, false);
	$display = $is_hide ? 'none' : 'block';
	$return = sprintf(
		'%s { display: %s}',
		$selector,
		$display
	);

	return $return;
}

/*----------------------------------------------------------
## Set Training or Certificate Visibility
-----------------------------------------------------------*/
function set_toc_visibility($selector, $sect_train, $sect_cert)
{

	$return = sprintf('%s { display: block; }', $selector);

	$is_train_hide = get_theme_mod($sect_train, 'false');
	$is_cert_hide = get_theme_mod($sect_cert, 'false');

	if ($is_train_hide || $is_cert_hide)
		$return = sprintf('%s { display: none; }', $selector);

	return $return;
}

/*----------------------------------------------------------
## Bg Overlay
-----------------------------------------------------------*/
function set_overlay($selector, $setting_bg_img, $setting_bg_color, $default_bg_color, $default_bg_img)
{

	$bg_img = get_theme_mod($setting_bg_img, $default_bg_img);
	$bg_color = empty($bg_img) ? 'transparent' : get_theme_mod($setting_bg_color, $default_bg_color);
	$return = sprintf(
		'%s { background-color: %s; }',
		$selector,
		$bg_color
	);

	return $return;
}