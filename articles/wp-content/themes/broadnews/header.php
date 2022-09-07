<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BroadNews
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    } else {
        do_action('wp_body_open');
    } ?>

    <?php
    $enable_preloader = broadnews_get_option('enable_site_preloader');
    if (1 == $enable_preloader) :
    ?>
        <div id="af-preloader">
            <div id="loader-wrapper">
                <div id="loader">
                    <div class="aft-cube1 aft-cube"></div>
                    <div class="aft-cube2 aft-cube"></div>
                    <div class="aft-cube4 aft-cube"></div>
                    <div class="aft-cube3 aft-cube"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div id="page" class="site af-whole-wrapper">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'broadnews'); ?></a>

        <?php

        do_action('broadnews_action_header_section');
        ?>

        
        <div class="aft-main-breadcrumb-wrapper container-wrapper">
            <?php
            if (is_single()) {
                $single_post_title_view = broadnews_get_option('single_post_title_view');
                if (($single_post_title_view == 'boxed') || ($single_post_title_view == 'title-below-image') || ($single_post_title_view == 'title-over-image')) {
                    do_action('broadnews_action_get_breadcrumb');
                }
            } else {
                do_action('broadnews_action_get_breadcrumb');
            }

            ?>
        </div>
        <div id="content" class="container-wrapper">