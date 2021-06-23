<?php get_header(); ?>

<div class='contaner-fluid'>
    <?php
    if (have_posts()) {
        while(have_posts()) {
            the_post(); 
            get_template_part('template-parts/content', get_post_type());
        } 
        echo paginate_links();
    } else {
        echo '<h3>No results found</h3>';
    }
    get_search_form();
    ?>
</div>

<?php get_footer(); ?>