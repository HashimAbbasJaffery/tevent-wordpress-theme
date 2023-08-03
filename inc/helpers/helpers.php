<?php

function dd($content) {
    echo "<pre>";
    var_dump($content);
    wp_die();
}

function without_hyphen_lowercase( $string ) {
    $lower_case = strtolower( $string );
    return str_replace( "-", " ", $lower_case );
}

?>