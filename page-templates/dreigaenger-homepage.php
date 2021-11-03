<?php
/**
 * Template Name: Dreigaenger Home Page
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


                        <?php while ( have_posts() ) : the_post(); ?>

                          <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                        <?php endwhile; // end of the loop. ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div><!-- .row end -->
        </div><!-- .container end -->


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


<?php get_footer(get_theme_mod('sinnovativ_unternehmen')); ?>
