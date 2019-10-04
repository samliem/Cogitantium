<?php

/**
 * Template part for displaying archive in archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cogitantium
 */

$post_id = get_the_ID(); 
$post_type = get_post_type($post_id);
if( $post_type == 'training' ) {
	$first_meta = get_post_meta($post_id, 'trainer', true);
	$second_meta = get_post_meta($post_id, 'year_training', true);
} elseif( $post_type == 'certificate') {
	$first_meta = get_post_meta($post_id, 'issuer', true);
	$second_meta = get_post_meta($post_id, 'year_certificate', true);
} elseif( $post_type == 'skill') {
	$first_meta = get_post_meta($post_id, 'skill_level', true);
} elseif( $post_type == 'experience' ) {
	$first_meta = get_post_meta($post_id, 'company', true);
	$from_year = get_post_meta($post_id, 'from_year', true);
	$duration = get_post_meta($post_id, 'duration', true);
	$second_meta = "$from_year - $duration";
} elseif( $post_type == 'education') {
	$first_meta = get_post_meta($post_id, 'sekolah', true);
	$from_year = get_post_meta($post_id, 'from_year', true);
	$to_year = get_post_meta($post_id, 'to_year', true);
	$second_meta = "$from_year - $to_year";
} else {
	$first_meta = get_the_author_meta('display_name');
	$second_meta = get_the_date('j M Y');
}
?>

<div class="row">
	<div class="col-lg-3 mb-3">
		<ul class="post-meta list-group">
			<li class="list-group-item">
				<?php if( $post_type == 'post' || $post_type == 'portfolio' ) : ?>
					<i class="fas fa-user"></i>
				<?php else : ?>
					<i class="fas fa-building"></i>
				<?php endif; ?>
				<span class="pl-2">
					<?php if( $post_type == 'skill' ) :
						echo 'Skill Level : ' . $first_meta;
					else :
						echo $first_meta; 
					endif; ?>
				</span>
			</li>
			<?php if( $post_type != 'skill' ) : ?>
				<li class="list-group-item">
					<i class="far fa-calendar-alt"></i>
					<span class="pl-2">
						<?php echo $second_meta; ?>
					</span>
				</li>
			<?php endif; ?>
		</ul>
	</div>
	<div class="col-lg-9 mb-3">
		<article class="post">
			<div class="post-thumbnail mb-2">
				<?php if (!empty(get_the_post_thumbnail())) : ?>
					<img class="z-depth-1-half w-100 h-auto" 
						src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
				<?php endif; ?>
			</div>
			<?php $post_type = get_post_type(get_the_ID()); ?>
			<h2 class="post-title mb-2"><?php the_title(); ?></h2>
			<div class="post-excerpt pb-5">
				<?php if( $post_type == 'training' || $post_type == 'certificate' ) {
					the_excerpt();
				} else {
					echo wp_trim_words(get_the_content(), 55);
				} ?>
				<a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="read-more btn btn-outline-primary">
					<i class="fas fa-plus mr-2"></i>Read more
				</a>
			</div>
		</article>
	</div>
</div>