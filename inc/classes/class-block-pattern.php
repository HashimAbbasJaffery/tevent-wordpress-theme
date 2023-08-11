<?php 

namespace TEVENT_THEME\inc;

use TEVENT_THEME\Inc\Traits\Singleton;

class Block_pattern {

    use Singleton;
    
    protected function __construct() {
        $this->set_hooks();
    }


    public function set_hooks() {
        add_action( "init", [ $this, "register_blocks" ] );
        add_action( "init", [ $this, "register_pattern_category" ] );
    }
    public function get_content( $url ) {
        ob_start();

        get_template_part( $url );

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
    public function register_blocks() {


        register_block_pattern( 
            "tevent/cover", 
            [
                "title" => __( "Tevent Cover" ),
                "description" => __( "The preset cover style" ),
                "categories" => [ 'cover' ],
                "content" => __( $this->get_content( "template_parts/patterns/cover" ) )
            ], 
        );

        register_block_pattern( 
            "tevent/text_block", 
            [
                "title" => __( "Tevent Cover" ),
                "description" => __( "The preset cover style" ),
                "categories" => [ 'text block' ],
                "content" => __( $this->get_content( "template_parts/patterns/text-block" ) )
            ], 
        );
    }

    public function register_pattern_category() {
        $categories = [
            "cover" => __( "Cover" ),
            "text block" => __( "The text block" )
        ];

        if( !empty( $categories ) && is_array( $categories )) {
            foreach( $categories as $category => $label ) {
                register_block_pattern_category( 
                    $category, 
                    [
                        "label" => $label
                    ]
                );
            }
        }
    }
    
    
}


?>