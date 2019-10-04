<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Phasellus
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
    <?php if( !empty(get_the_post_thumbnail()) ) : ?>
        <img class="z-depth-1-half w-100 h-auto mb-3"
            src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
        <?php endif;
    the_content(); ?>

    <div class="nav-posts clearfix my-3">
        <div class="float-left">
            <?php previous_post_link(); ?>
        </div>
        <div class="float-right">
            <?php next_post_link(); ?>
        </div>
	  </div>
    
</article><!-- #post-<?php the_ID(); ?> -->