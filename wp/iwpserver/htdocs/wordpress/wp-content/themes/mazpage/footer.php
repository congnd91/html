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

   <?php if(is_active_sidebar('mazpage_footer_column_1')||is_active_sidebar('mazpage_footer_column_2')||is_active_sidebar('mazpage_footer_column_3'))
                                { ?>

	 <!--bottom-->
                <div class="bottom">
                    <div class="bottom-inner">
                        <div class="bottom-col">
                              <?php if(is_active_sidebar('mazpage_footer_column_1'))
                                {
                                 dynamic_sidebar("mazpage_footer_column_1"); 
                                }?>
                        </div>
                        <div class="bottom-col">
                              <?php if(is_active_sidebar('mazpage_footer_column_2'))
                                {
                                 dynamic_sidebar("mazpage_footer_column_2"); 
                                }?>
                        </div>
                        <div class="bottom-col">
                              <?php if(is_active_sidebar('mazpage_footer_column_3'))
                                {
                                 dynamic_sidebar("mazpage_footer_column_3"); 
                                }?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                    <?php } ?>
            </div>
        </div>

        <!--footer-->
        <footer class="footer">
            <div class="footer-bar">
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

                   <?php if(is_active_sidebar('mazpage_social_footer'))
                    {
                     dynamic_sidebar("mazpage_social_footer"); 
                    }?>

                <div class="clearfix"></div>
            </div>
        </footer>
    </div>
    <!--go to top-->
    <span class="totop">
      <?php echo esc_html("TOP","mazpage"); ?>
      <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
    </span>
<?php wp_footer(); ?>
</body>
</html>
