<?php 

class SBPopupCartAjax {

    public function __construct(){
        $this->load_dependencies(); 
        $this->load_public_hooks();        
    }

    public function load_dependencies(){
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/define-function-public-hooks.php';
        
        if( ! class_exists( 'Gamajo_Template_Loader' ) ) {
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class/Gamajo_Template_Loader.php';
        }
        
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class/SBPCA_Template_Loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/post-popup-cart-ajax.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/actions_content_cart.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/actions_content_cart_item.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/actions_content_cart_subtotal.php';
    }

    public function load_public_hooks(){
        add_action('wp_enqueue_scripts', 'sbpca_styles', 10);
        add_action('wp_enqueue_scripts', 'sbpca_scripts', 10);
    }
}