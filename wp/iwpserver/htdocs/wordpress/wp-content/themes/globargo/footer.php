<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package greeky
 */

?>

    <div class="footer">
        <div class="menu-footer">
            <div class="container">
                <div class="menu">
                    <?php wp_nav_menu(array(
                                'theme_location'=>'main-menu',
                                'menu_class'=>'',
                                'container'=>'')
                                ); ?>
                </div>
            </div>
        </div>
        <div class="allright">
            <div class="container">
                <p>© Globargo 2020. All rights reserved.</p>
            </div>
        </div>
    </div>
    </div>



    <?php wp_footer(); ?>
    </body>

    </html>
