<?php 

namespace TEVENT_THEME\inc;
use TEVENT_THEME\inc\Assets;
use TEVENT_THEME\inc\Menus;

use TEVENT_THEME\Inc\Traits\Singleton;

class TEVENT_THEME {

    use Singleton;
    
    protected function __construct() {
        Assets::get_instance();
        Menus::get_instance();

        $this->set_hooks();
    }


    public function set_hooks() {
        add_action( "after_setup_theme", [ $this, "setup_theme" ] );
    }
    
    public function setup_theme() {
        
        add_theme_support( "custom-logo", [
            "height" => 68,
            "width" => 195,
            'flex-height' => false,
            'flex-width' => false,
            'header-text' => [ 'tevent', 'where everone sings' ]
        ] );

        add_theme_support( "post-thumbnails" );

        add_theme_support( "title-tag" );

        if(function_exists("add_image_size")) {
            add_image_size( "large", 282, 250, true );
        }

    }

}


?>