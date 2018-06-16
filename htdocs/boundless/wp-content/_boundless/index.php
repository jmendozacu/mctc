<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package boundless
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="angle demo demo-3" id="demo-3">
                <div class="angle-inner">
                    <div class="content">
                        <h2>What is typography</h2>
                        <div data-lining data-effect="slideInFromLeft" >
                            <p>Typography (from the Greek words τύπος typos "form" and γράφειν graphein "to write") is the art and technique of arranging type to make written language most appealing to learning and recognition. The arrangement of type involves selecting typefaces, point size, line length</p>
                            <p>line-spacing (leading), letter-spacing (tracking), and adjusting the space within letters pairs (kerning[2]). Type design is a closely related craft, sometimes considered part of typography; most typographers do not design typefaces, and some type designers do not consider themselves typographers. In modern times, typography has been put in film, television and online broadcasts to add emotion to communication.</p>
                        </div>
                        <h3>Header 3</h3>
                        <h4>Minneapolis Community <br>and Technical College</h4>
                    </div>
                </div>
            </div>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

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

		endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
