<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo( "charset" ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEvent | Home</title>
    
    <!-- <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/reset.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.css"> -->
    <!-- <script src="https://kit.fontawesome.com/3a7e8b6e65.js" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js'></script> -->

    <!--Prefixfree-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script> -->
    <?php wp_head() ?>
</head>
<body>
    <?php wp_body_open(); ?>
    <div id="wrapper">
        <header>
            <div class="container" class="header">
                <div class="row top-row">
                    <div class="top-header col-lg-3 col-md-3 col-sm-3 col-3">
                        <div id="logo">
                            <?php 
                                if(function_exists("the_custom_logo")) {
                                    the_custom_logo();
                                }
                            ?>
                        </div>
                    </div>
                    <div class="social-icons col-lg-3 col-md-3 col-3 d-md-flex">
                        <div class="icon top-social-icon facebook-icon">&nbsp;</div>
                        <div class="icon top-social-icon facebook-icon">&nbsp;</div>
                        <div class="icon top-social-icon facebook-icon">&nbsp;</div>
                        <div class="icon top-social-icon facebook-icon">&nbsp;</div>
                    </div>
                    <div class="register col-lg-2 col-md-3 col-sm-3 col-3">
                        <button class="register-button">Register</button>
                        <i class="fa-solid fa-bars bars" id="bars" style="display: none;"></i>
                    </div>
                </div>
            </div>
            <div id="navigation">
                <nav class="nav-bar" id="slide-navbar">
                        <ul>
                            <?php 

                                // Getting instance from singleton

                                $menus = \TEVENT_THEME\Inc\Menus::get_instance();

                                // Getting id from the navigation
                                $location = $menus->get_nav_menu_id( "header" );

                                $items = wp_get_nav_menu_items( $location );
                                ?>
                            <?php if( $items ): ?>
                                <?php foreach($items as $item): ?>
                                    <?php if(!$pagename) $pagename = "home" ?>
                                    <li><a href="<?php echo $item->url; ?>" class='<?php echo ( without_hyphen_lowercase( $pagename ) === without_hyphen_lowercase( $item->title ) )  ? "active" : "" ?>'><?php echo $item->title; ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <li id="register-nav-btn"><a href="#">Register</a></li>
                        </ul>
                </nav>
            </div>
        </header>
