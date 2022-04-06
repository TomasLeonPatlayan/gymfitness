<?php

//** Link to the Queries File
require get_template_directory() . '/inc/queries.php';

// Creates the Manus
function gymfitness_menus()
{
    // Word Press  Function
    register_nav_menus(array(
        'main-menu' => 'Main Menu'
    ));
}


//Hook

// load when is word press is ready
add_action('init', 'gymfitness_menus');


//Add StyleSheets and JS Files

function gymfitness_scripts()
{


    //Normalize
    wp_enqueue_style('normalize', get_template_directory_uri() . "/css/normalize.css", array(), '8.0.1');

    //Google Font
    wp_enqueue_style('googlefont', "https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&family=Raleway:ital,wght@0,700;0,900;1,200&family=Staatliches&display=swap", array(), '1.0.0');

    // Slick Nav 
    wp_enqueue_style('slicknavcss', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10');

    //Main Style Sheet
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googlefont'), '1.0.0');

    //Call JQuery

    wp_enqueue_script('jquery');

    // Load JS Files

    wp_enqueue_script('sclicknavjs', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);

    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'gymfitness_scripts');


//Enable Feature Images and other stuff

function gymfitness_setup()
{

    //Register New Image Sizes
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('box', 400, 375, true);
    add_image_size('mediumSize', 700, 400, true);
    add_image_size('blog', 966, 644, true);
    //Add Feature Image
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'gymfitness_setup'); //When the theme is activated and ready


//Creates a Widget Zone

function gymfitness_widgets()
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget'  => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'gymfitness_widgets');
