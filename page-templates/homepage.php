<?php
/**
 * Template Name: Home Page - Animation
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
      Spenden Sie Ihr Velo für mehr Perspektiven in Afrika.
    </div>
    <div class="col-12 col-md-6 d-flex justify-content-md-end flex-wrap flex-sm-nowrap">
      <a href="/wie-sie-helfen/velospende/" class="btn btn-secondary mr-sm-2 mb-1 mb-sm-0 flex-grow-1 flex-sm-grow-0">Sammelstelle finden</a>
      <a href="/wie-sie-helfen/geldspende/" class="btn btn-secondary  flex-grow-1 flex-sm-grow-0">Spenden</a>
    </div>
  </div>
  </div>

</div>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="container-animation">

        <section id="kennzahlen" class="small-12">
            <?php if( have_rows('kennzahlen') ): ?>
                <?php while( have_rows('kennzahlen') ): the_row();
                    $image = get_sub_field('kennzahl_img'); ?>
                    <div class="kennzahl">
                        <img class="kennzahl-img" src="<?php echo $image; ?>" >
                        <span class="kennzahl-text-wrapper">
                            <span class="number"><?php the_sub_field('kennzahl'); ?></span>
                            <p><?php the_sub_field('kennzahl_text'); ?></p>
                        </span>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>

    </div>

        <section class="zwischentext">
            <div class="container">
                <?php $zwischentext = get_field('zwischentext'); ?>
                <h2><?php echo $zwischentext['zwischentext_titel']; ?></h2>
                <p><?php echo $zwischentext['zwischentext_text']; ?></p>
            </div>
        </section>

    <div class="container-animation">

        <section id="wirkungskette" class="small-12">

            <?php echo file_get_contents(get_stylesheet_directory_uri() . "/img/svg/wirkungskette.svg"); ?>
            <?php $wirkungskette = get_field('wirkungskette'); ?>
            <div class="wk-text-box wk-text-box-1">
                <h2><?php echo $wirkungskette['sammlung']; ?></h2>
                <?php echo $wirkungskette['sammlung_text']; ?>
            </div>

            <div class="wk-text-box wk-text-box-2">
                <h2><?php echo $wirkungskette['integration']; ?></h2>
                <?php echo $wirkungskette['integration_text']; ?>
            </div>

            <div class="wk-text-box wk-text-box-3">
                <h2><?php echo $wirkungskette['export']; ?></h2>
                <?php echo $wirkungskette['export_text']; ?>
            </div>

            <div class="wk-text-box wk-text-box-4">
                <h2><?php echo $wirkungskette['soziales']; ?></h2>
                <?php echo $wirkungskette['soziales_text']; ?>
            </div>

            <div class="wk-text-box wk-text-box-5">
                <h2><?php echo $wirkungskette['berufsbildung']; ?></h2>
                <?php echo $wirkungskette['berufsbildung_text']; ?>
            </div>

            <div class="wk-text-box wk-text-box-6">
                <h2><?php echo $wirkungskette['mobilitat']; ?></h2>
                <?php echo $wirkungskette['mobilitat_text']; ?>
            </div>

        </section>

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

        </div><!-- .container end -->

        <div class="row">
          <div class="col text-center pb-4">
            <a href="was-wir-tun/news-events/" class="btn btn-outline-secondary">Mehr News</a>
          </div>
        </div>

    </div><!-- #content end -->

</div><!-- #full-width-page-wrapper end -->

<?php get_footer(); ?>
