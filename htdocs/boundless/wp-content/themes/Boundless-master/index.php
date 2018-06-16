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
    <style>
        .home .site-branding{
            position: relative;
        }
        .home .site-branding:after{
            content: '';
            position: absolute;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background-color: rgb(88, 89, 91);
            z-index:-1000;

        }
    </style>
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
                                <p>Mission Statement: “We are multidimensional designers and developers creating work
                                    that embodies the breadth of our passion. Delight in the array of possibilities we
                                    have to showcase.”
                                </p>

                                <p>The Show: Come delight in the work of 47 web and graphic designers at the 2017 web
                                    and graphic design portfolio show, Boundless! This event allows each guest the
                                    opportunity to view a wide variety of projects forged from creative passion — and
                                    many late nights — and meet the artists behind the work.</p>

                            </div>
                        </article><!-- .content -->
                    </div><!-- .angle-inner -->
                    <blockquote>
                        <h3 class="bottom-header">May 3 - 4<br>
                            <p>Minneapolis Community <br>&amp; Technical College</p>
                            <small>Where: 1501 Hennepin Ave, Minneapolis, room L300 <br>
                                (Follow the signs at all main entrances of T Building and/or Whitney Hall (include map).
                                There are also directional signs at the parking entrances of every level of ramp and
                                follow the signs the whole way.)
                            </small>
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
                        <a href="/students" class="portfolio-btn">view our portfolio</a>
                    </div><!-- .angle-inner -->

                    <div class="stripe stripe-1"></div>
                    <div class="stripe stripe-2"></div>
                    <div class="stripe stripe-3 stripe-last"></div>
                </div><!-- .angle -->

                <div class="web-full on-mobile">
                    <a href="/students#print">web</a>
                </div>
                <div class="print-full on-mobile">
                    <a href="/students#web">Print</a>
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
                                <p>Alumni Panel:
                                    May 2
                                    1pm: Alumni panel
                                    Laurel Johnson: Laurel is a front-end developer at Fjorge
                                    Claire Campbell: ??
                                    Aaron Hurst: Co-owner of Conjure Shop, a design &amp; marketing company (free-lance)
                                    Jerrald (Jay) Spencer: Freelance, graphic designer U of M
                                    Damien Kirchoff: Digital designer at Snap Agency
                                    Rudy Fig (aka Sierra Riggs): Freelance illustrator/designer Rudy Fig Fine Art and
                                    Design</p>

                            </div>
                        </article><!-- .content -->
                    </div><!-- .angle-inner -->
                    <blockquote>
                        <h3 class="bottom-header">May 3 - May 4<br>
                            <small>Schedule:
                                May 2nd show runs from 10AM-8PM
                                Keynote Speaker: Tim Brunelle (BBDO Minneapolis) 5:00 PM Opening Reception: starting at
                                5:30 PM
                                May 3rd show runs from 10AM-7PM
                                Keynote Speaker: Michelle Schulp (Marktime Media) May 3rd at 5:00 PM
                            </small>
                        </h3>
                    </blockquote>
                </div><!-- .angle -->
            </section>

            <section class="sec-press">
                <h2>press</h2>
            </section>

<?php get_footer();