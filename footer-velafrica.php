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

			<div class="col-md-4 col-sm-12  py-4">
				<img src="<?php echo get_template_directory_uri(); ?>/img/fokus-velafrica.png" alt="fokus velafrica">
			</div><!--col end -->

			<div class="fokus-description col-md-6  col-sm-12  py-md-4 py-2">
			<?php 	_e( 'The new magazine is published three to four times a year and provides exciting insights into our projects. Sign up for the print edition or our newsletter.', 'Velafrica Startseite'); ?>

			</div><!--col end -->


			<div class="col-md-2  col-sm-12   py-md-4 pt-2 pb-4">
				<a href="<?php 	_e( '/en/what-we-do/registration-fokus-velafrica-and-newsletter/', 'Velafrica Startseite');?>" class="btn btn-outline-secondary"><?php 	_e( 'Subscribe', 'Velafrica Startseite');?></a>
			</div><!--col end -->
		</div><!-- row end -->


	</div>

</div>
		<footer class="site-footer" id="colophon">

		<div class="container">
			<div class="row">

				<div class="footer-address col-md-4 col-sm-12 py-5">
					Velafrica<br>
					Waldeggstrasse 27<br>
					3097 Liebefeld<br>
					+41 (0)31 979 70 50<br>
					<div class="tel-hint"><?php 	_e( 'Our phone is hosted by participants and learners from <a href="http://drahtesel.ch/" target="_blank">Drahtesel</a>.', 'Velafrica Startseite');?></div>
					<br>
					<a href="mailto:info@velafrica.ch">info@velafrica.ch</a>
					</div><!--col end -->

				<div class="col-md-4  col-sm-12  py-4 d-flex justify-content-center align-items-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/velafrica-foot.png" alt="fokus velafrica">
				</div><!--col end -->

				<div class="col-md-4  col-sm-12  py-5 text-center text-md-right social-links">
					<a target="_blank" href="https://www.facebook.com/Velafrica1"><i class="fa fa-facebook"></i></a>
					<a target="_blank" href="https://www.instagram.com/velafrica/"><i class="fa fa-instagram"></i></a>
					<a target="_blank" href="https://www.youtube.com/channel/UCPsGcahOckJTJrOs4HPr9uA"><i class="fa fa-youtube"></i></a>
					<a target="_blank" href="https://ch.linkedin.com/company/velafrica"><i class="fa fa-linkedin"></i></a>

					<div class="sinnovativ">
	<span><?php 	_e( 'A company of<br><a href="http://sinnovativ.ch/" target="_blank">Stiftung Sinnovativ</a>', 'Velafrica Startseite');?></span>
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
