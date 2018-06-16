<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package boundless
 */

get_header(); ?>
    <!--<?php //include 'header.php'; ?>-->

    <div class="profile-page-main">


        <section class="profile-intro ">

            <div class="content-left">
                <?php

                $image = get_field('student_image');
                if (!empty($image)): ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                    <?php else : ?>
                    <img src="http://sandboxdev.boundless.show/wp-content/uploads/2017/03/brian-1.jpg" alt="img">
                <?php endif; ?>
            </div>

            <div class="content-right">

                <?php if(get_field('first_name')) : ?>
                    <h1><?php the_field('first_name'); ?><br><span><?php the_field('last_name'); ?></span> </h1>
                <?php endif;?>
                <?php if (get_the_terms($post->ID, 'major')) {
                    $taxonomy_ar = get_the_terms($post->ID, 'major');
                    $output = '<h3>';
                    $i = 0;
                    foreach ($taxonomy_ar as $taxonomy_term) {
                        $i++;
                        echo $i;
                        if($i >= 2) {
                            $output .= '+ ' . $taxonomy_term->name . ' ';
                        }
                        else{
                            $output .= '' . $taxonomy_term->name . ' ';
                        }
                    }
                    $output .= ' Major</h3>';
                    echo $output;
                } ?>

                <?php if(get_field('website')) : ?>
                    <a href="http://<?php the_field('website'); ?>" target="_blank"><?php the_field('website'); ?></a>
                <?php endif;?>

                <?php if(get_field('bio_text')) : ?>
                    <div><?php the_field('bio_text'); ?></div>
                <?php endif;?>


            </div>

        </section>  <!-- end page profile -->

        <div class="arrow animated bounce">

            <a data-scroll href="#projects"><img alt="arrow down" src="images/B-Assets-Final/arrow.svg"/>PROJECTS</a>

        </div>

    </div>    <!-- end  profile page main -->
    <!--  start mobile layout -->
    <div class="profile-page-mobile">
        <div class="image">
           <?php $image = get_field('student_image');
            if (!empty($image)): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
            <?php else : ?>
                <img src="http://sandboxdev.boundless.show/wp-content/uploads/2017/03/brian-1.jpg" alt="img">
            <?php endif; ?>
            <div class="name">

                <h1><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></h1>
                <?php if (get_the_terms($post->ID, 'major')) {
                $taxonomy_ar = get_the_terms($post->ID, 'major');
                $output = '<h3>';
                    $i = 0;
                foreach ($taxonomy_ar as $taxonomy_term) {
                    $i++;
                    if($i >= 2) {
                        $output .= '+ ' . $taxonomy_term->name . ' ';
                    }
                    else{
                        $output .= '' . $taxonomy_term->name . ' ';
                    }
                }
                $output .= ' Major<br>';
                echo $output;
                } ?>


                    <?php if(get_field('website')) : ?>
                        <a href="http://<?php the_field('website'); ?>"><?php the_field('website'); ?></a>
                    <?php endif;?>
                </h3>
            </div>
            <div class="profile-description">
                <?php the_field('bio_text'); ?>

            </div>   <!-- end desciption div -->

        </div>   <!-- end .image div -->


    </div>   <!-- end profile page mobile  -->


<?php //include 'projects.php'; ?>
    <?php get_template_part( 'template-parts/content', 'projects' ); ?>

<?php //include 'footer.php'; ?>
<?php
get_footer();
