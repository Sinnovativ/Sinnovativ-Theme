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
				Das neue Magazin erscheint drei bis vier Mal im Jahr und gibt spannende Einblicke in unsere Projekte. Melden Sie sich für die Druckausgabe oder unseren Newsletter an.
			</div><!--col end -->


			<div class="col-md-2  col-sm-12   py-md-4 pt-2 pb-4">
				<a href="/was-wir-tun/anmeldung-fokus-velafrica-newsletter/" class="btn btn-outline-secondary">Abonnieren</a>
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
					<a href="mailto:info@velafrica.ch">info@velafrica.ch</a>
					</div><!--col end -->

				<div class="col-md-4  col-sm-12  py-4 d-flex justify-content-center align-items-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/velafrica-foot.png" alt="fokus velafrica">
				</div><!--col end -->


				</div><!-- row end -->

				<div class="col-md-4  col-sm-12  py-4">
				</div><!--col end -->

				<div class="row footer-content">

					<div class="col-sm-12  py-4">
						<ul id="navigation_footer" class="fy-navigation-footer d-flex align-items-left justify-content-sm-center align-items-sm-center"><li id="menu-item-1697" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1697"><a href="https://sinnovativ.ch/">Sinnovativ</a></li>
						<li id="menu-item-1698" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1698"><a href="https://velafrica.ch/">Velafrica</a></li>
						<li id="menu-item-1699" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1699"><a href="https://drahtesel.ch/">Drahtesel</a></li>
						<li id="menu-item-1700" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1700"><a href="https://dreigaenger.ch">Dreigänger</a></li>
						<li id="menu-item-1701" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1701"><a href="https://wege-weierbuehl.ch/">Wege-Weierbühl</a></li>
						</ul>

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
