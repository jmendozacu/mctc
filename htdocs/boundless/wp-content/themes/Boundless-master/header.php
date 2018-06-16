<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boundless
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page">
    <!--    <a class="skip-link screen-reader-text" href="#content">-->
    <?php //esc_html_e('Skip to content', 'boundless'); ?><!--</a>-->
    <header id="masthead" class="site-header" role="banner">
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <?php if (is_front_page()) { ?>
                <!--                show no navigation-->
            <?php } else { ?>
                <div class="header-logo">
                    <a href="/">
<!--                        <img src="--><?php //echo get_template_directory_uri() ?><!--/images/Insignia.png" alt="">-->
                        <?php  get_template_part('template-parts/boundless', 'icon'); ?>
                    </a>
                </div>
            <?php } ?>

            <span style="font-size:30px;cursor:pointer" id="toggle">
                <svg class="svg-toggle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <polygon class="base" points="45.4 0 7.61 18.75 7.61 91.25 45.4 110 45.4 0"></polygon>
                    <image class="cls-3" width="56" height="91" transform="translate(0 9.6)"
                           xlink:href="data:image/png;base64,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"></image>
                    <polygon class="tri" points="45.4 55 7.61 18.75 7.61 91.25 45.4 55"></polygon>
                    <polygon class="plus" id="svg-rotate"
                             points="33.36 52.9 24.27 52.9 24.27 43.8 20.07 43.8 20.07 52.9 10.97 52.9 10.97 57.1 20.07 57.1 20.07 66.2 24.27 66.2 24.27 57.1 33.36 57.1 33.36 52.9"></polygon>
                    </svg>

            </span>
            <div class="overlay" id="myNav">
                <div class="overlay-content">
                    <div class="name">
<!--                        <h2>Boundless</h2>-->
                    </div>
                    <?php echo wp_nav_menu( array('theme_location' => 'Primary', 'menu_id' => 'menu-1')); ?>
                    <?php //var_dump(wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu'))); ?>
                </div>
            </div>
        </nav><!-- #site-navigation -->


        <?php if (is_front_page()) { ?>
        <div class="site-branding">
<!--            <img src="--><?php //echo get_template_directory_uri() ?><!--/images/logos/boundless-splash.svg" alt="">-->
<?php  get_template_part('template-parts/boundless', 'splash'); ?>
        </div><!-- .site-branding -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">

        <?php }else { ?>
        </header><!-- #masthead -->
<!--else-->
        <div id="content" class="site-content">
    <?php }; ?>