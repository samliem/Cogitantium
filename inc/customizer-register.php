<?php
/**
 * Register Custom Control
 */

$tnc_options = array(
	'all'	=> 'Semua',
	'training'		=> 'Training',
	'certificate'	=> 'Certificate'
);

function cogitantium_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'cogitantium_customize_partial_blogname',
		));
		$wp_customize->selective_refresh->add_partial('blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'cogitantium_customize_partial_blogdescription',
		));
	}

	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section("colors");
	$wp_customize->remove_section("background_image");
	$wp_customize->remove_section("static_front_page");

	/*-------------------------------------------------------
	* Website theme
	--------------------------------------------------------*/
	$wp_customize->add_section('sect_theme', array(
		'title'	=> 'Website Color',
		'priority'	=> 30,
	));

	set_setting($wp_customize, 'setg_theme', 'cyan', 'refresh');
	$wp_customize->add_control(
		'ctrl_theme',
		array(
			'label' => __('Website color list options'),
			'section' => 'sect_theme',
			'settings' => 'setg_theme',
			'priority' => 10, // Optional. Order priority to load the control. Default: 10
			'type' => 'select',
			'choices' => array( // Optional.
				'cyan' => __('Cyan'),
				'green' => __('Green'),
				'orange' => __('Orange'),
				'purple' => __('Purple'),
				'red' => __('Red'),
			)
		)
	);

	$overlay_color = '';
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

	/*--------------------------------------------------------
	* Header
	---------------------------------------------------------*/
	$wp_customize->add_section('sect_header', array(
		'title' => 'Header',
		'priority' => 33,
	));

	set_setting($wp_customize, 'setg_title', '', 'postMessage');
	set_control(
		$wp_customize,
		'setg_title',
		'sect_header',
		'ctrl_title',
		'Title',
		'text',
		10,
		'Bisa diisi nama anda, profesi, dll'
	);

	set_setting($wp_customize, 'setg_btn_header', 'Download CV', 'postMessage');
	set_control(
		$wp_customize,
		'setg_btn_header',
		'sect_header',
		'ctrl_btn_header',
		'Download Button',
		'text',
		20,
		'default: Download CV',
		array('placeholder' => 'Download CV')
	);

	set_setting($wp_customize, 'setg_bg_img', get_template_directory_uri() . '/img/antoine-barres.jpg', 'postMessage');
	set_control(
		$wp_customize,
		'setg_bg_img',
		'sect_header',
		'ctrl_img_bg',
		'Header Background Image',
		'image',
		30,
		'Uk. gambar disarankan 1920 x 1055 pixel. Uk. file disarankan < 100 kb'
	);

	/*--------------------------------------------------------
	* Sections
	---------------------------------------------------------*/
	$wp_customize->add_panel('pnl_sections', array(
		'title'	=> 'Sections Panel',
		'description'	=> 'Setup Homepage Sections',
		'priority'	=> 35
	));

	/*--------------------------------------------------------
	** Skill
	---------------------------------------------------------*/
	$wp_customize->add_section('sect_skill', array(
		'title'	=> 'Skill',
		'description'	=> 'Skill Setting Parameter',
		'priority'	=> 10,
		'panel'	=> 'pnl_sections'
	));

	/*--------------------------------------------------------
	*** Skill Section Visibility
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_skill_visibility', 0, 'postMessage');
	set_control(
		$wp_customize,
		'setg_skill_visibility',
		'sect_skill',
		'ctrl_skill_visibility',
		'Hide / Sembunyikan',
		'checkbox',
		10
	);

	/*--------------------------------------------------------
	*** Skill Section Title
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_skill_title', 'skill', 'postMessage');
	set_control(
		$wp_customize,
		'setg_skill_title',
		'sect_skill',
		'ctrl_skill_title',
		'Title',
		'text',
		20,
		'Default: Skill',
		array('placeholder' => 'Skill')
	);

	/*--------------------------------------------------------
	** Experience
	---------------------------------------------------------*/
	$wp_customize->add_section('sect_exp', array(
		'title'	=> 'Experience',
		'description'	=> 'Experience Setting Parameter',
		'priority'	=> 20,
		'panel'		=> 'pnl_sections'
	));

	/*--------------------------------------------------------
	*** Experience Visibility
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_exp_visibility', 0, 'postMessage');
	set_control(
		$wp_customize,
		'setg_exp_visibility',
		'sect_exp',
		'ctrl_exp_visibility',
		'Hide / Sembunyikan',
		'checkbox',
		10
	);

	/*--------------------------------------------------------
	*** Experience Title
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_exp_title', 'Experience', 'postMessage');
	set_control(
		$wp_customize,
		'setg_exp_title',
		'sect_exp',
		'ctrl_exp_title',
		'Title',
		'text',
		20,
		'Default: Experience',
		array('placeholder' => 'Experience')
	);

	/*--------------------------------------------------------
	** Education
	---------------------------------------------------------*/
	$wp_customize->add_section('sect_edu', array(
		'title'	=> 'Education',
		'description'	=> 'Education Setting Parameter',
		'priority'	=> 30,
		'panel'		=> 'pnl_sections'
	));

	/*--------------------------------------------------------
	*** Education Visibility
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_edu_visibility', 0, 'postMessage');
	set_control(
		$wp_customize,
		'setg_edu_visibility',
		'sect_edu',
		'ctrl_edu_visibility',
		'Hide / Sembunyikan',
		'checkbox',
		10
	);

	/*--------------------------------------------------------
	*** Education Title
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_edu_title', 'Education', 'postMessage');
	set_control(
		$wp_customize,
		'setg_edu_title',
		'sect_edu',
		'ctrl_edu_title',
		'Title',
		'text',
		20,
		'default : Education',
		array('placeholder' => 'Education')
	);

	/*--------------------------------------------------------
	*** Education Subtitle
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_edu_subtitle', 'Formal Education', 'postMessage');
	set_control(
		$wp_customize,
		'setg_edu_subtitle',
		'sect_edu',
		'ctrl_edu_subtitle',
		'Sub Title',
		'text',
		30
	);

	/*--------------------------------------------------------
	*** Education Bg color
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_edu_bg_color', '#eee', 'postMessage');
	set_control(
		$wp_customize,
		'setg_edu_bg_color',
		'sect_edu',
		'ctrl_edu_bg_color',
		'Background Color',
		'color',
		40
	);

	/*--------------------------------------------------------
	*** Education Bg image
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_edu_bg_img', '', 'postMessage');
	set_control(
		$wp_customize,
		'setg_edu_bg_img',
		'sect_edu',
		'ctrl_edu_bg_img',
		'Background Image',
		'image',
		50,
		'Uk. gambar disarankan 1920 x 1055 pixel. Uk. file disarankan < 100 kb'
	);

	/*--------------------------------------------------------
	** Portfolio
	---------------------------------------------------------*/
	$wp_customize->add_section('sect_portfolio', array(
		'title'	=> 'Portfolio',
		'description'	=> 'Portfolio Setting Parameter',
		'priority'	=> 40,
		'panel'	=> 'pnl_sections'
	));

	/*--------------------------------------------------------
	*** Portfolio Visibility
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_portfolio_visibility', 0, 'postMessage');
	set_control(
		$wp_customize,
		'setg_portfolio_visibility',
		'sect_portfolio',
		'ctrl_portfolio_visibility',
		'Hide / Sembunyikan',
		'checkbox',
		10
	);

	/*--------------------------------------------------------
	*** Portfolio Title
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_portfolio_title', 'Portfolio', 'postMessage');
	set_control(
		$wp_customize,
		'setg_portfolio_title',
		'sect_portfolio',
		'ctrl_portfolio_title',
		'Title',
		'text',
		20,
		'default: Portfolio',
		array('placeholder' => 'Portfolio Section Title')
	);

	/*--------------------------------------------------------
	*** Portfolio Bg Color
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_portfolio_bg_color', $overlay_color, 'postMessage');
	set_control(
		$wp_customize,
		'setg_portfolio_bg_color',
		'sect_portfolio',
		'ctrl_portfolio_bg_color',
		'Background Color',
		'color',
		30
	);

	/*--------------------------------------------------------
	*** Portfolio Bg Image
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_portfolio_bg_img', get_template_directory_uri() . '/img/counters-bg.jpg', 'postMessage');
	set_control(
		$wp_customize,
		'setg_portfolio_bg_img',
		'sect_portfolio',
		'ctrl_portfolio_bg_img',
		'Background Image',
		'image',
		40,
		'Uk. gambar disarankan 1920 x 1055 pixel. Uk. file disarankan < 100 kb'
	);

	/*--------------------------------------------------------
	** Blog
	---------------------------------------------------------*/
	$wp_customize->add_section('sect_blog', array(
		'title'	=> 'Blog',
		'description'	=> 'Blog Section Setting Parameter',
		'priority'	=> 60,
		'panel'	=> 'pnl_sections'
	));

	/*--------------------------------------------------------
	*** Blog Visibility
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_blog_visibility', 0, 'postMessage');
	set_control(
		$wp_customize,
		'setg_blog_visibility',
		'sect_blog',
		'ctrl_blog_visibility',
		'Hide / Sembunyikan',
		'checkbox',
		10
	);

	/*--------------------------------------------------------
	*** Blog Title
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_blog_title', 'The Latest Blogs', 'postMessage');
	set_control(
		$wp_customize,
		'setg_blog_title',
		'sect_blog',
		'ctrl_blog_title',
		'Title',
		'text',
		20,
		'default: The Latest Blogs',
		array('placeholder' => 'Blog Section Title')
	);

	/*--------------------------------------------------------
	*** Blog Subtitle
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_blog_subtitle', 'All Blogs', 'postMessage');
	set_control(
		$wp_customize,
		'setg_blog_subtitle',
		'sect_blog',
		'ctrl_blog_subtitle',
		'All Blog Links Label',
		'text',
		30,
		'default: All Blogs'
	);

	/*--------------------------------------------------------
	*** Blog Bg Color
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_blog_bg_color', '#f5f5f5', 'postMessage');
	set_control(
		$wp_customize,
		'setg_blog_bg_color',
		'sect_blog',
		'ctrl_blog_bg_color',
		'Background Color',
		'color',
		40
	);

	/*--------------------------------------------------------
	*** Blog Bg Image
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_blog_bg_img', '', 'postMessage');
	set_control(
		$wp_customize,
		'setg_blog_bg_img',
		'sect_blog',
		'ctrl_blog_bg_img',
		'Background Image',
		'image',
		50,
		'Uk. gambar disarankan 1920 x 1055 pixel. Uk. file disarankan < 100 kb'
	);

	/*--------------------------------------------------------
	** TNC
	---------------------------------------------------------*/
	$wp_customize->add_section('sect_tnc', array(
		'title'	=> 'Training and Certificate',
		'description'	=> 'Training & Certificate Setting Parameter',
		'priority'	=> 70,
		'panel'	=> 'pnl_sections'
	));

	/*--------------------------------------------------------
	*** TNC Visibility
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_tnc_visibility', 0, 'postMessage');
	set_control(
		$wp_customize,
		'setg_tnc_visibility',
		'sect_tnc',
		'ctrl_tnc_visibility',
		'Hide / Sembunyikan',
		'checkbox',
		10
	);

	/*--------------------------------------------------------
	*** ToC Visibility
	---------------------------------------------------------*/
	global $tnc_options;
	set_setting($wp_customize, 'toc_visibility', 'all', 'postMessage');
	$wp_customize->add_control('toc_visibility', array(
		'label' => 'Training / Certificate',
		'description' => 'Pilih bagian yang akan ditampilkan',
		'section' => 'sect_tnc',
		'priority' => 20, // Optional. Order priority to load the control. Default: 10
		'type' => 'select',
		'choices' => $tnc_options,

	));

	/*--------------------------------------------------------
	*** ToC Visibility depends on TnC setting value
	---------------------------------------------------------*/
	$tnc_controls = array_filter(array(
		$wp_customize->get_control('toc_visiblity'),
	));

	foreach ($tnc_controls as $control) {
		$control->active_callback = function ($control) {
			$setting = $control->manager->get_setting('setg_tnc_visibility');
			if (!setting)
				return true;

			return !$setting->value();
		};
	}

	/*--------------------------------------------------------
	*** TNC Title
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_tnc_title', 'Trainings & Certificates', 'postMessage');
	set_control($wp_customize, 
		'setg_tnc_title', 
		'sect_tnc', 
		'ctrl_tnc_title', 
		'Title', 
		'text', 
		30, 
		'', 
		array('placeholder' => 'Trainings & Certificates'));
	/*--------------------------------------------------------
	*** TNC Bg Image
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_tnc_bg_color', '#B2AFAB', 'postMessage');
	set_control(
		$wp_customize,
		'setg_tnc_bg_color',
		'sect_tnc',
		'ctrl_tnc_bg_color',
		'Background Color',
		'color',
		40
	);

	/*--------------------------------------------------------
	*** TNC Bg Image
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_tnc_bg_img', '', 'postMessage');
	set_control(
		$wp_customize,
		'setg_tnc_bg_img',
		'sect_tnc',
		'ctrl_tnc_bg_img',
		'Background Image',
		'image',
		50,
		'Uk. gambar disarankan 1920 x 1055 pixel. Uk. file disarankan < 100 kb'
	);

	/*--------------------------------------------------------
	** Contact
	---------------------------------------------------------*/
	$wp_customize->add_section('sect_contact', array(
		'title'	=> 'Contact',
		'description'	=> 'Contact Setting Parameter',
		'priority'	=> 80,
		'panel'	=> 'pnl_sections'
	));

	/*--------------------------------------------------------
	*** Contact Title
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_contact_title', 'Send Us Message', 'postMessage');
	set_control(
		$wp_customize,
		'setg_contact_title',
		'sect_contact',
		'ctrl_contact_title',
		'Title',
		'text',
		10,
		'',
		array('placeholder' => 'Send Us Message')
	);

	/*--------------------------------------------------------
	*** Contact Bg Color
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_contact_bg_color', $overlay_color, 'postMessage');
	set_control(
		$wp_customize,
		'setg_contact_bg_color',
		'sect_contact',
		'ctrl_contact_bg_color',
		'Background Color',
		'color',
		20
	);

	/*--------------------------------------------------------
	*** Contact Bg Image
	---------------------------------------------------------*/
	set_setting($wp_customize, 'setg_contact_bg_img', get_template_directory_uri() . '/img/paralax-bg.png', 'postMessage');
	set_control(
		$wp_customize,
		'setg_contact_bg_img',
		'sect_contact',
		'ctrl_contact_bg_img',
		'Background Image',
		'image',
		30,
		'Uk. gambar disarankan 1920 x 1055 pixel. Uk. file disarankan < 100 kb'
	);

}
add_action('customize_register', 'cogitantium_customize_register');