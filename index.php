<?php get_header(); ?>

<div class='container-fluid'>
    <div class="row">
        <div class="col-md-9 col-xs-12">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content', 'post');
                } 
                echo paginate_links(array(
                    'prev_next' => true
                    )
                );
            } else {
                echo '<p>no posts yet!</p>';
            }
            ?>
        </div>      
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>