<?php
/**
 * Sydney child functions
 *
 */


/**
 * Enqueues the parent stylesheet. Do not remove this function.
 *
 */
add_action( 'wp_enqueue_scripts', 'sydney_child_enqueue' );
function sydney_child_enqueue() {
    
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

/* ADD YOUR CUSTOM FUNCTIONS BELOW */

// Update CSS within in Admin
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
    echo '<style>
    #woocommerce-coupon-data .wc-metaboxes-wrapper,
    #woocommerce-coupon-data .woocommerce_options_panel,
    #woocommerce-product-data .wc-metaboxes-wrapper,
    #woocommerce-product-data .woocommerce_options_panel {
      margin: 0;
    } 
  </style>';
}
