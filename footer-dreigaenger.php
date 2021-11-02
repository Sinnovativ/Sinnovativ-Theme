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

			<div class="col-md-3 col-sm-12 py-4 fokus-img">
				<img src="<?php echo get_template_directory_uri(); ?>/img/fokus-drahtesel.png" alt="fokus velafrica">
			</div><!--col end -->

			<div class="fokus-description col-md-6  col-sm-12  py-md-4 py-2">
			<?php 	_e( 'Das Magazin erscheint drei bis vier Mal im Jahr und gibt spannende Einblicke in unsere Projekte. Melden Sie sich für die Druckausgabe oder unseren Newsletter an.', 'Drahtesel Startseite'); ?>

			</div><!--col end -->


			<div class="col-md-3  col-sm-12  py-md-4 pt-2 pb-4">
				<a href="https://sinnovativ.ch/fokus/" class="btn btn-outline-secondary"><?php 	_e( 'Anmelden', 'Drahtesel Startseite');?></a>
			</div><!--col end -->
		</div><!-- row end -->


	</div>

</div>
		<footer class="site-footer" id="colophon">

		<div class="container">
			<div class="row">

				<div class="footer-address col-md-4 col-sm-12 py-5">
					Dreigänger Laden, Restaurant & Kultur<br>
					Waldeggstrasse 27<br>
					3097 Liebefeld<br>
					Restaurant: 031 979 70 89<br>
					Laden: 031 979 70 61<br>
					<div class="tel-hint"><?php 	_e( 'Unser Telefon wird durch unsere Teilnehmenden und Lernenden betreut.', 'Drahtesel Startseite');?></div>
					<br>
					<a href="mailto:info@dreigaenger.ch">info@dreigaenger.ch</a>
					</div><!--col end -->

				<div class="col-md-4  col-sm-12  py-4 d-flex justify-content-center align-items-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/drahtesel-foot.png" alt="fokus velafrica">
				</div><!--col end -->

				<div class="col-md-4  col-sm-12  py-5 text-center text-md-right social-links">
					<a target="_blank" href="https://www.facebook.com/dreiganeger"><i class="fa fa-facebook"></i></a>
					<a target="_blank" href="https://www.instagram.com/dreigaenger.ch/"><i class="fa fa-instagram"></i></a>

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
