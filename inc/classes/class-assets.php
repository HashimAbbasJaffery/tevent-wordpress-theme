<?php 

namespace TEVENT_THEME\inc;
use TEVENT_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct() {
        $this->set_hooks();
    }

    public function set_hooks() {
        add_action( "wp_enqueue_scripts", [ $this, "register_styles" ] );
        add_action( "wp_enqueue_scripts", [ $this, "register_script" ] );
    }

    /**
     * Summary of register_styles
     * @return void
     */

    public function register_styles() {
        wp_register_style( "main-css", get_stylesheet_uri(), [ "reset-css" ], filemtime( TEMPLATE_DIRECTORY . "/style.css" ) );
        wp_register_style( "reset-css", TEMPLATE_DIRECTORY_URI . "/assets/styles/reset.css", [],  filemtime( TEMPLATE_DIRECTORY . "/assets/styles/reset.css") );
        wp_register_style( "bootstrap", TEMPLATE_DIRECTORY_URI . "/assets/styles/bootstrap.css", [], false);
        wp_register_style( "google-fonts", TEMPLATE_DIRECTORY_URI . "/assets/fonts/font.css");

        wp_enqueue_style( "reset-css" );
        wp_enqueue_style( "main-css" );
        wp_enqueue_style( "bootstrap" );
        wp_enqueue_style( "google-fonts" );

    }

    public function register_script() {
        wp_register_script( "font-awesome", "https://kit.fontawesome.com/3a7e8b6e65.js" );
        wp_register_script( "bootstrap-script", "https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js", [ "jquery-file" ] );
        wp_register_script( "jquery-file", "https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" );
        wp_register_script( "main-js", TEMPLATE_DIRECTORY_URI . "/assets/main.js" );
        
        wp_enqueue_script( "font-awesome" );
        wp_enqueue_script( "bootstrap-script" );
        wp_deregister_script( "jquery" );
        wp_enqueue_script( "jquery-file" );
        wp_enqueue_script( "main-js" );
    }
}


?>