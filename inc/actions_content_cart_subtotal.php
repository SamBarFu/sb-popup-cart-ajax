<?php

function before_cart_subtotal_content(){
    echo '<div class="sbpca_cart_subtotal">';
}
function cart_subtotal_content(){
    echo '<div><p>Subtotal</p>'. wc_price(WC()->cart->get_subtotal()) . '</div>';
}

function after_cart_subtotal_content(){
    echo '</div>';
}
