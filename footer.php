            <footer class='hidden-class container-fluid p-0 footer-class'>
                <div class="row no-gutters">
                    <div class="col-md-12 col-xs-12 text-center">
                        <h3 style='margin-top: 30px;'>
                            <a id='footer-logo' href="<?php echo home_url('/') ?>">
                                <?php 
                                if (has_custom_logo()) {
                                    the_custom_logo();
                                } else {
                                    bloginfo('title');
                                } ?>
                            </a>
                        </h3>
                        <hr class='footer-hr'>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 text-center">
                        <p>Our Socials</p>
                        <ul class='socials-list' style='padding-left: 0;'>      
                            <li class="socials-li post-list about-us-nav">
                                <a href="#"><span class="dashicons dashicons-instagram"></span></a>
                            </li>
                            <li class="socials-li post-list about-us-nav">
                                <a href="#"><span class="dashicons dashicons-facebook"></span></a>
                            </li>
                            <li class="socials-li post-list about-us-nav">
                                <a href="#"><span class="dashicons dashicons-twitter"></span></a>
                            </li>
                            <li class="socials-li post-list about-us-nav">
                                <a href="#"><span class="dashicons dashicons-whatsapp"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
  
        <?php wp_footer(); ?>
    </body>
</html>