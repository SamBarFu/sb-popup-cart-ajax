<?php 

function before_cart_content(){
    echo '<div class="sbpca_container-inner">';
}
function after_cart_content(){
    echo '</div>';
}
function header_cart_content(){
    echo '<div class="sbpca_header">'
        . '<h2 class="sbpca_header-title">'. __('Your shopping cart', 'sbpca') .'</h2>'
        . '<i id="close-popup-cart" class="fas fa-times"></i>'
        . '</div> <div class="sbpca_content">';
}
function footer_cart_content(){
    echo '</div> <div class="sbpca_footer">'
    . '<a class="sbpca_footer-actions" href="/shop/">Continue shopping</a><a class="sbpca_footer-actions" href="/checkout/">Checkout</a>'
    . '</div">';
}
function cart_content(){

    echo '<ul class="cart">';

    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

		$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

            /**
            * Hook: sbpca_cart_item_content.
            *
            * @hooked before_cart_item_content - 5
            * @hooked thumbnail_cart_item - 10
            * @hooked name_cart_item - 15
            * @hooked price_cart_item - 20
            * @hooked short_description_cart_item - 25
            * @hooked remove_link_cart_item - 30
            * @hooked after_cart_item_content - 50
            * 
            * @var $_product
            * @var $cart_item
            * @var $cart_item_key
            * @var $product_id
            */
            do_action('sbpca_cart_item_content', $_product, $cart_item, $cart_item_key, $product_id);
        }
    }

    echo '</ul>';

    /**
    * Hook: sbpca_cart_subtotal_content.
    *
    * @hooked after_cart_subtotal_content - 5
    * @hooked cart_subtotal_content - 10
    * @hooked before_cart_subtotal_content - 20
    */
    do_action('sbpca_cart_subtotal_content');
}


