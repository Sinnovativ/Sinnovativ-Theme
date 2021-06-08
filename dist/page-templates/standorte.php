<?php
/**
 * Template Name: Velafrica - Standorte (Animation)
 *
 * Template for displaying the the Map
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

// Get Standort Values
$standortArray = get_field('future');
$standortFaso = get_field('faso');
$standortVijana = get_field('vijana');
$standortBittaye = get_field('bittaye');
$standortSport = get_field('sport');
$standortSweetdale = get_field('sweetdale');
$standortJokes = get_field('jokes');
$standortArusha = get_field('arusha');
$standortCentre = get_field('centre');

?>

<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row">

            <!-- Do the left sidebar check -->
            <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

            <main class="site-main" id="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="post-image" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>)">
                    </div>

                    <div class="container mt-5">

                                            <?php get_template_part( 'loop-templates/content', 'page' ); ?>
                    </div>


                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; // end of the loop. ?>


                <div class="container">
                    <section id="standorte">
                        <?php echo file_get_contents(get_stylesheet_directory_uri() . "/img/svg/map.svg"); ?>
                    </section>
                </div>

            </main><!-- #main -->

            <!-- Do the right sidebar check -->
            <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<div class="poup-map popup-future">
    <?php $standortArray = get_field('future'); ?>
    <img class="standort-icon" src="<?php echo get_stylesheet_directory_uri() . "/img/map/shop.png" ?>">
    <span class="close-popup"><span></span><span></span></span>
    <h2><?php echo $standortArray['name']; ?></h2>

    <?php 
    $images = $standortArray['bilder'];
    if( $images ): ?>
        <div class="standort-slider">
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo esc_url($image['sizes']['slider']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="scroll-wrapper">
        <div class="standort-text">
            <?php echo $standortArray['beschreibung'] ?>
        </div>
        <div class="map-icon-block-wrapper">
            <?php if($standortArray['gelieferte_velos']): ?>
                <div class="map-icon-block">
                    <div class="map-icon velo-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/velo.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['gelieferte_velos']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('gelieferte Velos (im letzten Jahr)', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['angestellte']): ?>
                <div class="map-icon-block">
                    <div class="map-icon leute-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/leute.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['angestellte']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Angestellte', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['ausbildungsplatze']): ?>
                <div class="map-icon-block">
                    <div class="map-icon haus-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/haus.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['ausbildungsplatze']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Ausbildungsplätze', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['zweigstellen']): ?>
                <div class="map-icon-block">
                    <div class="map-icon zweigstellen-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/standort.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['zweigstellen']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Zweigstellen', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>                                           
        </div>
    </div>
</div>

<div class="poup-map popup-faso">
    <?php   $standortArray = array();
            $standortArray = get_field('faso');
    ?>
    <img class="standort-icon" src="<?php echo get_stylesheet_directory_uri() . "/img/map/zentrum.png" ?>">
    <span class="close-popup"><span></span><span></span></span>
    <h2><?php echo $standortArray['name']; ?></h2>

    <?php 
    $images = $standortArray['faso_bilder'];
    if( $images ): ?>
        <div class="standort-slider">
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo esc_url($image['sizes']['slider']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="scroll-wrapper">
        <div class="standort-text">
            <?php echo $standortArray['beschreibung'] ?>
        </div>
        <div class="map-icon-block-wrapper">
            <?php if($standortArray['gelieferte_velos']): ?>
                <div class="map-icon-block">
                    <div class="map-icon velo-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/velo.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['gelieferte_velos']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('gelieferte Velos (im letzten Jahr)', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['angestellte']): ?>
                <div class="map-icon-block">
                    <div class="map-icon leute-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/leute.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['angestellte']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Angestellte', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['ausbildungsplatze']): ?>
                <div class="map-icon-block">
                    <div class="map-icon haus-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/haus.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['ausbildungsplatze']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Ausbildungsplätze', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['zweigstellen']): ?>
                <div class="map-icon-block">
                    <div class="map-icon zweigstellen-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/standort.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['zweigstellen']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Zweigstellen', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>                                           
        </div>
    </div>
</div>

<div class="poup-map popup-vijana">
    <?php   $standortArray = array();
            $standortArray = get_field('vijana'); ?>
    <img class="standort-icon" src="<?php echo get_stylesheet_directory_uri() . "/img/map/zentrum.png" ?>">
    <span class="close-popup"><span></span><span></span></span>
    <h2><?php echo $standortArray['name']; ?></h2>    
    <?php 
    $images = $standortArray['bilder'];
    if( $images ): ?>
        <div class="standort-slider">
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo esc_url($image['sizes']['slider']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="scroll-wrapper">
        <div class="standort-text">
            <?php echo $standortArray['beschreibung'] ?>
        </div>
        <div class="map-icon-block-wrapper">
            <?php if($standortArray['gelieferte_velos']): ?>
                <div class="map-icon-block">
                    <div class="map-icon velo-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/velo.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['gelieferte_velos']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('gelieferte Velos (im letzten Jahr)', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['angestellte']): ?>
                <div class="map-icon-block">
                    <div class="map-icon leute-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/leute.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['angestellte']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Angestellte', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['ausbildungsplatze']): ?>
                <div class="map-icon-block">
                    <div class="map-icon haus-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/haus.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['ausbildungsplatze']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Ausbildungsplätze', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['zweigstellen']): ?>
                <div class="map-icon-block">
                    <div class="map-icon zweigstellen-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/standort.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['zweigstellen']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Zweigstellen', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>                                           
        </div>
    </div>
</div>

<div class="poup-map popup-bittaye">
    <?php $standortArray = get_field('bittaye'); ?>
    <img class="standort-icon" src="<?php echo get_stylesheet_directory_uri() . "/img/map/shop.png" ?>">
    <span class="close-popup"><span></span><span></span></span>
    <h2><?php echo $standortArray['name']; ?></h2>

    <?php 
    $images = $standortArray['bilder'];
    if( $images ): ?>
        <div class="standort-slider">
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo esc_url($image['sizes']['slider']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="scroll-wrapper">
        <div class="standort-text">
            <?php echo $standortArray['beschreibung'] ?>
        </div>
        <div class="map-icon-block-wrapper">
            <?php if($standortArray['gelieferte_velos']): ?>
                <div class="map-icon-block">
                    <div class="map-icon velo-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/velo.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['gelieferte_velos']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('gelieferte Velos (im letzten Jahr)', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['angestellte']): ?>
                <div class="map-icon-block">
                    <div class="map-icon leute-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/leute.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['angestellte']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Angestellte', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['ausbildungsplatze']): ?>
                <div class="map-icon-block">
                    <div class="map-icon haus-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/haus.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['ausbildungsplatze']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Ausbildungsplätze', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['zweigstellen']): ?>
                <div class="map-icon-block">
                    <div class="map-icon zweigstellen-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/standort.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['zweigstellen']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Zweigstellen', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>                                           
        </div>
    </div>
</div>

<div class="poup-map popup-sport">
    <?php $standortArray = get_field('sport'); ?>
    <img class="standort-icon" src="<?php echo get_stylesheet_directory_uri() . "/img/map/shop.png" ?>">
    <span class="close-popup"><span></span><span></span></span>
    <h2><?php echo $standortArray['name']; ?></h2>

    <?php 
    $images = $standortArray['sport_bilder'];
    if( $images ): ?>
        <div class="standort-slider">
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo esc_url($image['sizes']['slider']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="scroll-wrapper">
        <div class="standort-text">
            <?php echo $standortArray['beschreibung'] ?>
        </div>
        <div class="map-icon-block-wrapper">
            <?php if($standortArray['gelieferte_velos']): ?>
                <div class="map-icon-block">
                    <div class="map-icon velo-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/velo.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['gelieferte_velos']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('gelieferte Velos (im letzten Jahr)', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['angestellte']): ?>
                <div class="map-icon-block">
                    <div class="map-icon leute-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/leute.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['angestellte']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Angestellte', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['ausbildungsplatze']): ?>
                <div class="map-icon-block">
                    <div class="map-icon haus-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/haus.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['ausbildungsplatze']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Ausbildungsplätze', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['zweigstellen']): ?>
                <div class="map-icon-block">
                    <div class="map-icon zweigstellen-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/standort.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['zweigstellen']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Zweigstellen', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>                                           
        </div>
    </div>
</div>

<div class="poup-map popup-sweetdale">
    <?php $standortArray = get_field('sweetdale'); ?>
    <img class="standort-icon" src="<?php echo get_stylesheet_directory_uri() . "/img/map/zentrum.png" ?>">
    <span class="close-popup"><span></span><span></span></span>
    <h2><?php echo $standortArray['name']; ?></h2>

    <?php 
    $images = $standortArray['bilder'];
    if( $images ): ?>
        <div class="standort-slider">
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo esc_url($image['sizes']['slider']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="scroll-wrapper">
        <div class="standort-text">
            <?php echo $standortArray['beschreibung'] ?>
        </div>
        <div class="map-icon-block-wrapper">
            <?php if($standortArray['gelieferte_velos']): ?>
                <div class="map-icon-block">
                    <div class="map-icon velo-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/velo.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['gelieferte_velos']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('gelieferte Velos (im letzten Jahr)', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['angestellte']): ?>
                <div class="map-icon-block">
                    <div class="map-icon leute-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/leute.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['angestellte']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Angestellte', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['ausbildungsplatze']): ?>
                <div class="map-icon-block">
                    <div class="map-icon haus-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/haus.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['ausbildungsplatze']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Ausbildungsplätze', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['zweigstellen']): ?>
                <div class="map-icon-block">
                    <div class="map-icon zweigstellen-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/standort.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['zweigstellen']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Zweigstellen', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>                                           
        </div>
    </div>
</div>

<div class="poup-map popup-jokes">
    <?php $standortArray = get_field('jokes'); ?>
    <img class="standort-icon" src="<?php echo get_stylesheet_directory_uri() . "/img/map/shop.png" ?>">
    <span class="close-popup"><span></span><span></span></span>
    <h2><?php echo $standortArray['name']; ?></h2>

    <?php 
    $images = $standortArray['bilder'];
    if( $images ): ?>
        <div class="standort-slider">
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo esc_url($image['sizes']['slider']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="scroll-wrapper">
        <div class="standort-text">
            <?php echo $standortArray['beschreibung'] ?>
        </div>
        <div class="map-icon-block-wrapper">
            <?php if($standortArray['gelieferte_velos']): ?>
                <div class="map-icon-block">
                    <div class="map-icon velo-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/velo.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['gelieferte_velos']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('gelieferte Velos (im letzten Jahr)', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['angestellte']): ?>
                <div class="map-icon-block">
                    <div class="map-icon leute-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/leute.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['angestellte']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Angestellte', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['ausbildungsplatze']): ?>
                <div class="map-icon-block">
                    <div class="map-icon haus-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/haus.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['ausbildungsplatze']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Ausbildungsplätze', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['zweigstellen']): ?>
                <div class="map-icon-block">
                    <div class="map-icon zweigstellen-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/standort.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['zweigstellen']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Zweigstellen', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>                                           
        </div>
    </div>
</div>

<div class="poup-map popup-arusha">
    <?php $standortArray = get_field('arusha'); ?>
    <img class="standort-icon" src="<?php echo get_stylesheet_directory_uri() . "/img/map/zentrum.png" ?>">
    <span class="close-popup"><span></span><span></span></span>
    <h2><?php echo $standortArray['name']; ?></h2>

    <?php 
    $images = $standortArray['bilder'];
    if( $images ): ?>
        <div class="standort-slider">
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo esc_url($image['sizes']['slider']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="scroll-wrapper">
        <div class="standort-text">
            <?php echo $standortArray['beschreibung'] ?>
        </div>
        <div class="map-icon-block-wrapper">
            <?php if($standortArray['gelieferte_velos']): ?>
                <div class="map-icon-block">
                    <div class="map-icon velo-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/velo.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['gelieferte_velos']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('gelieferte Velos (im letzten Jahr)', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['angestellte']): ?>
                <div class="map-icon-block">
                    <div class="map-icon leute-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/leute.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['angestellte']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Angestellte', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['ausbildungsplatze']): ?>
                <div class="map-icon-block">
                    <div class="map-icon haus-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/haus.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['ausbildungsplatze']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Ausbildungsplätze', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['zweigstellen']): ?>
                <div class="map-icon-block">
                    <div class="map-icon zweigstellen-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/standort.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['zweigstellen']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Zweigstellen', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>                                           
        </div>
    </div>
</div>

<div class="poup-map popup-centre">
    <?php $standortArray = get_field('centre'); ?>
    <img class="standort-icon" src="<?php echo get_stylesheet_directory_uri() . "/img/map/zentrum.png" ?>">
    <span class="close-popup"><span></span><span></span></span>
    <h2><?php echo $standortArray['name']; ?></h2>

    <?php 
    $images = $standortArray['bilder'];
    if( $images ): ?>
        <div class="standort-slider">
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo esc_url($image['sizes']['slider']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="scroll-wrapper">
        <div class="standort-text">
            <?php echo $standortArray['beschreibung'] ?>
        </div>
        <div class="map-icon-block-wrapper">
            <?php if($standortArray['gelieferte_velos']): ?>
                <div class="map-icon-block">
                    <div class="map-icon velo-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/velo.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['gelieferte_velos']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('gelieferte Velos (im letzten Jahr)', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['angestellte']): ?>
                <div class="map-icon-block">
                    <div class="map-icon leute-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/leute.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['angestellte']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Angestellte', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['ausbildungsplatze']): ?>
                <div class="map-icon-block">
                    <div class="map-icon haus-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/haus.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['ausbildungsplatze']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Ausbildungsplätze', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($standortArray['zweigstellen']): ?>
                <div class="map-icon-block">
                    <div class="map-icon zweigstellen-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . "/img/map/standort.svg" ?>">
                    </div>
                    <div class="map-number">
                        <?php echo $standortArray['zweigstellen']; ?>
                    </div>
                    <div class="map-name">
                        <?php _e('Zweigstellen', 'animationen-frontend'); ?>
                    </div>
                </div>
            <?php endif; ?>                                           
        </div>
    </div>
</div>


<?php get_footer(get_theme_mod('sinnovativ_unternehmen')); ?>
<script>
// begin jQuery
( function( $ ) {

////////////////////////////
// Map
////////////////////////////

var $standortObj = $('.clickme');
var currTrans = nameObjb = posxCurrent = posxMod = "";

$standortObj.on('click', function () {
    gsap.to(".poup-map", {duration: 0.3, ease: "back.out(1)", scale: 0, transformOrigin:"50% 50%"});
    let $modalOb = $(".popup-" + $(this).attr('id')).show();
    gsap.to($modalOb, {duration: 0.5, ease: "back.out(1)", scale: 1, opacity: 1,transformOrigin:"50% 50%"});
});

$(".close-popup, .close-popup::after").on('click', function () {
    gsap.to(".poup-map", {duration: 0.3, ease: "back.out(1)", scale: 0, opacity: 0, transformOrigin:"50% 50%"});
});

// // // Hover
$standortObj.each(function() {
    // Get X Position of Name
    var nameObj = $(this).parent().find(".standort-name");
    var currTrans1 = nameObj.attr('transform').split(/[()]/)[1];
    //var currTrans2 = nameObj.css('transform').split(/[()]/)[1];
    var posxCurrent = parseInt(currTrans1.split(' ')[0], 10);
    //var posxCurrent2 = parseInt(currTrans2.split(',')[4], 10);

    var posxMod = posxCurrent + 40;

    $(this).hover(function () {
        $(this).addClass('active');
        gsap.to($(this), {scale: 2, transformOrigin:"50% 50%", ease: "power2.out"});
        gsap.to(nameObj, {opacity: 1, x: posxMod, transformOrigin:"50% 50%", ease: "power2.out"});
    },function () {
        $(this).removeClass('active');
        gsap.to($(this), {scale: 1.33, transformOrigin:"50% 50%"});
        gsap.to($(this).parent().find(".standort-name"), {opacity: 0, x: posxCurrent, transformOrigin:"50% 50%"});
    });
});


$(document).ready(function(){
  $('.standort-slider').slick({
    lazyLoad: 'ondemand',
    infinite: true,
    slidesToShow: 1,
    adaptiveHeight: true
  });
});


// end jQuery
} )( jQuery );
</script>