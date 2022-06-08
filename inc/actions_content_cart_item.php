<?php

function before_cart_item_content(){
    echo '<li class="cart-item">';
}
function after_cart_item_content(){
    echo '</li>';
}

function thumbnail_cart_item($_product, $cart_item, $cart_item_key){
    echo apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
}

function name_cart_item($_product, $cart_item, $cart_item_key){
    echo '<div class="cart-item-info"><p class="cart-item-name">' . wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' ) . '</p>';
}

function price_cart_item($_product, $cart_item, $cart_item_key){
    echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
}

function short_description_cart_item($_product, $cart_item, $cart_item_key){
    echo sprintf('<div class="cart-item-description">%s</div>', apply_filters( 'woocommerce_short_description', $_product->get_short_description())) . '</div>';
}

function remove_link_cart_item($_product, $cart_item, $cart_item_key, $product_id){
    echo apply_filters('woocommerce_cart_item_remove_link',
    sprintf(
        '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fas fa-trash"></i></a>',
        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
        esc_html__( 'Remove this item', 'woocommerce' ),
        esc_attr( $product_id ),
        esc_attr( $_product->get_sku() )
    ), $cart_item_key);
}