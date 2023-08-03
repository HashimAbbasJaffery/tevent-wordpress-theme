<?php 

namespace TEVENT_THEME\inc;
use TEVENT_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct() {
        $this->set_hooks();
    }

    public function set_hooks() {
        add_action( "init", [ $this, "register_nav_menu" ] );
    }

    public function register_nav_menu() {
        register_nav_menus([
            "header" => __("Header menu"),
            "footer-services" => __("Footer services"),
            "footer-company" => __("Footer company"),
            "footer-links" => __("Footer links")
        ]);
    }

    public function get_nav_menu_id( $location ) {
        $locations = get_nav_menu_locations();

        return ( array_key_exists( $location, $locations ) )? $locations[ $location ] : "";
        
    }

}



?>