<?php
/**
 * Template Name: Home Page
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
  <div class="row cta d-flex align-items-center">
    <div class="col-12 col-md-6 pb-2 pb-md-0">
      Spenden Sie Ihr Velo für mehr Perspektiven in Afrika
    </div>
    <div class="col-12 col-md-6 d-flex justify-content-end">
      <a href="/wie-sie-helfen/velosammelstelle-finden/" class="btn btn-secondary mr-2">Sammelstelle finden</a>
      <a href="/spenden/" class="btn btn-secondary">Spenden</a>
    </div>
  </div>
  </div>

</div>

<div class="wrapper" id="full-width-page-wrapper">

  <div class="container">

  <div class="row">

      <section id="kennzahlen" class="small-12">
          <div class="kennzahl kennzahl-1">
              <img class="kennzahl-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/content/2_Integration.png" >
              <span class="kennzahl-text-wrapper">
                  <span class="number">88</span>
                  <p>Personen haben in den Velozentren von Velafrica eien Job</p>
              </span>
          </div>
          <div class="kennzahl kennzahl-2">
              <img class="kennzahl-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/content/3_Export.png" >
              <span class="kennzahl-text-wrapper">
                  <span class="number">240000</span>
                  <p>Farräder wurden seit 1993 ingesammt verschifft.</p>
              </span>
          </div>
          <div class="kennzahl kennzahl-3">
              <img class="kennzahl-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/content/5_Berufsbildung.png" >
              <span class="kennzahl-text-wrapper">
                  <span class="number">9</span>
                  <p>lokale verankerte Parterbetriebe werden beliefert</p>
              </span>
          </div>
      </section>

      <hr />

      <section id="wirkungskette" class="small-12">

          <?php echo file_get_contents("wp-content/themes/ginger-child/dist/img/svg/wirkungskette.svg"); ?>
          <div class="wk-text-box wk-text-box-1">
              <h2>Sammlung & Recycling</h2>
              <p>Über 35'000 Velos sammelt Velafrica im Jahr 2019. Das entspricht rund 10% der Menge an Neuvelos, die im selben Jahr in der Schweiz verkauft werden. </p>
              <a href="#" class="btn btn-outline-secondary">Sammelstellen Finder</a>
          </div>

          <div class="wk-text-box wk-text-box-2">
              <h2>Integration & Engagement</h2>
              <p>35 soziale Betriebe schweizweit beteiligen sich an der Verarbeitung der gespendeten Velos. Zwei Drittel werden repariert und exportiert, ein Drittel zu Ersatzteilen verarbeitet.</p>
          </div>

          <div class="wk-text-box wk-text-box-3">
              <h2>Export</h2>
              <p>Über 35'000 Velos sammelt Velafrica im Jahr 2019. Das entspricht rund 10% der Menge an Neuvelos, die im selben Jahr in der Schweiz verkauft werden. </p>
          </div>

          <div class="wk-text-box wk-text-box-4">
              <h2>Soziales Unternehmertum</h2>
              <p>Über 35'000 Velos sammelt Velafrica im Jahr 2019. Das entspricht rund 10% der Menge an Neuvelos, die im selben Jahr in der Schweiz verkauft werden. </p>
          </div>

          <div class="wk-text-box wk-text-box-5">
              <h2>Berufsbildung</h2>
              <p>Über 35'000 Velos sammelt Velafrica im Jahr 2019. Das entspricht rund 10% der Menge an Neuvelos, die im selben Jahr in der Schweiz verkauft werden. </p>
          </div>

          <div class="wk-text-box wk-text-box-6">
              <h2>Mobilität</h2>
              <p>Über 35'000 Velos sammelt Velafrica im Jahr 2019. Das entspricht rund 10% der Menge an Neuvelos, die im selben Jahr in der Schweiz verkauft werden. </p>
              <a href="#" class="btn btn-outline-secondary">Sammelstellen Finder</a>
          </div>

      </section>

  </div>

  </div>

  <div class="<?php echo esc_attr( $container ); ?> bg-light home-news py-4" id="content">

    <div class="container">


    <div class="row">

      <div class="col-md-12 content-area" id="primary">

        <main class="site-main" id="main" role="main">

          <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'loop-templates/content', 'page' ); ?>


          <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->

      </div><!-- #primary -->

    </div><!-- .row end -->

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

    <div class="row">
      <div class="col text-center pb-4">
        <a href="was-wir-tun/news-events/" class="btn btn-outline-secondary">Mehr News</a>
      </div>
    </div>

    </div>

  </div>

  </div><!-- #content -->


</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
