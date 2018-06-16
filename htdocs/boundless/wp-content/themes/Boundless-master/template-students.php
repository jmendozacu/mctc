<?php
/**
 * Template Name: All Students
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package boundless
 */

get_header(); ?>

    <div id="template-students-wrapper">

        <section class="profiles-filter">  <!-- begin profies-filter navigation section -->

            <ul>
                <li class="box right-skew boundless-button"><h2 id="show-web" class="filter-button" data-filter=".Web">web</h2></li>
                <li class="center-skew"><h2 id="show-both" class="filter-button" data-filter=".Web.Print">web + print</h2></li>
                <li class="box left-skew boundless-button"><h2 id="show-print" class="filter-button" data-filter=".Print">print</h2></li>
            </ul>

        </section>   <!-- end profies-filter navigation section -->

        <section class="image-grid">  <!-- begin image-grid section -->

            <ul>
                <?php $args = array(
                    'post_type' => 'student' ,
                    'orderby' => 'title',
                    'order'   => 'ASC'
                    );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li class="image-container <?php
                    if (get_the_terms($post->ID, 'major')) {
                        $taxonomy_ar = get_the_terms($post->ID, 'major');
                        $output = '';
                        foreach ($taxonomy_ar as $taxonomy_term) {
                            $output .= ''. $taxonomy_term->name .' ';
                        }
                        $output .= '';
                        echo $output;
                    } ?>">
                    <a href="<?php echo the_permalink();?>">
                        <?php
                        $image = get_field('student_image');
                        if( !empty($image) ): ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php else : ?>
                            <img src=" http://sandboxdev.boundless.show/wp-content/uploads/2017/03/brian-1.jpg" alt="student">
                        <?php endif; ?>
                        <h6><?php echo the_title(); ?></h6>
                        </a>
                   </li>
                <?php endwhile;?>

            </ul>  <!--  end grid list    -->

        </section>     <!-- end image-grid section -->


    </div>   <!-- end template students wrapper -->

<?php
get_footer();