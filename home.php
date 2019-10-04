<?php

/**
 * Home Template
 */

get_header('home');
$theme_uri = get_template_directory_uri();
$header_bg_img = get_theme_mod('setg_bg_img', $theme_uri . '/img/antoine-barres.jpg');
$cv_url = empty($profile->cv_url) ? '#' : $profile->cv_url;

?>

<div class="page-header section-dark">
    <div class="filter"></div>
    <div class="content-center">
        <div class="container">
            <div class="col">
                <div class="title-brand">
                    <h1 class="presentation-title"><?php echo get_theme_mod('setg_title', ''); ?></h1>
                </div>
                <div class="cv-download">
                    <div class="col">
                        <!-- agar tidak ikut transparant -->
                        <a class="btn-download text-uppercase" href="<?php echo $cv_url; ?>">
                            <?php echo get_theme_mod('setg_btn_header', 'Download CV'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .page header -->

<div class="main">
    <?php
    include('inc/section/about.php');
    ?>
    <!-- Education Section -->
    <div class="edu-section home-section">
        <?php include('inc/section/education.php');?>
    </div>
    <!-- Portfolio Section -->
    <div class="portfolio-section home-section">
        <?php include('inc/section/portfolio.php');?>
    </div>
    <!-- Blog -->
    <div class="blog-section home-section">
        <?php include('inc/section/blog.php');?>
    </div>
    <!-- Training & Certificate -->
    <div class="tnc-section home-section">
        <?php include('inc/section/tnc.php');?>
    </div>

    <?php get_footer('home'); ?>