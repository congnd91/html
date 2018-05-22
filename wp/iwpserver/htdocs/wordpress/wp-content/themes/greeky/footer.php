<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mazpage
 */

?>




    </div>
    <!--footer-->
    <footer class="footer">
        <div class="wrap">
            <div class="box-site-info">
                <a href="#" class="logo">
                        <img alt="" src="images/logo.png" />
                    </a>
                <ul class="social-company">
                    <li>
                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-rss"></i></a>
                    </li>
                </ul>
                <ul class="menu-footer">
                    <li>
                        <a href="index.html"> Home </a>
                    </li>
                    <li>
                        <a href="category.html">Category<span></span></a>
                    </li>
                    <li>
                        <a href="single.html">Single<span></span></a>
                    </li>
                    <li>
                        <a href="shop.html">Shop<span></span></a>
                    </li>
                    <li>
                        <a href="gallery.html">Gallery<span></span></a>
                    </li>
                    <li>
                        <a href="contact.html">Contact<span></span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="allright">
            <?php if (!get_theme_mod('copyrights')):?>
            <p>
                <?php echo  html_entity_decode(esc_html('ALL RIGHTS RESERVED. Designed by <a href="https://themeforest.net/user/cizthemes" target="_blank"> CIZ THEMES </a>','mazpage')); ?>
            </p>
            <?php else: ?>
            <p>
                <?php echo html_entity_decode(esc_html(get_theme_mod('copyrights'),'mazpage'));?>
            </p>
            <?php endif; ?>
        </div>
    </footer>
    </div>


    <?php wp_footer(); ?>
    </body>

    </html>
