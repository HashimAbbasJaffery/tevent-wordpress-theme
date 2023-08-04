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
    
    $items = wp_get_nav_menu_items( $location );

    return $items;
}

function wp_get_excerpt( $limited_characters = 0 ) {
    if( !has_excerpt() || $limited_characters == 0) {
        the_excerpt();
        return;
    }

    $excerpt = substr( get_the_excerpt(), 0, $limited_characters );
    $excerpt = substr( $excerpt, 0, strrpos($excerpt, " ") );
    echo $excerpt . "[...]";
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

?>