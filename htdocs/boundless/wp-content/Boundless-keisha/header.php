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
<!--    <a class="skip-link screen-reader-text" href="#content">--><?php //esc_html_e('Skip to content', 'boundless'); ?><!--</a>-->
    <header id="masthead" class="site-header" role="banner">
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <span style="font-size:30px;cursor:pointer" id="toggle">
                <svg class="svg-toggle" version="1.1" id="SVG-TOGGLE" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 27 80.3" xml:space="preserve">
                <polygon class="base" points="27,0 0,13.4 0,65.2 27,78.6 " ></polygon>
                <polygon class="tri" points="27,39.3 0,13.4 0,65.2 "></polygon>
                <polygon class="plus" id="svg-rotate" points="18.4,37.8 11.9,37.8 11.9,31.3 8.9,31.3 8.9,37.8 2.4,37.8 2.4,40.8 8.9,40.8 8.9,47.3 11.9,47.3
                    11.9,40.8 18.4,40.8 "></polygon>
                </svg>
            </span>
            <div class="overlay" id="myNav">
                <div class="overlay-content">
                    <div class="name"><h2>Boundless</h2>
                    </div>
                    <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>
                </div>
            </div>
        </nav><!-- #site-navigation -->


<?php if (is_page_template('index.php')){ ?>
        <div class="site-branding">
            <img src="<?php echo get_template_directory_uri() ?>/images/logos/logo-main.png" alt="">
        </div><!-- .site-branding -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
<?php }else{ ?>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
<?php } ?>