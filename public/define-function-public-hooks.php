<?php 

function sbpca_styles(){
    wp_enqueue_style('sb-popup-cart-ajax-styles', PLUGIN_URL_SBCPA . 'assets/css/sb-popup-cart-ajax-public.css', false, '1.0.0');
}

function sbpca_scripts(){    
    wp_enqueue_script('sb-popup-cart-ajax-js', PLUGIN_URL_SBCPA . 'assets/js/sb-popup-cart-ajax.js', array('jquery'), '1.0.0', false);

    //sb-filter-ajax
    wp_localize_script('sb-popup-cart-ajax-js', 'ajax_var_popup', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sbpopup-nonce'),
        'action' => 'sb-popup-cart-ajax'
    ));
}

add_action('sbpca_popup_cart_ajax', 'before_cart_content', 5);
add_action('sbpca_popup_cart_ajax', 'header_cart_content', 10);
add_action('sbpca_popup_cart_ajax', 'cart_content', 15);
add_action('sbpca_popup_cart_ajax', 'cart_content_subtotal', 20, 2);
add_action('sbpca_popup_cart_ajax', 'footer_cart_content', 25);
add_action('sbpca_popup_cart_ajax', 'after_cart_content', 50);

add_action('sbpca_cart_item_content', 'before_cart_item_content', 5);
add_action('sbpca_cart_item_content', 'thumbnail_cart_item', 10, 3);
add_action('sbpca_cart_item_content', 'name_cart_item', 15, 3);
add_action('sbpca_cart_item_content', 'price_cart_item', 20, 3);
add_action('sbpca_cart_item_content', 'short_description_cart_item', 25, 3);
add_action('sbpca_cart_item_content', 'remove_link_cart_item', 30, 4);
add_action('sbpca_cart_item_content', 'after_cart_item_content', 50);

add_action('sbpca_cart_subtotal_content', 'before_cart_subtotal_content', 5);
add_action('sbpca_cart_subtotal_content', 'cart_subtotal_content', 10);
add_action('sbpca_cart_subtotal_content', 'after_cart_subtotal_content', 20);