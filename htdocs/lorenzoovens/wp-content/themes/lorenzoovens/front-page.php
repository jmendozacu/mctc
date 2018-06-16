<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorenzoovens
 */

get_header();

if ( wp_is_mobile() == false ) {
	get_sidebar();
}
?>
<div id="primary" class="content-area col s12 m8 l8">
		<main id="main" class="site-main" role="main">
			<?php
			$args = array(
				'cat' => 30,
				'orderby' => rand,
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 1,
				'caller_get_posts'=> 1
			);
			$my_query = null;
			$my_query = new WP_Query($args);

			if( $my_query -> have_posts() ) :
				while ( $my_query -> have_posts() ) : $my_query->the_post(); ?>

				<div class="card">

					<?php if ( has_post_thumbnail() ) : ?>

						<img src="<?php echo get_the_post_thumbnail() ?>" alt=" <?php echo the_title(); ?>">

					<?php endif;

					get_template_part( 'template-parts/content', get_post_format() ); ?>

				</div><!-- .card -->

				<?php endwhile;

			endif;

			wp_reset_query();  // Restore global post data stomped by the_post().

			if ( have_posts() ) :

				if ( is_home() || is_front_page() ) : ?>
					<div class="card">
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>

							<?php endif;

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

					endif;
                    wp_reset_query(); ?>
			</div><!-- .card -->
            <div class="card services-menu">
                <h2>Services</h2>
                <div class="widget subpages">
                   <!--  <ul class="pages-list"> -->
                <?php
                $mypages = get_pages( array(
                    'child_of' => $post->ID,
                    'sort_column' => 'post_date',
                    'sort_order' => 'desc' )
                );

                foreach( $mypages as $page ) {
                    $content = $page->post_content;
                    if ( ! $content )
                        // Check for empty page
                        continue;
                        $content = apply_filters( 'the_content', $content );
                        ?>
                        <h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
                        <div class="entry"><?php echo $content; ?></div>
                    <?php
                    }
                    ?>
<?php
//                $servicesId = get_the_ID(1391);
//
//                $my_query = new WP_Query(array(
//                    'order' => 'ASC',
//                    'child_of' => 1391,
//                    'post_type' => 'page',
//                    'post_status' => 'publish'
//                ));
//
//                while($my_query->have_posts()) {
//
//                //                echo $servicesId;
//                //GET CHILD PAGES IF THERE ARE ANY
//                //                $children = get_pages(array(
//                //                    'child_of' => 1391,
//                //                    'post_type' => 'page',
//                //                    'post_status' => 'publish',
//                //                    'exclude_tree' => true));
//
//                //                var_dump($children);
//
//                $my_query->the_post();
//                //
//                //                foreach($children as $child) {
//
//                echo the_title();
//
//                if ($child->post_parent == "1391") {
////                    $args = array(
////                        'depth' => 1,
////                        'title_li' => '',
////                        'child_of' => $child->ID
////                    );
//
//                    $post_7 = get_post($child->ID);
//                    echo <!-- <li>";
//                    echo $post_7['post_title'];
//                    echo "</li>";
//
//                }
//                ?>
                    <!-- </ul> -->
                </div>
                <?php
               // }
                ?>

<!--                //DO WE HAVE SIBLINGS?-->
<!--//                $siblings =  get_pages('child_of='.$parent);-->

<!--                if( count($children) != 0) {-->
<!--                    $args = array(-->
<!--                        'depth' => 1,-->
<!--                        'title_li' => '',-->
<!--                        'child_of' => $children->ID-->
<!--                    );-->
<!---->
<!--                } elseif($parent != 0) {-->
<!--                    $args = array(-->
<!--                        'depth' => 1,-->
<!--                        'title_li' => '',-->
<!--                        'exclude' => $children->ID,-->
<!--                        'child_of' => $parent-->
<!--                    );-->
<!--                }-->
<!--                //Show pages if this page has more than one sibling-->
<!--                // and if it has children-->
<!--                if(count($siblings) > 1 && !is_null($args))-->
<!--                {?>-->
<!--                    <div class="widget subpages">-->
<!--                        <h3 class="widgettitle">Also in this Section</h3>-->
<!--                        <ul class="pages-list">-->
<!--                            --><?php //wp_list_pages($args);
//                             ?>
<!--                        </ul>-->
<!--                        --><?php
//                        var_dump($children);
//                        ?>
<!--                    </div>-->
<!--                --><?php //} ?>
			</div><!-- .card -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if( wp_is_mobile() == true ) {
	get_sidebar();
}
get_footer();
