<?php 
//http://www.expertphp.in/
//skype:01721376870 pass:asusx507
//how to get key value from formdata in javascript
//https://shareideas.info/installing-laravel-8-with-react-and-fortify/(React and Laravel)
//Essential Addons For Elementor plugin with Elementor Page builder plugin
//[woocommerce_checkout]
//[woocommerce_cart]
//https://www.youtube.com/watch?v=wn5ap_ijQyE(shipping full tutorial)
//https://www.youtube.com/watch?v=E-GtnmbY8zU(post code)
//https://github.com/wp-bootstrap/wp-bootstrap-navwalker
//secure than only get_template_directory_uri
//user name: amjad pass:amjad1@$#5
//nayan!@#$%
//<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/assets/css/bootstrap.min.css">
?>


<?php
        wp_nav_menu( array(
            'theme_location'    => 'Primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>