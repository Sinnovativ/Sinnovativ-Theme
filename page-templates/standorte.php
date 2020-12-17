<?php
/**
 * Template Name: Standorte - Afrikakarte
 *
 * Template for displaying the the Map
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

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

<?php $standorte_karte = get_field('standorte_karte'); ?>

<div class="poup-map popup-gambia-obj">
    <span class="close-popup"><span></span><span></span></span>
    <?php echo $standorte_karte['gambia']; ?>      
</div>
<div class="poup-map popup-burkina-obj">
    <span class="close-popup"><span></span><span></span></span>
    <?php echo $standorte_karte['burkina_faso']; ?>      
</div>
<div class="poup-map popup-ghana-obj">
    <span class="close-popup"><span></span><span></span></span>
    <?php echo $standorte_karte['ghana']; ?>      
</div>
<div class="poup-map popup-elfen-obj">
    <span class="close-popup"><span></span><span></span></span>
    <?php echo $standorte_karte['elfenbeinkuste']; ?>      
</div>
<div class="poup-map popup-tansania-obj">
    <span class="close-popup"><span></span><span></span></span>
    <?php echo $standorte_karte['tansania']; ?>      
</div>
<div class="poup-map popup-madagaskar-obj">
    <span class="close-popup"><span></span><span></span></span>
    <?php echo $standorte_karte['madagaskar']; ?>      
</div>
<div class="poup-map popup-sudafrika-obj">
    <span class="close-popup"><span></span><span></span></span>
    <?php echo $standorte_karte['sudafrika']; ?>      
</div>

<?php get_footer(); ?>
