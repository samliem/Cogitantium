<?php

/**
 * The header for homepage
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cogitantium
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body id="home" <?php body_class(); ?>>
	<?php
	/*----------------------------------------------------
	* Global variable for Personal Data
	----------------------------------------------------*/
	global $wpdb;
	global $profile;
	$profile = $wpdb->get_row('SELECT * FROM wp_user_profile');
	?>
	<div id="page" class="site">

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<nav class="navbar navbar-expand-lg fixed-top navbar-transparent" color-on-scroll="500" id="mainNav">
					<div class="container">
						<div class="navbar-translate site-title">
							<a class="navbar-brand" href="#home" rel="tooltip" 
								title="<?php echo get_bloginfo('name') . ' Homepage'; ?>"><?php bloginfo('name'); ?>
								<div class="site-description">
									<?php bloginfo('description');?>
								</div>
							</a>
							<button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-bar bar1"></span>
								<span class="navbar-toggler-bar bar2"></span>
								<span class="navbar-toggler-bar bar3"></span>
							</button>
						</div>
						
						<?php
						/*--------------------------------------------------------------
						* menu & theme_location arg, bisa dilihat pada fungsi 
						* register_nav_menu dalam functions.php
						--------------------------------------------------------------*/
						$menu_args = array(
							'menu'			=> 'primary',
							'theme_location' => 'menu-1',
							'container'		=> 'div',
							'container_id'	=> 'navigation',
							'container_class'	=> 'collapse navbar-collapse justify-content-end',
							'menu_id'		=> false,
							'menu_class'	=> 'navbar-nav',
							'depth'			=> 0,
							'fallback_cb'	=> 'bs4navwalker::fallback',
							'walker'		=> new bs4Navwalker()
						);
						wp_nav_menu($menu_args);
						?>
					</div>
				</nav>
			</div><!-- .site-branding -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">