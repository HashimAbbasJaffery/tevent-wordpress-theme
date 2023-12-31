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
        Sidebars::get_instance();
        Block_pattern::get_instance();

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
            add_image_size( "large", 282, 50, true );
        }
        
        add_theme_support( "wp-block-styles" );

        add_theme_support( "align-wide" );

        add_theme_support( "editor-styles" );

        add_editor_style( "editor.css" );

        remove_theme_support( 'core-block-patterns' );

    }

}


?>