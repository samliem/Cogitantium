<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cogitantium
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<div aside id="secondary" class="sidebar col-lg-4 mt-5">
	<?php dynamic_sidebar('sidebar-1'); ?>
</div>