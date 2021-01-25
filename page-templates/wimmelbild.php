<?php
/**
 * Template Name: Wimmelbild - Animation
 *
 * Template for displaying the the WimmelBild
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


                <div class="container-animation">
                    <section id="wimmelbild">

                        <img class="wb_element wb_cargo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wimmelbild/wb_cargo.png" alt="wimmelbild cargo">
                        <img class="wb_element wb_gewerbe" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wimmelbild/wb_gewerbe.png" alt="wimmelbild gewerbe">
                        <img class="wb_element wb_klasse" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wimmelbild/wb_klasse.png" alt="wimmelbild klasse">
                        <img class="wb_element wb_mechaniker" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wimmelbild/wb_mechaniker.png" alt="wimmelbild mechaniker">
                        <img class="wb_element wb_nachwuchs" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wimmelbild/wb_nachwuchs.png" alt="wimmelbild nachwuchs">
                        <img class="wb_element wb_schule" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wimmelbild/wb_schule.png" alt="wimmelbild schule">
                        <img class="wb_element wb_statisten" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wimmelbild/wb_statisten.png" alt="wimmelbild statisten">

                        <img class="info-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wimmelbild/info_icon.svg">
                        <img class="wb_hintergrund" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wimmelbild/wb_bg.png" alt="wimmelbild hintergrund">
                    </section>
                </div>

            </main><!-- #main -->

            <!-- Do the right sidebar check -->
            <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
<script>
// begin jQuery
( function( $ ) {


ScrollTrigger.matchMedia({
  // desktop
  "(min-width: 640px)": function() {
        ////////////////////////////
        // Timeline Animation
        ////////////////////////////
        ScrollTrigger.batch(".path-wrapper div:not(.tl-number)", {
          start: "top 60%",
          end: '+=100px',
          onEnter: batch => gsap.to(batch, {opacity: 1, scale: 0.8, ease: "back.out(8)"}),
          onLeaveBack: batch => gsap.to(batch, {opacity: 0.5, scale: 0.5, overwrite: true}),
        });
        
        $('.timeline-block').each(function(){
            const tlNumber = $(this).find('.tl-number');
            const tlText = $(this).find('.tl-text-box');
            const tlImage = $(this).find('.tl-image-box');
            let timelineTl = gsap.timeline({
                scrollTrigger: { 
                    //markers: true,
                    trigger: tlNumber,
                    start: "top 60%",
                    end: "bottom 60%",
                    toggleActions: "play none none reverse",
                    onEnter: () => {
                        timelineTl.timeScale(1.0);
                    },
                    onEnterBack: () => {
                        timelineTl.timeScale(3.0);
                    }
                }
            })
            .to(tlNumber, { duration: 0.8, opacity: 1, scale: 2.2, ease: "back.out(2)" })
            .to(tlText, {duration: 0.8, x: 0, opacity: 1}, "-=0.4")
            .to(tlImage, {duration: 0.8, x: 0, opacity: 1}, "-=0.8");
        });

  },
  // mobile
  "(max-width: 639px)": function() {

        ////////////////////////////
        // Timeline Animation
        ////////////////////////////
        ScrollTrigger.batch(".path-wrapper div:not(.tl-number)", {
          start: "top 60%",
          end: '+=100px',
          onEnter: batch => gsap.to(batch, {opacity: 1, scale: 0.6, ease: "back.out(8)"}),
          onLeaveBack: batch => gsap.to(batch, {opacity: 0.5, scale: 0.4, overwrite: true}),
        });
        
        $('.timeline-block').each(function(){
            const tlNumber = $(this).find('.tl-number');
            const tlText = $(this).find('.tl-text-box');
            const tlImage = $(this).find('.tl-image-box');
            let timelineTl = gsap.timeline({
                scrollTrigger: { 
                    //markers: true,
                    trigger: tlNumber,
                    start: "top 60%",
                    end: "bottom 60%",
                    toggleActions: "play none none reverse",
                    onEnter: () => {
                        timelineTl.timeScale(1.0);
                    },
                    onEnterBack: () => {
                        timelineTl.timeScale(3.0);
                    }
                }
            })
            .to(tlNumber, { duration: 0.8, opacity: 1, scale: 1.5, ease: "back.out(2)" })
            .to(tlText, {duration: 0.8, x: 0, opacity: 1}, "-=0.4")
            .to(tlImage, {duration: 0.8, x: 0, opacity: 1}, "-=0.8");
        });

    }
});    

// end jQuery
} )( jQuery );
</script>