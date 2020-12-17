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
<script>
// begin jQuery
( function( $ ) {

////////////////////////////
// Map
////////////////////////////

var $landObj = $('#land-objekt path');
var $nameObj = $('#land-namen image');

$landObj.on('click', function () {
    gsap.to(".poup-map", {duration: 0.3, ease: "back.out(1)", scale: 0, transformOrigin:"50% 50%"});
    let $modalOb = $(".popup-" + $(this).attr('id')).show();
    gsap.to($modalOb, {duration: 0.5, ease: "back.out(1)", scale: 1, opacity: 1,transformOrigin:"50% 50%"});
});

$nameObj.on('click', function () {
    gsap.to(".poup-map", {duration: 0.3, ease: "back.out(1)", scale: 0, transformOrigin:"50% 50%"});
    let $modalOb = $(".popup-" + $(this).attr('class')).show();
    gsap.to($modalOb, {duration: 0.5, ease: "back.out(1)", scale: 1, opacity: 1, transformOrigin:"50% 50%"});
});

$(".close-popup, .close-popup::after").on('click', function () {
    gsap.to(".poup-map", {duration: 0.3, ease: "back.out(1)", scale: 0, opacity: 0, transformOrigin:"50% 50%"});
});

// Hover for Lands
$landObj.on('mouseenter', function(e) {
  $(this).addClass('active');
  gsap.to($("." + $(this).attr('id')), 0.3, {scale: 1.4, delay: 0.1, transformOrigin:"50% 50%", ease: "power2.out"});
});
$landObj.on('mouseleave', function(e) {
  $(this).removeClass('active');
  gsap.to($("." + $(this).attr('id')), 0.3, {scale: 1, delay: 0.1, transformOrigin:"50% 50%"});
});

// Hover for Names
$nameObj.on('mouseenter', function(e) {
  $("." + $(this).attr('id')).addClass('active');
  gsap.to($(this), 0.3, {scale: 1.4, delay: 0.1, transformOrigin:"50% 50%", ease: "power2.out"});
});
$nameObj.on('mouseleave', function(e) {
  $("." + $(this).attr('id')).removeClass('active');
  gsap.to($(this), 0.3, {scale: 1, delay: 0.1, transformOrigin:"50% 50%"});
});

// end jQuery
} )( jQuery );
</script>