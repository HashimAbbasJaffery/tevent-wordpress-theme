<?php

function dd($content) {
    echo "<pre>";
    var_dump($content);
    wp_die();
}

function get_custom_thumbnail($post_id, $size = "thumbnail", $additional_attributes) {
    $custom_thumbnail = "";

    if($post_id === null) {
        $post_id = get_the_ID();
    }

    if( has_post_thumbnail( $post_id ) ) {
        
        $default_attributes = [];
        
        $attributes = array_merge($additional_attributes, $default_attributes);

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id( $post_id ),
            $size,
            false,
            $attributes
        );
    }

    return $custom_thumbnail;

}

function the_custom_thumbnail($post_id, $size, $additional_attributes) {
    echo get_custom_thumbnail($post_id, $size, $additional_attributes);
}

function without_hyphen_lowercase( $string ) {
    $lower_case = strtolower( $string );
    return str_replace( "-", " ", $lower_case );
}

function blog_posted_on($format = "d/m/y") {
    $get_time = '<time datetime="%1$s" class="published updated">%2$s</time>';

    // The blog post has been modified
    if( get_the_time( "U" ) !== get_the_modified_time( "U" )) {
        $get_time = '
            <time datetime="%1$s" class="published">%2$s</time>
            <time datetime="%3$s" class="updated">%4$s</time>
        ';
    }

    $posted_on = sprintf(
        $get_time, 
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_attr( get_the_date( $format ) ),
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_attr( get_the_modified_date() )
    );

    echo $posted_on;
}

function get_nav_items( $nav_name ) {
    $list = "";
    // Getting instance from singleton

    $menus = \TEVENT_THEME\Inc\Menus::get_instance();

    // Getting id from the navigation
    $location = $menus->get_nav_menu_id( $nav_name );

    if( !$location ) {
        $message = "no menu";
        if( current_user_can( "administrator" ) ) {
            $message = sprintf(
                __( 'Create the nav manu named %1$s from <a href="%2$s">here!</a>' ), 
                $nav_name,
                esc_url( home_url() . "/wp-admin/nav-menus.php" )
            );
        } 
        return [
            "missing_name" => $message 
        ];
    }
    
    $items = wp_get_nav_menu_items( $location );

    return $items;
}

function tevent_get_excerpt( $limited_characters ) {
    $excerpt = substr( get_the_excerpt(), 0, $limited_characters );
    $excerpt = substr( $excerpt, 0, strrpos($excerpt, " ") );

    return $excerpt . " [...]";
}

function wp_get_excerpt( $limited_characters = 0 ) {
    echo tevent_get_excerpt($limited_characters);
}

function tevent_more_button() {
    $more = '<a href="%1$s">%2$s</a>';
    if( !is_single() ) {
        $more = sprintf(
            $more,
            get_the_permalink(),
            __("Read more")
        );
    };
    echo $more;
}

function tevent_get_post_terms( $taxonomy ) {

    $the_post_id = get_the_ID();
    $terms = wp_get_post_terms( $the_post_id, $taxonomy );
    
    return $terms;

}

function tevent_pagination() {
    wp_reset_query();

    // Allowed html 

    $allowed_html = [
        "span" => [
            "class" => []
        ],
        "a" => [
            "class" => [],
            "href" => []
        ]
    ];
    
    // What should be before the page number


    $args = [
        "before_page_number" => '<span>',
        "after_page_number" => '</span>',
        "format"  => '?paged=%#%',
        "current" => max( 1, get_query_var( "paged" ) ),
        // "total" => $wp_query->max_num_pages
    ];
    // Printing the pagination
    printf("<nav class='pagination'>%s</nav>", wp_kses( paginate_links( $args ), $allowed_html ));
}

if(!function_exists('log_it')){
    function log_it( $message ) {
      if( WP_DEBUG === true ){
        if( is_array( $message ) || is_object( $message ) ){
          error_log( print_r( $message, true ) );
        } else {
          error_log( $message );
        }
      }
    }
   }

?>