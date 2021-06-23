<?php

// woocommerce shop excerpt instead of description
add_action( 'woocommerce_after_shop_loop_item_title', 'the_excerpt',  1);