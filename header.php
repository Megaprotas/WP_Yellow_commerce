<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body <?php body_class(); ?> style="background-image: url(<?php if (is_page('home')) echo get_theme_file_uri('/images/hero.jpg') ?>); 
                                                background-repeat: no-repeat; 
                                                background-size: contain; 
                                                resize: both;">
<nav class="navbar"> <!-- add fixed-top -->
    <div class="logo-area"> 
        <a href="<?php echo home_url('/') ?>" id="logo-link">
            <?php 
            if (has_custom_logo()) {
                the_custom_logo();
            } else { ?>
                <strong id='logo'><?php bloginfo('title'); ?></strong> <?php
            } ?>
        </a>
        <p id='logo-tagline'><small><?php bloginfo('description'); ?></small></p>
    </div>
    <ul class="main-nav-anime nav justify-content-end">
        <li <?php if (is_page('home')) echo 'class="active nav-item"' ?> class="nav-item">
            <a class="nav-link" href="<?php echo home_url('/')?>">Home</a>
        </li>
        <li <?php if (is_page('shop')) echo 'class="active nav-item"' ?> class="nav-item">
            <a class="nav-link" href="<?php echo wc_get_page_permalink('shop'); ?>">Shop</a>
        </li>
        <li <?php if (get_post_type() == 'post') echo 'class="active nav-item"' ?> class="nav-item">
            <a class="nav-link" href="<?php echo site_url('/blog') ?>">Blog</a>
        </li>
        <li <?php if (is_page('about-us') OR wp_get_post_parent_id(get_the_ID())) echo 'class="active nav-item"' ?> class="nav-item">
            <a class="nav-link" href="<?php echo site_url('/about-us') ?>">About Us</a>
        </li>
    
    <?php 
        if (is_user_logged_in()) { ?>
            <li <?php if (is_page('my-account')) echo 'class="active nav-item"' ?> class="nav-item">
                <a class="nav-link" href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) ?>">
                    My Account 
                    <!-- use dashicons -->
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo esc_url(wp_logout_url(get_permalink(get_option('woocomerce_myaccount_page_id')))) ?>">
                    Log-out
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo wc_get_cart_url(); ?>">
                    <span class="dashicons dashicons-cart"></span>
                    <!-- use dashicons -->
                    <span class="cart-items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                </a>
            </li>
    <?php } 
        else { ?>
            <li class="nav-btn nav-item">
                <a class="nav-link" href="<?php echo wp_login_url(); ?>">Log-in</a>
            </li>
            <li class="nav-btn nav-item">
                <a class="nav-link" href="<?php echo wp_registration_url(); ?>">Register</a>
            </li>
    <?php } ?>
    </ul>
</nav>