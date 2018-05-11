<?php

if ( ! isset( $content_width ) ) {
    $content_width = 940;
}

if ( ! function_exists( 'hd_setup' ) ) {

    function hd_setup() {
     
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );

        register_nav_menu( 'primary', 'Primary Menu' );

        if( !get_option( 'medium_crop' ) ) {
            add_option( 'medium_crop', '1' );
        } else {
            update_option( 'medium_crop', '1' );
        }

        add_image_size( 'square', 885, 885, true );

        add_filter( 'wpcf7_load_css', '__return_false' );

    }

}

add_action( 'after_setup_theme', 'hd_setup' );

if ( ! function_exists( 'hd_scripts_and_styles' ) ) {

    function hd_scripts_and_styles() {

        $cache_ver = '1.0';

        wp_register_style( 'fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
        wp_register_style( 'global', get_template_directory_uri() . '/assets/css/global.min.css', null, $cache_ver, 'all' );
        wp_register_style( 'fancybox', get_template_directory_uri() . '/assets/js/fancybox/fancybox.min.css', null, $cache_ver, 'all' );
        wp_register_style( 'flickity', get_template_directory_uri() . '/assets/js/flickity/flickity.min.css', null, $cache_ver, 'all' );

        wp_enqueue_style( 'fa' );
        wp_enqueue_style( 'global' );
        wp_enqueue_style( 'fancybox' );
        wp_enqueue_style( 'flickity' );

        wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', '', '', true );
        wp_register_script( 'lazyload', get_template_directory_uri() . '/assets/js/jquery.lazyload.min.js', array( 'jquery' ), '', true );
        wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '', true );
        wp_register_script( 'flickity', get_template_directory_uri() . '/assets/js/flickity/flickity.pkgd.min.js', array( 'jquery' ), '', true );
        wp_register_script( 'fancybox', get_template_directory_uri() . '/assets/js/fancybox/jquery.fancybox.pack.js', array( 'jquery' ), '', true );
        wp_register_script( 'global', get_template_directory_uri() . '/assets/js/misc.js', array( 'jquery', 'lazyload', 'bootstrap', 'flickity', 'fancybox' ), $cache_ver, true );

        wp_enqueue_script( 'modernizr' );
        wp_enqueue_script( 'lazyload' );
        wp_enqueue_script( 'bootstrap' );
        wp_enqueue_script( 'flickity' );
        wp_enqueue_script( 'fancybox' );
        wp_enqueue_script( 'global' );

    }

}

add_action( 'wp_enqueue_scripts', 'hd_scripts_and_styles' );

if ( ! function_exists( 'hd_create_offertype' ) ) {

    function hd_create_offertype() {

        $labels = array(
            'name'               => 'Offers',
            'singular_name'      => 'Offer',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Offer',
            'edit_item'          => 'Edit Offer',
            'new_item'           => 'New Offer',
            'all_items'          => 'All Offers',
            'view_item'          => 'View Offer',
            'search_items'       => 'Search Offers',
            'not_found'          => 'No offers found',
            'not_found_in_trash' => 'No offers found in the Trash',
            'menu_name'          => 'Offers'
        );

        $args = array(
            'labels'        => $labels,
            'publicly_queriable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'menu_position' => 5,
            'supports'      => array( 'title', 'editor', 'thumbnail' ),
            'menu_icon'     => 'dashicons-palmtree'
        );

        register_post_type( 'offer', $args ); 

    }

}

add_action( 'init', 'hd_create_offertype' );

if ( ! function_exists( 'hd_create_inspirationtype' ) ) {

    function hd_create_inspirationtype() {

        $labels = array(
            'name'               => 'Inspiration',
            'singular_name'      => 'Inspiration',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Inspiration',
            'edit_item'          => 'Edit Inspiration',
            'new_item'           => 'New Inspiration',
            'all_items'          => 'All Inspiration',
            'view_item'          => 'View Inspiration',
            'search_items'       => 'Search Inspiration',
            'not_found'          => 'No inspiration found',
            'not_found_in_trash' => 'No inspiration found in the Trash',
            'menu_name'          => 'Inspiration'
        );

        $args = array(
            'labels'        => $labels,
            'publicly_queriable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'menu_position' => 6,
            'supports'      => array( 'title', 'editor', 'thumbnail' ),
            'menu_icon'     => 'dashicons-lightbulb'
        );

        register_post_type( 'inspiration', $args ); 

    }

}

add_action( 'init', 'hd_create_inspirationtype' );

if ( ! function_exists( 'hd_create_destinationtype' ) ) {

    function hd_create_destinationtype() {

        $labels = array(
            'name'               => 'Destinations',
            'singular_name'      => 'Destination',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Destination',
            'edit_item'          => 'Edit Destination',
            'new_item'           => 'New Destination',
            'all_items'          => 'All Destinations',
            'view_item'          => 'View Destination',
            'search_items'       => 'Search Destinations',
            'not_found'          => 'No destinations found',
            'not_found_in_trash' => 'No destinations found in the Trash',
            'menu_name'          => 'Destinations'
        );

        $args = array(
            'labels'        => $labels,
            'publicly_queriable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'menu_position' => 7,
            'supports'      => array( 'title', 'editor', 'thumbnail' ),
            'menu_icon'     => 'dashicons-location'
        );

        register_post_type( 'destination', $args ); 

    }

}

add_action( 'init', 'hd_create_destinationtype' );

if ( ! function_exists( 'hd_footer_sidebar' ) ) {

    function hd_footer_sidebar() {

        register_sidebar( array(
            'name'          => 'Footer',
            'id'            => 'footer',
            'description'   => 'Widgets in this area will be shown in footer',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ) );

    }

}

add_action( 'widgets_init', 'hd_footer_sidebar' );