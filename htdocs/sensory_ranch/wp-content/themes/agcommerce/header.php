<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agcommerce
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'agcommerce' ); ?></a>
	<header id="masthead" class="site-header <?php if( is_front_page() ) : ?> front-page-masthead" style="background: url('<?php the_post_thumbnail_url(); endif; ?>')" role="banner">
            <a href="#" data-activates="slide-out" class="button-collapse on-mobile"><i class="fa fa-bars fa-2x" aria-hidden="true">menu</i></a>
            <?php
            $menu_img = get_the_post_thumbnail_url();
            $new_menu_item = "<li class=\"home-link\"><div class=\"userView\"><div class=\"background\"><img src=\"" . $menu_img . "\"/></div><a href=\"#\"><span class=\"white-text name\"><h4>Agrisense Technology</h4></span></a>
        </li>"; ?>
            <ul id="slide-out" class="side-nav primary-menu">
            <?php
                echo $new_menu_item;
                wp_nav_menu(
                    $args = array(
                        'theme_location'    => 'menu-mobile',
                        'items_wrap'        => '%3$s',
                    )
                ); ?>
            </ul>
            <div class="site-branding container">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->
            <nav id="site-navigation" class="main-navigation hide-on-med-and-down" role="navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'    => 'menu-1',
                        'menu_id'           => 'primary-menu',
                        'menu_class'        => 'header-nav'
                    )
                ); ?>
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </nav><!-- #site-navigation -->
            <?php if( is_front_page() ) :
                get_template_part( 'template-parts/front-page-header' ); ?>
            </div><!-- .front-page-masthead -->
        <?php endif; ?>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
