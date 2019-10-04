<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cogitantium
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-meta d-flex">
		<div class="author pl-2 flex-fill">
			<i class="fas fa-user"></i><span class="pl-2"><?php echo get_the_author_meta('display_name'); ?></span>
		</div>
		<div class="text-white text-right pr-2 flex-fill">
			<span class="pr-2"><?php the_date(); ?></span><i class="far fa-calendar-alt"></i>
		</div>
	</div>
	<?php the_content(); ?>

	<div class="nav-posts clearfix my-3">
		<div class="float-left">
			<?php previous_post_link(); ?>
		</div>
		<div class="float-right">
			<?php next_post_link(); ?>
		</div>
	</div>

	<div class="comments-area mt-4">
		<?php comment_form(); ?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->