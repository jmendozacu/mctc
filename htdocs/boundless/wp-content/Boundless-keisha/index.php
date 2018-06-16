<?php
/**
 * Template Name: Home Page
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
            <section>
                <div class="angle-behind">

                </div>
                <div id="first" class="angle welcome">
                    <h2 class="header-wrap">
                        <span>we are boundless
                    </span>
                    </h2>
                    <div class="angle-inner">
                        <article class="content">
                            <div data-lining>
                                <p>Typography (from the Greek words τύπος typos "form" and γράφειν graphein "to write")
                                    is the art and technique of arranging type to make written language most appealing
                                    to learning and recognition. The arrangement of type involves selecting typefaces,
                                    point size, line length</p>
                                <p>line-spacing (leading), letter-spacing (tracking), and adjusting the space within
                                    letters pairs (kerning[2]). Type design is a closely related craft, sometimes
                                    considered part of typography; most typographers do not design typefaces, and some
                                    type designers do not consider themselves typographers. In modern times, typography
                                    has been put in film, television and online broadcasts to add emotion to
                                    communication.</p>
                            </div>
                        </article><!-- .content -->
                    </div><!-- .angle-inner -->
                    <blockquote>
                        <h3 class="bottom-header">May 3 - 4<br>
                            <small>Minneapolis Community <br>& Technical College</small>
                        </h3>
                    </blockquote>
                </div><!-- .angle -->
            </section>

            <section class="sec-portfolio">
                <div class="angle-behind"></div>

                <div id="second" class="angle portfolio">
                    <div class="stripe stripe-3 stripe-first"></div>
                    <div class="stripe stripe-2"></div>
                    <div class="stripe stripe-1"></div>

                    <div class="angle-inner">
                        <a href="#" class="portfolio-btn">view our portfolio</a>
                    </div><!-- .angle-inner -->

                    <div class="stripe stripe-1"></div>
                    <div class="stripe stripe-2"></div>
                    <div class="stripe stripe-3 stripe-last"></div>
                </div><!-- .angle -->

                <div class="web-full on-mobile">
                    <a href="http://google.com">web</a>
                </div>
                <div class="print-full on-mobile">
                    <a href="http://google.com">Print</a>
                </div>
            </section>

            <section>
                <div class="angle-behind">
                    <div id="map"></div>
                </div>
                <div id="third" class="angle location">
                    <h2 class="location-wrap">we are boundless</h2>
                    <div class="angle-inner">
                        <article class="content">
                            <div data-lining>
                                <p>Typography (from the Greek words τύπος typos "form" and γράφειν graphein "to write")
                                    is the art and technique of arranging type to make written language most appealing
                                    to learning and recognition. The arrangement of type involves selecting typefaces,
                                    point size, line length</p>
                                <p>line-spacing (leading), letter-spacing (tracking), and adjusting the space within
                                    letters pairs (kerning[2]). Type design is a closely related craft, sometimes
                                    considered part of typography; most typographers do not design typefaces, and some
                                    type designers do not consider themselves typographers. In modern times, typography
                                    has been put in film, television and online broadcasts to add emotion to
                                    communication.</p>
                            </div>
                        </article><!-- .content -->
                    </div><!-- .angle-inner -->
                    <blockquote>
                        <h3 class="bottom-header">May 3 - May 4<br>
                            <small>Minneapolis Community <br> & Technical College</small>
                        </h3>
                    </blockquote>
                </div><!-- .angle -->
            </section>
            <section>
                <div class="angle-behind">
                </div>
                <div class="">
                    <div class="angle-inner">
                        <section class="press">
                            press
                        </section>
                    </div><!-- .angle-inner -->
                </div><!-- .angle -->
            </section>
<?php get_footer();