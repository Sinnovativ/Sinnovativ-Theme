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
      Spenden Sie Ihr Velo für mehr Perspektiven in Afrika.
    </div>
    <div class="col-12 col-md-6 d-flex justify-content-end">
      <a href="/wie-sie-helfen/velospende/" class="btn btn-secondary mr-2">Sammelstelle finden</a>
      <a href="/wie-sie-helfen/geldspende/" class="btn btn-secondary">Spenden</a>
    </div>
  </div>
  </div>

</div>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="container-animation">

        <section id="kennzahlen" class="small-12">
            <div class="kennzahl kennzahl-1">
                <img class="kennzahl-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/content/10_velomechanik.png" >
                <span class="kennzahl-text-wrapper">
                    <span class="number">70</span>
                    <p>Jugendliche absolvieren bei Velafrica-Partnern in Afrika eine Ausbildung in Velomechanik.</p>
                </span>
            </div>
            <div class="kennzahl kennzahl-2">
                <img class="kennzahl-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/content/20_bike2school.png" >
                <span class="kennzahl-text-wrapper">
                    <span class="number">1324</span>
                    <p>Mädchen erhielten letztes Jahr in Tansania dank «Bike to School» ein vergünstigtes Velo.</p>
                </span>
            </div>
            <div class="kennzahl kennzahl-3">
                <img class="kennzahl-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/content/30_Export.png" >
                <span class="kennzahl-text-wrapper">
                    <span class="number">21964</span>
                    <p>Velos hat Velafrica letztes Jahr exportiert – dazu 24‘341 Ersatzteile.</p>
                </span>
            </div> 
        </section>

    </div>

        <section class="zwischentext">
            <div class="container">
                <h2>Mit Velos Gutes bewirken</h2>
                <p>Die Verbindung von Integrationsarbeit in der Schweiz und Entwicklungszusammenarbeit in Afrika macht Velafrica einzigartig. Seit 1993 sammeln wir ausgediente Velos, stellen sie in sozialen Einrichtungen instand und exportieren sie danach zu Partnerunternehmen in Afrika. Vor Ort bewirken die Velos viel Positives.</p>
            </div>
        </section>

    <div class="container-animation">
        
        <section id="wirkungskette" class="small-12">
        
            <?php echo file_get_contents(get_stylesheet_directory_uri() . "/img/svg/wirkungskette.svg"); ?>
            <div class="wk-text-box wk-text-box-1">
                <h2>Sammlung & Recycling</h2>
                <p>Velafrica sammelt jährlich gegen 35'000 Velos. Das entspricht rund 10 Prozent der Velos, die pro Jahr in der Schweiz neu gekauft werden. Rund 400 Sammelstellen nehmen ganzjährig Velospenden für Velafrica an, hinzu kommen Velosammlungen und Abholaktionen. <a href="#">Hier</a> können Sie Ihr Velo Velafrica spenden. Und <a href="#">hier</a> erfahren Sie, wie Sie eine eigene Velosammlung für Velafrica auf die Beine stellen.</p>
            </div>
        
            <div class="wk-text-box wk-text-box-2">
                <h2>Integration & Engagement</h2>
                <p><a href="#">Über 30 soziale Betriebe</a> beteiligen sich schweizweit an der Verarbeitung der gespendeten Velos. Rund zwei Drittel der Fahrräder werden repariert und exportiert, ein Drittel zu Ersatzteilen demontiert. In Bern Liebefeld führt Velafrica eine eigene Velowerkstatt. Sie ist ein Integrationsprojekt für geflüchtete Menschen und zudem ein Ort, wo sich motivierte Freiwillige engagieren können. Möchten auch Sie sich in der Werkstatt von Velafrica betätigen? <a href="#">Hier erfahren Sie mehr.</a></p>
            </div>
        
            <div class="wk-text-box wk-text-box-3">
                <h2>Export</h2>
                <p>Velafrica exportiert jährlich über 20'000 Velos nach Afrika. Sie finden Platz in rund 50 Schiffscontainern, welche sich von der Schweiz auf eine sechs- bis achtwöchige Reise an ihr Ziel begeben. Pro Woche wird ein Container verladen, zudem Tausende von Ersatzteilen. Am meisten brauchen unsere Partnerunternehmen Schläuche, Räder und Ketten.</p>
            </div>
        
            <div class="wk-text-box wk-text-box-4">
                <h2>Soziales Unternehmertum</h2>
                <p>Velafrica beliefert <a href="#">neun lokal verankerte Partnerunternehmen</a> in sieben Ländern - vier Veloläden in Westafrika und fünf Velozentren in Burkina Faso, Tansania, Madagaskar und Südafrika. Bei den Partnerunternehmen entstehen Jobs in der Werkstatt, im Verkauf und in der Administration. 88 Personen fanden in den Betrieben eine Anstellung.</p>
            </div>
        
            <div class="wk-text-box wk-text-box-5">
                <h2>Berufsbildung</h2>
                <p>Velafrica fördert gezielt die berufliche Ausbildung von Velomechanikerinnen und Velomechanikern, um jungen Menschen eine Perspektive zu geben und die langfristige Nutzung der exportierten Velos sicherzustellen. Die Velozentren bieten 70 Ausbildungsplätze an. </p>
            </div>
        
            <div class="wk-text-box wk-text-box-6">
                <h2>Mobilität</h2>
                <p>Mit einem Velo kommt man viermal schneller vorwärts und es können dreimal mehr Lasten transportiert werden als zu Fuss. Es sichert den Zugang zu Arbeitsplätzen, zur Schule und zu Gesundheitszentren. Velafrica fördert mit Programmen wie «Bike to School» gezielt die Velomobilität.</p>
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
