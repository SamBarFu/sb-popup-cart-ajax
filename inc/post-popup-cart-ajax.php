<?php 

add_action( 'wp_ajax_sb-popup-cart-ajax', 'sb_popup_cart_ajax' );
add_action( 'wp_ajax_nopriv_sb-popup-cart-ajax', 'sb_popup_cart_ajax' );

function sb_popup_cart_ajax(){

    $nonce = sanitize_text_field($_POST['nonce']);
    if(!wp_verify_nonce($nonce, 'sbpopup-nonce')){
        die ('Busted!');
    }

    $dataResult = array(
        'success' => true, 
        'content_car' => getContentCart(),
    );
    echo json_encode($dataResult);
}

function getContentCart(){

    ob_start();

    /**
	* Hook: sbpca_popup_cart_ajax.
	*
	* @hooked before_cart_content - 5
	* @hooked header_cart_content - 10
    * @hooked cart_content - 15
    * @hooked cart_content_subtotal - 20
    * @hooked footer_cart_content - 25
    * @hooked after_cart_content - 50
	*/
    do_action('sbpca_popup_cart_ajax');

    return ob_get_clean();
}