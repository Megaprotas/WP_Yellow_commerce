<li class="post-list" style='margin-left: -15px;'>
    <h4 class="post-styles-all">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h4>
    <p>
        <small>Posted by <strong class="blog-author"><?php the_author_posts_link(); ?></strong> on <?php the_time('n-F-Y'); ?></small>
    </p>
    <p>
    <?php 
        if (has_excerpt()) {
                echo get_the_excerpt();
        } else {
                echo wp_trim_words(get_the_content(), 10);
        } 
    ?>
    </p>
    <?php
        if (has_category() || the_category() != 'Uncategorized') {
                echo '<p class="read-more-style">Categories: ';
                echo get_the_category_list(', ');
                echo '</p>';
        }
    ?>
    <?php 
        if (has_tag()) {
                echo '<p>Tags: ';
                echo get_the_tag_list( '', ', ');
                echo '</p>';
        }
    ?>
    <p class="read-more-style">
        <a href="<?php the_permalink(); ?>">Read more</a>
    </p>
    <hr style="margin-top: 30px;">
</li>