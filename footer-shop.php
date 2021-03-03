<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

<div class="fokus-teaser">

	<div class="container">

		<div class="row align-items-center">

			<div class="col-sm-12 py-2 shop-footer-menu">
									<?php
					wp_nav_menu( array(
						'theme_location' => 'shop-menu',
						'menu_class' => 'nav'));
					?>
			</div><!--col end -->
		</div><!-- row end -->


	</div>

</div>
		<footer class="site-footer" id="colophon">

		<div class="container">
			<div class="row">

				<div class="footer-address col-md-4 col-sm-12 py-5">
					Drahtesel - Arbeit mit Perspektiven<br>
					Waldeggstrasse 27<br>
					3097 Liebefeld<br>
					031 979 70 70<br>
					<div class="tel-hint"><?php 	_e( 'Unser Telefon wird durch unsere Teilnehmenden und Lernenden betreut.', 'Drahtesel Startseite');?></div>
					<br>
					<a href="mailto:info@vdrahtesel.ch">info@drahtesel.ch</a>
					</div><!--col end -->

				<div class="col-md-4  col-sm-12  py-4 d-flex justify-content-center align-items-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/drahtesel-foot.png" alt="fokus velafrica">
				</div><!--col end -->

				<div class="col-md-4  col-sm-12  py-5 text-center text-md-right social-links">
					<a target="_blank" href="https://www.facebook.com/drahtesel"><i class="fa fa-facebook"></i></a>
					<a target="_blank" href="https://www.instagram.com/drahtesel_velowerkstatt/"><i class="fa fa-instagram"></i></a>
					<a target="_blank" href="https://www.linkedin.com/company/drahtesel-arbeit-mit-perspektiven/"><i class="fa fa-linkedin"></i></a>

					<div class="sinnovativ">
	<span><?php 	_e( 'Ein Unternehmen der <br><a href="http://sinnovativ.ch/" target="_blank">Stiftung Sinnovativ</a>', 'Drahtesel Startseite');?></span>
					</div><!--col end -->
				</div><!--col end -->
				</div><!-- row end -->
		</div>

		</footer><!-- #colophon -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
