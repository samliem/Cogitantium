<?php
/*---------------------------------------------------
# About Section
----------------------------------------------------*/
?>

<section id="about" class="about mt-4">
    <div class="container">
        <div class="row">
            <div class="personal-data col-lg-4 text-center mb-4">
                <div class="photo-img"">
                        <?php

                        $about = new WP_Query(array('pagename' => 'about'));
                        if ($about->have_posts()) : $about->the_post();
                            the_post_thumbnail('full', array('class' => 'rounded img-thumbnail z-depth-1-half'));
                        endif;

                        if (!empty($profile->nama)) : ?>
                            <div class=" row">
                    <div class="text-left col-sm-5 text-dark">Name:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $profile->nama; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->nik)) : ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark">ID Card:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $profile->nik; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->tahun_lahir)) : ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark">Age:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo date('Y') - $profile->tahun_lahir; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->warga_negara)) :
                $warga_negara = $profile == 'wni' ? 'WNI (Indonesian)' : 'WNA (Non Citizen)'; ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark">Nationality:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $warga_negara; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->gender) && $profile->gender != 'rahasia') :
                $gender = $profile->gender == 'male' ? 'Lelaki / Male' : 'Perempuan / Female'; ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark">Gender:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $gender; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->addr1)) : ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark">Address:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $profile->addr1; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->addr2)) : ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark"></div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $profile->addr2; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->city)) : ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark">City:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $profile->city; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->tempat_lahir)) : ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark">Place of birth:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $profile->tempat_lahir; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->status_perkawinan) && $profile->status_perkawinan != 'rahasia') :
                $status = $profile->status_perkawinan == 'Kawin' ? 'Kawin (Married)' : 'Belum Kawin (Single)'; ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark">Marital Status:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $status; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->phone)) : ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark">Phone:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $profile->phone; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->wa)) : ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark">Whatsapp:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $profile->wa; ?></div>
                </div>
            <?php endif;

            if (!empty($profile->email)) : ?>
                <div class="row">
                    <div class="text-left col-sm-5 text-dark">Email:</div>
                    <div class="text-left col-sm-7 text-dark font-weight-bold"><?php echo $profile->email; ?></div>
                </div>
            <?php endif; ?>

            </div>
        </div>

        <div class="skill-exp col-lg-8">
            <div class="skill-section home-section">
                <?php include('skill.php');?>
            </div>
            <div class="exp-section home-section">
                <?php include('experience.php'); ?>
            </div>
        </div>
        
    </div><!-- .container -->
</section>