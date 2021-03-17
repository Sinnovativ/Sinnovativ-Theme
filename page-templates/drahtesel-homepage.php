<?php
/**
 * Template Name: Drahtesel Home Page
 *
 * Template for displaying the home page
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="container-fluid">

  <div class="post-image home-image" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>)">

    <div class="frontpage-button">
      <h2><?php  _e( 'Bunt, Mutig und Sozial');  ?></h2>
      <?php  _e( 'Wir schaffen Möglichkeiten', 'Drahtesel Startseite');  ?>
    </div>    

    <!--<div class="row cta d-flex align-items-center">

        <div class="col-12 col-md-6 d-flex justify-content-end homepage-header-buttons">
          <a href="/wie-sie-helfen/velospende/" class="btn btn-secondary mr-2"><?php# _e( 'Unsere Integrationsangebote', 'Drahtesel Startseite');  ?></a>
          <a href="/wie-sie-helfen/geldspende/" class="btn btn-secondary"><?php# _e( 'Spenden', 'Drahtesel Startseite'); ?></a>
        </div>
    </div> -->
  </div>

</div>

<div class="wrapper home-page-wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?> home-news py-4" id="content">

        <div class="container">


            <div class="row">

                <div class="col-md-12 content-area" id="primary">

                    <main class="site-main" id="main" role="main">

                        <div class="einleitung">                            
                            <?php the_field('einleitung'); ?>
                        </div>

                        <?php while ( have_posts() ) : the_post(); ?>

                          <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                        <?php endwhile; // end of the loop. ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div><!-- .row end -->
        </div><!-- .container end -->


        <div id="frontpage-offers">
            <div class="container">
                <h2>Produkte und Dienstleistungen</h2>
                <div class="row">
                    <div class="col-md-12 content-area angebots-wrapper">

                        <?php if( have_rows('angebote') ): ?>
                            <?php while( have_rows('angebote') ): the_row(); ?>
                                <?php $img = get_sub_field('angebot_bild'); ?>
                                <?php $link = get_sub_field('angebot_link'); ?>

                                <div class="angebots-item">
                                    <?php if($link): ?>
                                        <a href="<?php echo $link['url']; ?>" alt="<?php echo $link['alt']; ?>" <?php echo $link['target']; ?> >
                                    <?php endif; ?>

                                        <img src="<?php echo $img['sizes']['frontpage-preview']; ?>" alt="<?php echo $img['title']; ?>">
                                        <p><strong><?php the_sub_field('angebot_titel'); ?></strong></p>
                                        <?php the_sub_field('angebot_beschreibung'); ?>

                                    <?php if($link): ?>
                                        </a>
                                    <?php endif; ?>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <h2>Was uns bewegt</h2>

            <?php
            // Show latest posts
            $the_query = new WP_Query( 'posts_per_page=4' ); ?>


            <div class="row posts-overview row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">

                <?php while ( $the_query ->have_posts() ) : $the_query -> the_post(); ?>

                  <?php

                  /*
                   * Include the Post-Format-specific template for the content.
                   * If you want to override this in a child theme, then include a file
                   * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                   */
                  get_template_part( 'loop-templates/content', get_post_format() );
                  ?>

                <?php endwhile;

                wp_reset_postdata();
                ?>
            </div>

            <div class="col-md-12">
                <div class="mehr-news center">
                  <a href="was-wir-tun/news-events/" class="btn btn-outline-primary"><?php _e( 'Mehr News', 'Drahtesel Startseite');  ?></a>
                </div>                
            </div>

        </div><!-- .container end -->

        <div id="frontpage-shop">
            <div class="container">
                <h2>Shop</h2>

                <div class="row">
                    <div class="col-md-12 content-area shop-wrapper">                

                        <?php if( have_rows('shop_item') ): ?>
                            <?php while( have_rows('shop_item') ): the_row(); ?>
                                <?php $img = get_sub_field('shop_bild'); ?>
                                <?php $link = get_sub_field('shop_link'); ?>
        
                                <div class="shop-item">
                                    <?php if($link): ?>
                                        <a href="<?php echo $link['url']; ?>" alt="<?php echo $link['alt']; ?>" <?php echo $link['target']; ?> >
                                    <?php endif; ?>

                                        <img src="<?php echo $img['sizes']['frontpage-preview']; ?>" alt="<?php echo $img['title']; ?>">
                                        <p><strong><?php the_sub_field('shop_titel'); ?></strong></p>
                                        
                                    <?php if($link): ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
        
                            <?php endwhile; ?>
                        <?php endif; ?>


                <div class="col-md-12">
                    <div class="mehr-news center">
                      <a href="shop/" class="btn btn-outline-primary"><?php _e( 'Zum Shop', 'Drahtesel Startseite');  ?></a>
                    </div>                
                </div>                         

            </div>
        </div>

        


    </div><!-- #content end -->

</div><!-- #full-width-page-wrapper end -->

<?php get_footer(get_theme_mod('sinnovativ_unternehmen')); ?>



<script>
( function( $ ) {


ScrollTrigger.matchMedia({
  // desktop
  "(min-width: 640px)": function() {

        ////////////////////////////
        // Kennzahl Animation
        ////////////////////////////

        let kennzahlTl = gsap.timeline({
            defaults:{ duration: 1.8 },
            scrollTrigger: {
                markers: false,
                trigger: '#kennzahlen',
                start: "center 90%",
                end: '+=150px',
                toggleActions: "play none none reverse",
                onEnter: () => {
                  kennzahlTl.timeScale(1.0);
                },
                onEnterBack: () => {
                  kennzahlTl.timeScale(4.0);
                },
            }
        });

        kennzahlTl
            .from(".kennzahl-img", { scale: 0.8, ease: "back.out(6)", stagger: { from: "center", amount: 0.25 } })
            .from(".kennzahl-text-wrapper", { autoAlpha: 0, y: 40, ease: "power4.out", stagger: { from: "center", amount: 0.25 } }, "-=1.6")
            .from(".number", { duration: 3, marginBottom: 30, innerHTML: "0", roundProps: "innerHTML", ease: "power4.out", stagger: { from: "center", amount: 0.25 } }, "-=2")


        ////////////////////////////
        // Wikungskette Animation
        ////////////////////////////

        // Path Animation
        var wirkungsketteTl = gsap.timeline({defaults: {duration: 1, repeat:0},
            scrollTrigger: {
                markers: false,
                trigger: "#wirkungskette",
                scrub: 0.5,
                start: "top 55%",
                end: "bottom 65%",
            }
        })

        var d = 1;
        var maxI = 0;
        $($("#wirkungskette-svg g#path").children().get().reverse()).each(function(i, child){
          wirkungsketteTl.to($(child), d, {"opacity":1});
        });


        // Icons Animation
        let iconAniTime = 1;
        let textAniTime = 1.2;

        let wirkungsIconTl1 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', start: "top 70%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl1.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl1.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-1", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
        .from(".wk-text-box-1", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

        let wirkungsIconTl2 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', markers: false, start: "25% 66%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl2.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl2.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-2", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
        .from(".wk-text-box-2", { duration: textAniTime, /*x: 200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

        let wirkungsIconTl3 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', start: "37% 58%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl3.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl3.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-3", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
        .from(".wk-text-box-3", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

        let wirkungsIconTl4 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', start: "60% 69%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl4.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl4.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-4", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
        .from(".wk-text-box-4", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

        let wirkungsIconTl5 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', start: "71% 52%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl5.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl5.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-5", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
        .from(".wk-text-box-5", { duration: textAniTime, /*x: 200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

        let wirkungsIconTl6 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', start: "bottom 66%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl6.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl6.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-6", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)"})
        .from(".wk-text-box-6", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" )


  },
  // mobile
  "(max-width: 639px)": function() {

        ////////////////////////////
        // Kennzahl Animation
        ////////////////////////////

        let kennzahlTl1 = gsap.timeline({
            defaults:{ duration: 1.8 },
            scrollTrigger: { trigger: '.kennzahl-1', start: "center 90%", end: '+=150px', toggleActions: "play none none reverse", onEnter: () => { kennzahlTl1.timeScale(1.0); }, onEnterBack: () => { kennzahlTl1.timeScale(4.0); },}
        });
        kennzahlTl1
            .from(".kennzahl-1 .kennzahl-img", { scale: 0.8, ease: "back.out(6)" })
            .from(".kennzahl-1 .kennzahl-text-wrapper", { autoAlpha: 0, y: 40, ease: "power4.out" }, "-=1.6")
            .from(".kennzahl-1 .number", { duration: 3, marginBottom: 30, innerHTML: "0", roundProps: "innerHTML", ease: "power4.out", stagger: { from: "center", amount: 0.25 } }, "-=2")

        let kennzahlTl2 = gsap.timeline({
            defaults:{ duration: 1.8 },
            scrollTrigger: { trigger: '.kennzahl-2', start: "center 90%", end: '+=150px', toggleActions: "play none none reverse", onEnter: () => { kennzahlTl2.timeScale(1.0); }, onEnterBack: () => { kennzahlTl2.timeScale(4.0); },}
        });
        kennzahlTl2
            .from(".kennzahl-2 .kennzahl-img", { scale: 0.8, ease: "back.out(6)" })
            .from(".kennzahl-2 .kennzahl-text-wrapper", { autoAlpha: 0, y: 40, ease: "power4.out" }, "-=1.6")
            .from(".kennzahl-2 .number", { duration: 3, marginBottom: 30, innerHTML: "0", roundProps: "innerHTML", ease: "power4.out", stagger: { from: "center", amount: 0.25 } }, "-=2")

        let kennzahlTl3 = gsap.timeline({
            defaults:{ duration: 1.8 },
            scrollTrigger: { trigger: '.kennzahl-3', start: "center 90%", end: '+=150px', toggleActions: "play none none reverse", onEnter: () => { kennzahlTl3.timeScale(1.0); }, onEnterBack: () => { kennzahlTl3.timeScale(4.0); },}
        });
        kennzahlTl3
            .from(".kennzahl-3 .kennzahl-img", { scale: 0.8, ease: "back.out(6)" })
            .from(".kennzahl-3 .kennzahl-text-wrapper", { autoAlpha: 0, y: 40, ease: "power4.out" }, "-=1.6")
            .from(".kennzahl-3 .number", { duration: 3, marginBottom: 30, innerHTML: "0", roundProps: "innerHTML", ease: "power4.out", stagger: { from: "center", amount: 0.25 } }, "-=2")


        ////////////////////////////
        // Wikungskette Animation
        ////////////////////////////

        // Path Animation
        var wirkungsketteTl = gsap.timeline({defaults: {duration: 1, repeat:0},
            scrollTrigger: {
                markers: false,
                trigger: "#wirkungskette",
                scrub: 0.5,
                start: "top 55%",
                end: "bottom 90%",
            }
        })

        var d = 1;
        var maxI = 0;
        $($("#wirkungskette-mobile-svg g#path").children().get().reverse()).each(function(i, child){
          wirkungsketteTl.to($(child), d, {"opacity":1});
        });


        // Icons Animation
        let iconAniTime = 1;
        let textAniTime = 1.2;

        let wirkungsIconTl1 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', start: "top 70%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl1.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl1.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-1", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
        .from(".wk-text-box-1", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

        let wirkungsIconTl2 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', start: "23% 68%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl2.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl2.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-2", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
        .from(".wk-text-box-2", { duration: textAniTime, /*x: 200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

        let wirkungsIconTl3 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', start: "41% 58%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl3.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl3.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-3", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
        .from(".wk-text-box-3", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

        let wirkungsIconTl4 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', start: "60% 69%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl4.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl4.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-4", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
        .from(".wk-text-box-4", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

        let wirkungsIconTl5 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', start: "73% 52%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl5.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl5.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-5", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)" })
        .from(".wk-text-box-5", { duration: textAniTime, /*x: 200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" );

        let wirkungsIconTl6 = gsap.timeline({
            scrollTrigger: { trigger: '#wirkungskette', start: "bottom 86%", end: '+=100px', toggleActions: "play none none reverse", onEnter: () => { wirkungsIconTl6.timeScale(1.0); }, onEnterBack: () => { wirkungsIconTl6.timeScale(3.0); }}
        })
        .from(".wirkungskette-icon-6", { duration: iconAniTime, scale: 0, transformOrigin: "center", ease: "back.out(2)"})
        .from(".wk-text-box-6", { duration: textAniTime, /*x: -200,*/ opacity: 0, ease: "power2.out"}, "-=0.6" )



    }
});


} )( jQuery );
</script>
