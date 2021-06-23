<?php

@require_once get_template_directory() . '/inc/customizer.php';

function theme_files() {
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/inc/bootstrap/bootstrap.min.js', array('jquery'), '4.6.0', true);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/inc/bootstrap/bootstrap.min.css', NULL, '4.6.0', 'all');

    // wp_enqueue_script('flexslider-min-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array('jquery'), '', true);
    // wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', NULL, '', 'all');

    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Lato:wght@100;300;400;900&display=swap');
    wp_enqueue_style('font-awesome', '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('theme_main_styles', get_stylesheet_uri());

    wp_enqueue_style('dashicons' );

    wp_enqueue_script('anime-js', get_template_directory_uri() . '/inc/anime/anime.min.js', array(), '', true);
    wp_enqueue_script('yellow-fron-page', get_template_directory_uri() . '/js/modules/anime.js', array(), false, true);
}

add_action('wp_enqueue_scripts', 'theme_files');

function theme_features() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    $defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default',
        'default-position-x'     => 'left',
        'default-position-y'     => 'top',
        'default-size'           => 'auto',
        'default-repeat'         => 'no-repeat',
        'default-attachment'     => 'scroll',
        'default-color'          => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support('custom-background', $defaults);
    add_theme_support('post-thumbnails');
    
    add_image_size('artistLandscape', 200, 200, true);
    add_image_size('artistPortait', 500, 250, true);
    add_image_size('pageBanner', 1500, 350, true);
    add_image_size('sliderImage', 640, 426, true);

    add_theme_support('woocommerce', array(
        'thumbnail_image_width'     => 255,
        'thumbnail_image_heigth'    => 255,
        'single_image_width'        => 255,
        'product_grid'              => array(
                'default_rows'      => 10,
                'min_rows'          => 3,
                'max_rows'          => 10,
                'default_columns'   => 2,
                'min_columns'       => 1,
                'max_columns'       => 4
            )
        )
    );
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    if (!isset($content_width)) {
        $content_width = 600;
    }
}

add_action('after_setup_theme', 'theme_features', 0);

function redirectHome() {
    $currentUser = wp_get_current_user();
    if (count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

add_action('admin_init', 'redirectHome');

// redirect to homepage after pressing logo on login/register screen
function customHeader() {
    return esc_url(site_url('/'));
}

add_filter('login_headerurl', 'customHeader');

// Leave in case 
function headerTitle() {
    return get_bloginfo('name');
}

add_filter('login_headertitle', 'headerTitle');

// limit words on excerpt
function custom_excerpt_length( $length ) {
	return 10;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// load css styles for login/register screen
function loginPageCSS() {
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Lato:wght@100;400;900&display=swap');
    wp_enqueue_style('font-awesome', '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('our-main-styles', get_stylesheet_uri('/bundled-assets/styles.5aa35daa03e4d7c137b9.css'));
}

add_action('login_enqueue_scripts', 'loginPageCSS');

// sidebar registry
function yellow_sidebar() {
    register_sidebar(array (
            'name'          => 'Yellow',
            'id'            => 'yellow-sidebar-1',
            'description'   => 'Drag and drop here',
            'before_widget' => '<div id="%1$s" class="%2$s widget-content">',
            'after_widget'  => "</div>",
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(array (
            'name'          => 'Yellow-Shop',
            'id'            => 'yellow-sidebar-shop',
            'description'   => 'Drag and drop Woocommerce items here',
            'before_widget' => '<div id="%1$s" class="%2$s widget-content">',
            'after_widget'  => "</div>",
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'yellow_sidebar' );

if (class_exists('Woocommerce')) {
    require get_template_directory() . '/inc/wc-modifications.php';
}

// Woocommerce cart updates
add_filter( 'woocommerce_add_to_cart_fragments', 'yellow_woocommerce_header_add_to_cart_fragment' );

function yellow_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start(); ?>
	    <span class="cart-items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	$fragments['span.cart-items'] = ob_get_clean();
	return $fragments;
}