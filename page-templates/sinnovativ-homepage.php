<?php
/**
 * Template Name: Sinnovativ Home Page
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

<div class="wrapper home-page-wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php if (has_post_thumbnail( $post->ID ) ) { ?>
					<div class="post-image home-image" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>)">
						<div class="frontpage-button wege-button">
						<h2>Laden, Restaurant, Kultur</h2>Willkommen im Dreigänger</div>
					</div>
					<?php } ?>

					<div class="container mt-md-3 mt-lg-5">

											<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					</div>

          <div class="container news-container mb-5">
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


				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->


		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(get_theme_mod('sinnovativ_unternehmen')); ?>
