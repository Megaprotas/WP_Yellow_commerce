<?php get_header(); ?>

<section class='class="container-fluid p-0' >
    <div class="row no-gutters">       
        <div id="hero-image">
            <h1 class="FP-hero-header"><?php bloginfo('title'); ?></h1>
        </div>

        <div id='advert-divs'>
            <div id="in-div1" class="advert-div">
                <div class="yellow-circle out-div1"></div>
                <h5 class="header-div"><a href="#">Bestsellers!</a></h5>
            </div>

            <div id="in-div2" class="advert-div">
                <div class="yellow-circle out-div1"></div>
                <h5 class="header-div"><a href="#">Deals Here!</a></h5>
            </div>

            <div id="in-div3" class="advert-div">
                <div class="yellow-circle out-div1"></div>
                <h5 class="header-div"><a href="#">Discounts!</a></h5>
            </div>

            <div class="sec-menu-btn">
                <h1 style='color: white' id='sec-menu-arrow'>
                    <strong><</strong>
                </h1>
            </div>

            <nav class="sec-menu">
                <ul class="nav nav-fill">
                    <button class='sec-menu-close nav-item'>
                        <span class="dashicons dashicons-no-alt"></span>
                    </button>
                    <li <?php if (is_page('shop')) echo 'class="active nav-item"' ?> class="nav-item">
                        <a class="nav-link" href="<?php echo wc_get_page_permalink('shop'); ?>">Shop</a>
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
                <?php } 
                    else { ?>
                        <li class="nav-btn nav-item">
                            <a class="nav-link" href="<?php echo wp_login_url(); ?>">Log-in</a>
                        </li>
                        <li class="nav-btn nav-item">
                            <a class="nav-link" href="<?php echo wp_registration_url(); ?>">Register</a>
                        </li> <?php 
                    } ?>
                </ul>
            </nav>
        </div>
    </div>
</section>

<div class='article'>
    <p id='animated-ads'>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
    </p>
</div>

<?php
if (class_exists('Woocommerce')) { ?>
    <section class='container-fluid p-0'>
        <?php 
        $product_limit = get_theme_mod('set_popular_prod_max_num', 4);
        $column_limit = get_theme_mod('sec_column_max_num', 4);
        ?>
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <h3>Most Popular</h3>
                <?php echo do_shortcode('[products limit="'. $product_limit .'" columns="'. $column_limit .'" orderby="popularity"]'); ?>
            </div>
        </div>
    </section>  
    <section class='container-fluid p-0'>
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <h3>New Arrivals</h3>
                <?php echo do_shortcode('[products limit="'. $product_limit .'" columns="'. $column_limit .'" orderby="date"]'); ?>
            </div>
        </div>
    </section>
    <section class='container-fluid p-0'>
    <?php
        $checkbox       = get_theme_mod('set_deal_checkbox', 0);    
        $deal           = get_theme_mod('set_deal');
        $currency       = get_woocommerce_currency_symbol();
        $regular_price  = get_post_meta($deal, '_regular_price', true); // true = returns only a single value
        $sale_price     = get_post_meta($deal, '_sale_price', true);

        if($checkbox == 1 && (!empty($deal))) { 
            $discount_percentage = absint(100 - (($sale_price/$regular_price) * 100)); ?>
            <div class="row">
                <div class="col-xs-12 col-md-8 d-flex align-items-center">
                    <h3>Deal of the Week</h3>
                    <div class="deal-img col-xs-6 ml-auto text-center">
                        <?php echo get_the_post_thumbnail($deal, 'large', array('class' => 'img-fluid'

                        )); ?>
                    </div>
                    <div class="deal-desc col-xs-6 mr-auto text-center">
                        <?php if(!empty($sale_price)) { ?>
                            <span class="discount"><?php echo $discount_percentage . '% Less' ?></span>
                        <?php } ?>
                        <h3>
                            <a href="<?php echo get_permalink($deal); ?>"><?php echo get_the_title($deal); ?></a>
                        </h3>
                        <p><?php get_the_excerpt( $deal ); ?></p>
                        <div>
                            <span class="regular"><?php echo $currency;
                                                        echo $regular_price; ?></span>
                            <?php
                            if(!empty($sale_price)) { ?>
                                <span class="sale"><?php echo $currency;
                                                        echo $sale_price; ?></span> <?php
                            } ?>                   
                        </div>
                        <a href="<?php echo esc_url('?add-to-cart=' . $deal); ?>">Add to cart</a>
                    </div>
                </div>
            </div> <?php
        }
    ?>
    </section> <?php
} ?>

<?php get_footer(); ?>