<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


// Glunz Animation
function my_script() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'velafrica', trailingslashit( get_stylesheet_directory_uri() ) . 'js/velafrica.js', array( 'jquery' ));
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array('jquery'), '3.5.1', false );
    wp_enqueue_script( 'MotionPathPlugin', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/MotionPathPlugin.min.js', array('gsap'), '3.5.1', false );
    wp_enqueue_script( 'ScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js', array('gsap'), '3.5.1', false );
    wp_enqueue_script( 'DrawSVG', get_stylesheet_directory_uri() . '/js/DrawSVGPlugin.min.js', array('gsap'), '3.5.1', false );
    wp_enqueue_script( 'animation', get_stylesheet_directory_uri() . '/js/glunz.js', array('DrawSVG'), '1.1.2', true );
}
add_action( 'wp_enqueue_scripts', 'my_script' );

// Secondary navigation
function register_my_menu() {
register_nav_menus(
    array(
      'secondary-menu' => __( 'Secondary Menu' ),
      'shop-menu' => __( 'Shop Menu' )
    )
  );
}
add_action( 'init', 'register_my_menu' );


// List child
function list_child_pages() {

global $post;

if ( is_page() && $post->post_parent )

    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

if ( $childpages ) {

    if(wp_get_post_parent_id($post->ID) == 0) {
        $classes = "page_item current_page_item";
    } else {
        $classes = "page_item";
    }

    $string = '<ul class="nav"><li class="page_item ' . $classes . '"><a href="'. get_permalink( $post->post_parent ) . '" >Übersicht</a></li>'.  $childpages . '</ul>';

}

return $string;

}

function the_breadcrumb() {
        echo '<ol class="breadcrumb">';
    if (!is_home()) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo "</a></li>";
        if (is_category() || is_single()) {
            echo '<li class="breadcrumb-item">';
            the_category(' </li><li class="breadcrumb-item"> ');
            if (is_single()) {
                echo "</li><li class='breadcrumb-item active'>";
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            echo '<li class="breadcrumb-item">';
            echo the_title();
            echo '</li>';
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li class='breadcrumb-item'>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li class='breadcrumb-item'>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li class='breadcrumb-item'>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li class='breadcrumb-item'>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li class='breadcrumb-item'>Search Results"; echo'</li>';}
    echo '</ol>';
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Woocommerce set default product quantity to 1

add_filter( 'wcfm_product_fields_stock', function( $stock_fields, $product_id, $product_type ) {

        if( !$product_id ) {

               if( isset( $stock_fields['manage_stock'] ) ) {

                       $stock_fields['manage_stock']['dfvalue'] = 'enable';

               }

               if( isset( $stock_fields['stock_qty'] ) ) {

                       $stock_fields['stock_qty']['value'] = 1;

               }

               if( isset( $stock_fields['sold_individually'] ) ) {

                       $stock_fields['sold_individually']['dfvalue'] = 'enable';

               }

        }

  return $stock_fields;

}, 50, 3 );


// Woocommerce hide products whitout image

	function hide_products_without_image( $query ) {

					 $query->set( 'meta_query', array( array(

						 'key' => '_thumbnail_id',

						 'value' => '0',

						 'compare' => '>'

				 ))

			 );

		}



		add_action( 'woocommerce_product_query', 'hide_products_without_image' );



function prefix_reset_metabox_positions(){
  delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_post' );
  delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_page' );
  delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_YOUR_CPT_SLUG' );
}
add_action( 'admin_init', 'prefix_reset_metabox_positions' );


// Frontpage Image Size
add_image_size( 'frontpage-preview', 523, 357, array( 'center', 'center' ) );



// Show Shop woocommerce-categories
function woocommerce_product_category( $args = array() ) {
    $woocommerce_category_id = get_queried_object_id();
  $args = array(
      'parent' => $woocommerce_category_id
  );
  $terms = get_terms( 'product_cat', $args );
  if ( $terms ) {
      echo '<ul class="woocommerce-categories">';
      foreach ( $terms as $term ) {
          echo '<li class="woocommerce-product-category-page">';
            //woocommerce_subcategory_thumbnail( $term );
          echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="shop-category-button btn btn-outline-primary ' . $term->slug . '">';
          echo $term->name;
          echo '</a>';
          echo '</li>';
      }
      echo '</ul>';
  }
}
add_action( 'woocommerce_before_shop_loop', 'woocommerce_product_category', 100 );

/**
 * Change several of the breadcrumb defaults
 */

add_filter('woocommerce_breadcrumb_defaults', function() {
    return array(
			      'delimiter'   => ' &#47; ',
            'y'   => ' &#47; ',
            'wrap_before' => '<h1 class="shop-breadcrumb">',
            'wrap_after'  => '</h1>',
            'before'      => '',
            'after'       => '',
            'home'        => '',
    );
});

/**
 * Show size of product in overview
 */

add_action('woocommerce_after_shop_loop_item_title', 'cstm_display_product_category', 5);

function cstm_display_product_category()
{
  global $product;
  $size = $product->get_attribute('pa_size');

 if(!empty($size)){
    echo '<div class="product_size">Grösse: ' . $size . '</div>';
 }
}
