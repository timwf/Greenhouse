<?php

    // Remove default wordpress stuff which we don't want
    
    function maxfactor_setup_declutter()
    {
        // WebLog Client (Used by third-party APIs.) Re-enable if things like the 
        // wordpress desktop client or other XML-RPC are required
        remove_action ('wp_head', 'rsd_link');
        
        // Remove windows live writer support. Re-enable if client is using windows
        // live writer software
        remove_action('wp_head', 'wlwmanifest_link');
        
        // Remove shortlink meta header
        remove_action('wp_head', 'wp_shortlink_wp_head');
        
        // Remove wordpress version meta tag
        remove_action('wp_head', 'wp_generator');
        
        // Remove rest api header and footer fields
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
        
        // remove emoj detection scripts
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
    }
    
    add_action('after_setup_theme', 'maxfactor_setup_declutter');

?><?php

// Configure theme support like thumbnails etc.


// Configure menus
function maxfactor_register_menus() 
{
    register_nav_menus(
        [
            'utility-menu' => __( 'Utility Menu' ),
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' )
        ]
    );
}

add_action( 'init', 'maxfactor_register_menus' );


// allow svg upload
function maxfactor_register_upload_mimes( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'maxfactor_register_upload_mimes');


// Add theme customisations to be managed through the admin interface within wordpress
function maxfactor_setup_customizer($wp_customize)
{
    $wp_customize->add_section('maxfactor_options', 
        [
            'title' => __('MaxFactor', 'maxfactor'),
            'priority' => 35,
            'capability' => 'edit_theme_options',
            'description' => __('Add some blusher to your lightweight foundation', 'maxfactor'),
        ]
    );
    
    $wp_customize->add_setting('site_logo',
        [
            'default' => '',
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
        ]
    ); 
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 
            'maxfactor_logo', 
            [
                'label'    => __( 'Logo', 'maxfactor' ),
                'section'  => 'maxfactor_options',
                'settings' => 'site_logo'
            ]
        )
    );
}

add_action( 'customize_register', 'maxfactor_setup_customizer' );

// Add featured image to posts and pages
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

// Add support for post formats
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video' ) );

?>
<?php
    add_theme_support( 'post-thumbnails', array( 'greenhouse_author', 'book' ) );

    add_post_type_support( 'page', 'excerpt' );
?>

<?php

function createBookPostType()
{
    register_post_type('book', [
        'labels' => array(
            'name' => __('Books'),
            'singular_name' => __('Book')
        ),
        'public' => true,
        'has_archive' => true,
        'taxonomies' => ['book_category'],
        'rewrite' => [
                'slug' => 'books',
                'with_front' => true
            ],
        'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes'),
    ] );

}

function createBookCategoryTaxonomy() {
    register_taxonomy(
        'book_category',
        'book',
        array(
            'rewrite' => ['slug' => 'books/category'],
            'labels' => array(
                'name' => 'Book Categories',
                'add_new_item' => 'Add New Book Category',
                'new_item_name' => "New Book Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
        )
    );
}

function createBookConnections()
{
    p2p_register_connection_type( array(
        'name' => 'books_to_greenhouse_authors',
        'from' => 'book',
        'to' => 'greenhouse_author'
    ) );

    p2p_register_connection_type( array(
        'name' => 'books_to_awards',
        'from' => 'book',
        'to' => 'award'
    ) );

    p2p_register_connection_type( array(
        'name' => 'books_to_series',
        'from' => 'book',
        'to' => 'series'
    ) );
}

function setBookSortOrder($query)
{
    if (!is_front_page() && $query->get('post_type') == "book" || is_tax("book_category")) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}

add_action( 'init', 'createBookCategoryTaxonomy' );
add_action( 'init', 'createBookPostType' );
add_action( 'p2p_init', 'createBookConnections' );
add_action( 'pre_get_posts', 'setBookSortOrder' );

?>
<?php

function createAuthorPostType()
{
    register_post_type('greenhouse_author', [
        'labels' => array(
            'name' => __('Authors'),
            'singular_name' => __('Author')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes'),
        'rewrite' => [
                'slug' => 'authors',
                'with_front' => true
            ],
    ] );

}

function setAuthorSortOrder($query)
{
    if ($query->get('post_type') == "greenhouse_author" && is_post_type_archive("greenhouse_author")) {
        $query->set('meta_key', 'extras-last_name');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
    }
}

add_action( 'init', 'createAuthorPostType' );
add_action( 'pre_get_posts', 'setAuthorSortOrder' );

?>
<?php

function createAwardPostType()
{
    register_post_type('award', [
        'labels' => array(
            'name' => __('Awards'),
            'singular_name' => __('Award')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes'),
    ] );

}

add_action( 'init', 'createAwardPostType' );

?><?php

function createSeriesPostType()
{
    register_post_type('series', [
        'labels' => array(
            'name' => __('Series'),
            'singular_name' => __('Series')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes'),
    ] );

}

add_action( 'init', 'createSeriesPostType' );

?><?php
function maxfactor_create_sidebar_footer1()
{
    register_sidebar([
        'id' => 'footer1',
        'name' => __( 'Footer Zone 1', 'maxfactor' ),
        'before_widget' => '<div class="widget-area widget-area--sidebar" id="footer1">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ] );
}

add_action( 'init', 'maxfactor_create_sidebar_footer1' );
?><?php
function maxfactor_create_sidebar_footer2()
{
    register_sidebar([
        'id' => 'footer2',
        'name' => __( 'Footer Zone 2', 'maxfactor' ),
        'before_widget' => '<div class="widget-area widget-area--sidebar" id="footer2">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ] );
}

add_action( 'init', 'maxfactor_create_sidebar_footer2' );
?><?php
function maxfactor_create_sidebar_footer3()
{
    register_sidebar([
        'id' => 'footer3',
        'name' => __( 'Footer Zone 3', 'maxfactor' ),
        'before_widget' => '<div class="widget-area widget-area--sidebar" id="footer3">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ] );
}

add_action( 'init', 'maxfactor_create_sidebar_footer3' );
?><?php
function maxfactor_create_sidebar_footer4()
{
    register_sidebar([
        'id' => 'footer4',
        'name' => __( 'Footer Zone 4', 'maxfactor' ),
        'before_widget' => '<div class="widget-area widget-area--sidebar" id="footer4">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ] );
}

add_action( 'init', 'maxfactor_create_sidebar_footer4' );
?><?php
function maxfactor_create_sidebar_blog()
{
    register_sidebar([
        'id' => 'blog',
        'name' => __( 'Blog Sidebar', 'maxfactor' ),
        'before_widget' => '<div class="widget-area widget-area--sidebar" id="blog">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ] );
}

add_action( 'init', 'maxfactor_create_sidebar_blog' );
?><?php
function maxfactor_create_sidebar_footercredit()
{
    register_sidebar([
        'id' => 'footercredit',
        'name' => __( 'Footer Credit', 'maxfactor' ),
        'before_widget' => '<div class="widget-area widget-area--sidebar" id="footercredit">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ] );
}

add_action( 'init', 'maxfactor_create_sidebar_footercredit' );
?><?php

   function maxfactor_styles() {
        wp_enqueue_style( 'main', get_template_directory_uri() . '/main.css',false,'1.0','all');
        // example style definition
// wp_enqueue_style( 'main', get_template_directory_uri() . '/main.css',false,'1.0','all');

wp_enqueue_style('font', 'https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700|Open+Sans:400,600,700', false, '1.0', 'all');    }
    
    // load maxfactor default style
    add_action( 'wp_enqueue_scripts', 'maxfactor_styles' );
    
?><?php

    // Setup theme script files
    function maxfactor_scripts() {
        wp_enqueue_script( 'main', get_template_directory_uri() . '/main.js',false,'1.0','all');
    }
    
    // load maxfactor default style
    add_action( 'wp_enqueue_scripts', 'maxfactor_scripts' );
    
    
    // Remove unwanted default scripts
    function maxfactor_footer_setup()
    {
        // Remove default embed script (re-enable if video/content embedding is 
        // broken)
        wp_deregister_script( 'wp-embed' );
    }
    
    add_action( 'wp_footer', 'maxfactor_footer_setup' );

?><?php

    // Site specific setup
    
    // Author image sizes
    add_image_size( 'author-profile', 380, 380, true );
    
    // Book cover iamge sizes
    add_image_size( 'book-cover', 395, 607, false );