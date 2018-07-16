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



    <footer class="footer">
        <div class="container">
            <div class="footer-bottom">
                <div class="contact-link">
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" rel="home" class="logo">
                    聯絡我們
                     </a>

                </div>


                <?php echo html_entity_decode(esc_html(get_theme_mod('copyrights'),'mazpage'));?>



                <!--   <p>This website is developed and published by Taitien Electric Company under license from Maker Media, Inc., United States of America. <br/> Content originally published in Make: Magazine and/or on <a href="www.makezine.com">www.makezine.com</a> , ©Maker Media, Inc. 2014. Published under license from Maker Media, Inc.<br/> All rights reserved. The ‘Make:’and ‘Maker Faire’ trademarks are owned by Maker Media, Inc.</p>
            </div>
            <div class="allright">
                <p>
                    Make: and Maker Faire are registered trademarks of Maker Media, Inc. | <a href="#">Privacy</a> | <a href="#">Terms</a></p>
                <p>
                    Copyright © 2004-2018 Maker Media, Inc. All rights reserved</p>
            </div>
-->
            </div>
    </footer>
    </div>
    <div class="totop">
        <i class="fas fa-angle-up"></i>
    </div>

    <?php wp_footer(); ?>
    </body>

    </html>
