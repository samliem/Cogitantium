<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cogitantium
 */

?>

<?php $post_id = get_the_ID(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-meta d-flex">
		<div class="author pl-2 flex-fill">
			<i class="fas fa-user"></i>
			<span class="pl-2">
				<?php echo get_post_meta($post_id, 'trainer', true) . ' - ' . 
					get_post_meta($post_id, 'city', true); ?>
			</span>
		</div>
		<div class="text-white text-right pr-2 flex-fill">
			<span class="pr-2">
				<?php echo get_post_meta($post_id, 'year_training', true); ?>
			</span>
			<i class="far fa-calendar-alt"></i>
		</div>
	</div>
	<?php if( !empty(get_the_post_thumbnail()) ) : ?>
		<img class="z-depth-1-half w-100 h-auto mb-3" 
			src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
		<?php endif;
	the_excerpt(); ?>

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