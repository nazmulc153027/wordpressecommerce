<?php
 add_theme_support('title-tag');
if(!function_exists('wpdocs_theme_name_scripts')){
  function wpdocs_theme_name_scripts(){
    //include all js file
     wp_enqueue_script('jquery');//main jquery
     wp_enqueue_script('min-js', get_theme_file_uri('/assets/js/jquery-1.11.1.min.js'));
     wp_enqueue_script('bootstrap-js', get_theme_file_uri('/assets/js/bootstrap.min.js'));
     wp_enqueue_script('dropdown-js', get_theme_file_uri('/assets/js/bootstrap-hover-dropdown.min.js'));
     wp_enqueue_script('carousel-js', get_theme_file_uri('/assets/js/owl.carousel.min.js'));
     wp_enqueue_script('echo-js', get_theme_file_uri('/assets/js/echo.min.js'));
     wp_enqueue_script('easing-js', get_theme_file_uri('/assets/js/jquery.easing-1.3.min.js'));
     wp_enqueue_script('slider-js', get_template_directory_uri().'/assets/js/bootstrap-slider.min.js');
      wp_enqueue_script('rateit-js', get_template_directory_uri().'/assets/js/jquery.rateit.min.js');
      wp_enqueue_script('lightbox-js', get_template_directory_uri().'/assets/js/lightbox.min.js');
      wp_enqueue_script('select-js', get_template_directory_uri().'/assets/js/bootstrap-select.min.js');
      wp_enqueue_script('wow-js', get_template_directory_uri().'/assets/js/wow.min.js');
    

    wp_enqueue_script('scripts-js', get_template_directory_uri().'/assets/js/scripts.js');
    // wp_enqueue_script('main-js', get_template_directory_uri().'/assets/js/main.js');


//css
     wp_enqueue_style( 'boot-css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
     wp_enqueue_style('main-css', get_template_directory_uri().'/assets/css/main.css');
     wp_enqueue_style('blue-css', get_template_directory_uri().'/assets/css/blue.css');
     wp_enqueue_style('carousel-css', get_template_directory_uri().'/assets/css/owl.carousel.css');
     wp_enqueue_style('transitions-css', get_template_directory_uri().'/assets/css/owl.transitions.css');
     wp_enqueue_style('animate-css', get_template_directory_uri().'/assets/css/animate.min.css');
     wp_enqueue_style('rateit-css', get_template_directory_uri().'/assets/css/rateit.css');
     wp_enqueue_style('select-css', get_template_directory_uri().'/assets/css/bootstrap-select.min.css');
     wp_enqueue_style('select-css', get_template_directory_uri().'/assets/css/woocommerce.css');
     wp_enqueue_style('style',  get_stylesheet_directory_uri());
    
     
  }

  add_action('wp_enqueue_scripts','wpdocs_theme_name_scripts');
}


//Register Menu
/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
require_once get_template_directory() . '/assets/wp-bootstrap-nav/class-wp-bootstrap-navwalker.php';
  register_nav_menus( array(
    'Primary' => __( 'Primary Menu', 'basira' ),
    'Top' => __( 'Top Menu', 'basira' ),
) );
}
add_action( 'after_setup_theme', 'register_navwalker' );


//Add featured images//... search google
 add_theme_support('post-thumbnails',array('post','page','product'));

 set_post_thumbnail_size(300,200, true);

 add_image_size('post-image', 1360,768, true);




 //FOR REGISTER SIDEBAR (google:wp register sidebar)
/**
 * Add a sidebar.
 */
function wp_widgets_register() {
//Footer-1
    register_sidebar( array(
        'name'          => __( 'Footer Widget One', 'basira' ),
        'id'            => 'footer_widget_one',
        'description'   => __( 'Widgets in this area will be shown on all social icon in footer.', 'basira' ),
        'before_widget' => '<div class="col-xs-12 col-sm-6 col-md-3">',
        'after_widget'  => ' </div>',
        'before_title'  => '<div class="module-heading"><h4 class="module-title">',
        'after_title'   => '</h4></div>',
    ) );
//Footer-2
    register_sidebar( array(
        'name'          => __( 'Footer Widget Two', 'basira' ),
        'id'            => 'footer_widget_two',
        'description'   => __( 'Widgets in this area will be shown on all social icon in footer.', 'basira' ),
        'before_widget' => '<div class="col-xs-12 col-sm-6 col-md-3">',
        'after_widget'  => ' </div>',
        'before_title'  => '<div class="module-heading"><h4 class="module-title">',
        'after_title'   => '</h4></div>',
    ) );

  //Right-sidebar
    register_sidebar( array(
        'name'          => __( 'Right Sidebar', 'basira' ),
        'id'            => 'right_sidebar',
        'description'   => __( 'Widgets in this area will be shown on all social icon in right sidebar.', 'basira' ),
        'before_widget' => '<div class="sidebar-widget outer-bottom-xs wow fadeInUp">',
        'after_widget'  => ' </div>',
        'before_title'  => ' <h3 class="section-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wp_widgets_register' );



//Woocommerce theme support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

//Woocommerce remove title,showing result and sorting page
add_filter('woocommerce_show_page_title', '__return_false');
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Remove breadcrumbs from shop & categories
// add_filter( 'woocommerce_before_main_content', 'remove_breadcrumbs');
// function remove_breadcrumbs() {
//   if(!is_product()) {
//     remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
//   }
// }

//woocommerce product per raw

add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 5; // 3 products per row
  }
}

?>