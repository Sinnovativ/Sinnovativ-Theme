<?php
/**
 * Template Name: Drahtesel Bereiche Template
 *
 * Template for displaying the Bereiche page
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>


<div class="wrapper" id="page-wrapper">
  <div class="container-fluid breadcrumb-container">
    <nav aria-label="breadcrumb">
      <a href="<?php echo get_permalink( $post->post_parent ); ?>" >
   <?php echo get_the_title( $post->post_parent ); ?>
</a>
  </nav>
    <?php  echo list_child_pages(); ?>
  </div>

  <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

    <div class="row">

      <!-- Do the left sidebar check -->
      <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

      <main class="site-main" id="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php if (has_post_thumbnail( $post->ID ) ) { ?>
            <div class="post-image" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>)">
                  <?php if(get_field('offnungszeiten_anzeigen')): ?>
                      <div class="opening-time">
                          <h3>Öffnungszeiten</h3>
                          <?php while(have_rows('offnungszeiten') ) : the_row(); ?>
                              <strong><?php the_sub_field('titel'); ?></strong>
                              <p><?php the_sub_field('zeiten'); ?></p>
                          <?php endwhile; ?>
                      </div>
                  <?php endif; ?>
            </div>
            <?php } ?>

            <?php if(get_field('offnungszeiten_anzeigen')): ?>
                <div class="opening-time-mobile">
                    <h3>Öffnungszeiten</h3>
                    <?php while(have_rows('offnungszeiten') ) : the_row(); ?>
                        <strong><?php the_sub_field('titel'); ?></strong>
                        <p><?php the_sub_field('zeiten'); ?></p>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>          

            <div class="container mt-md-3 mt-lg-5">

                        <?php get_template_part( 'loop-templates/content', 'page' ); ?>

            </div>


            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
            ?>

        <?php endwhile; // end of the loop. ?>

        <?php if(get_field('news_anzeigen')): ?>

            <div class="container news-container">
                <h2>Was uns bewegt</h2>
        
                <?php
                // Show latest posts and only selectet categorie
                $category_ID = get_field('bereich');
                $the_query = new WP_Query( array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'post_status' => 'publish',
                    'category__in' => $category_ID
                    )
                );

                ?>
        
        
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
        <?php endif; ?>

      </main><!-- #main -->

      <!-- Do the right sidebar check -->
      <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

    </div><!-- .row -->

  </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(get_theme_mod('sinnovativ_unternehmen')); ?>
