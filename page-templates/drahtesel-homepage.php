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

    <div class="home-news py-4" id="content">

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
                <h2><?php the_field('angebots_titel'); ?></h2>
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


        <div class="container news-container">
            <h2>News</h2>

            <?php
            // Show latest posts whitout the ones in category 445 (="Dont show on startpage")
            $args = array(
                'posts_per_page' => 4,
                'cat' => '-445'
            );

            $the_query = new WP_Query($args); ?>


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
                  <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-outline-primary"><?php _e( 'Mehr News', 'Drahtesel Startseite');  ?></a>
                </div>
            </div>

        </div><!-- .container end -->

        <div id="frontpage-shop">
            <div class="container">
                <h2><?php the_field('shop_titel'); ?></h2>

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
                                        <p><?php the_sub_field('shop_titel'); ?></p>

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




<!-- Raindbow Button -->
<script>
    jQuery(document).ready(function ($) {

      function afterText() {
        var svgimg = '<svg fill="transparent" stroke="rgba(234,87,27,0.8)" stroke-width="2" xmlns="http://www.w3.org/2000/svg" width="19.531" height="19.003" viewBox="0 0 19.531 19.003"><path d="M15.827,3.41a4.36,4.36,0,0,0-6.388.516l-.674.77-.674-.77A4.36,4.36,0,0,0,1.7,3.41,5.861,5.861,0,0,0,1.362,11.3l6.625,7.582a1,1,0,0,0,1.551,0L16.162,11.3a5.858,5.858,0,0,0-.336-7.889Z" transform="translate(1.002 -1.245)" /></svg>';
        $("li#menu-item-71 a").append(svgimg);
        $("li#menu-item-7327 a").append(svgimg);
        $("li#menu-item-7326 a").append(svgimg);
      }
      afterText();

      })

      window.onload = function () {
      var angle = 0;
      var p = document.querySelector('.home .frontpage-button h2');
      var text = p.textContent.split('');
      var len = text.length;
      var phaseJump = 360 / len;
      var spans;
      var animationOn = false;

      p.innerHTML = text.map(function (char) {
        return '<span>' + char + '</span>';
      }).join('');

      spans = p.children;

      function wheee () {
          if (animationOn) {
            for (var i = 0; i < len; i++) {
              spans[i].style.color = 'hsl(' + (angle + Math.floor(i * phaseJump)) + ', 90%, 65%)';
            }
            angle++;
            requestAnimationFrame(wheee);
          }
        }

      p.onmouseover =  function () {

          //console.log("mouseouver")
          animationOn = true;
          requestAnimationFrame(wheee);
        }

        p.onmouseout = function () {

            //console.log("mouseout")
            animationOn = false;
            for (var i = 0; i < len; i++) {
              spans[i].style.color = '#0093d6';
            }
        }

    };
</script>
