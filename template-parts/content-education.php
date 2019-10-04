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
				<?php echo get_post_meta($post_id, 'sekolah', true) . ' - ' . 
					get_post_meta($post_id, 'city', true); ?>
			</span>
		</div>
		<div class="text-white text-right pr-2 flex-fill">
			<span class="pr-2">
				<?php echo get_post_meta($post_id, 'from_year', true) . ' - ' . 
					get_post_meta($post_id, 'to_year', true); ?>
			</span>
			<i class="far fa-calendar-alt"></i>
		</div>
	</div>

	<?php 
		$jurusan = empty(get_post_meta($post_id, 'jurusan', true));
		$fakultas = get_post_meta($post_id, 'fakultas', true);

		$jurusan = empty($jurusan) ? ' - ' : $jurusan;
		$fakultas = empty($fakultas) ? ' - ' : $fakultas; ?>
	
	<h4 class="mt-0 mb-2">Major / Faculty : <?php echo $jurusan . ' / ' . $fakultas; ?></h4>
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