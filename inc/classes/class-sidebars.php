<?php 

namespace TEVENT_THEME\inc;

use TEVENT_THEME\Inc\Traits\Singleton;

class Sidebars {

    use Singleton;
    
    protected function __construct() {
        $this->set_hooks();
    }


    public function set_hooks() {
        add_action( "widgets_init", [ $this, "register_sidebars" ] );
        add_action( "widgets_init", [ $this, "register_clock_widget" ] );
    }

    public function register_clock_widget() {
        register_widget("TEVENT_THEME\inc\Clock_Widget");
    }

    public function register_sidebars() {
        register_sidebar( array(
            'name'          => __( 'Main Sidebar', 'textdomain' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s categories"><nav>',
            'after_widget'  => '</nav></div>',
            'before_title'  => '<h1 class="widgettitle">',
            'after_title'   => '</h1>',
        ) );
    }
    

}


?>