<?php
use TEVENT_THEME\inc\TEVENT_THEME;


if(!defined("TEMPLATE_DIRECTORY")) {
    define("TEMPLATE_DIRECTORY", untrailingslashit( get_template_directory() ));
}

if(!defIned("TEMPLATE_DIRECTORY_URI")) {
    define("TEMPLATE_DIRECTORY_URI", untrailingslashit( get_template_directory_uri() ));
}


require_once TEMPLATE_DIRECTORY . "/inc/helpers/autoloader.php";
require_once TEMPLATE_DIRECTORY . "/inc/helpers/helpers.php";


function setup_theme() {
    TEVENT_THEME::get_instance();
}

setup_theme();


?>