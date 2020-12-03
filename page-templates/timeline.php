<?php
/**
 * Template Name: Timeline
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
                                        <?php if($counter == 1): ?>
                                            <div></div>
                                            <div></div>
                                        <?php endif; ?>
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

<?php get_footer(); ?>
