<?php
/**
 * Template Name: Timeline - Animation
 *
 * Template for displaying the the Timeline
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
                    <section id="timeline">
        
                        <?php if( have_rows('timelines') ): ?>
                            <?php $counter = 0; ?>
                            <?php while( have_rows('timelines') ): the_row();
                                $image = get_sub_field('bild');
                                $counter++; ?>

                                <div class="timeline-block timeline-block-<?php echo $counter; ?>">
                                    <div class="tl-text-box">
                                        <?php the_sub_field('text'); ?>
                                    </div>
                                    <div class="path-wrapper">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div class="tl-number"><?php the_sub_field('jahr'); ?></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                    <div class="tl-image-box">
                                        <?php if($image): ?>
                                            <img src="<?php echo $image ?>" >
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>
                        
                    </section>
                </div>

            </main><!-- #main -->

            <!-- Do the right sidebar check -->
            <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(get_theme_mod('sinnovativ_unternehmen')); ?>
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