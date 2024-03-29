<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
    /**
     * Load theme's JavaScript and CSS sources.
     */
    function understrap_scripts() {
        // Get the theme data.
        $the_theme     = wp_get_theme();
        $theme_version = $the_theme->get( 'Version' );

        $unternehmen = get_theme_mod('sinnovativ_unternehmen');

        if($unternehmen == "velafrica"){
            $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme-velafrica.min.css' );
            wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme-velafrica.min.css', array(), $css_version );
            wp_enqueue_style( 'slickSliderStyles', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array('understrap-styles'));
            wp_enqueue_style( 'slickSliderStylesTheme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array('slickSliderStyles'));
        } else if($unternehmen == "dreigaenger"){
            $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme-dreigaenger.min.css' );
            wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme-dreigaenger.min.css', array(), $css_version );
        } else if($unternehmen == "wege") {
            $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme-wege.min.css' );
            wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme-wege.min.css', array(), $css_version );
        } else if($unternehmen == "sinnovativ") {
            $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme-sinnovativ.min.css' );
            wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme-sinnovativ.min.css', array(), $css_version );
        } else {
            $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme-drahtesel.min.css' );
            wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme-drahtesel.min.css', array(), $css_version );
        }

        wp_enqueue_script( 'jquery' );

        $js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
        wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
