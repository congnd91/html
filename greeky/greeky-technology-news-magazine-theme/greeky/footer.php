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




</div>
<!--footer-->
<footer class="footer">
    <div class="wrap">
        <div class="box-site-info">
            <?php $site_logo = greeky_get_theme_option('site_logo'); ?>
            <?php if($site_logo):?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                <img alt="Logo" src="<?php echo esc_url($site_logo);?>" title="<?php bloginfo('name'); ?>" />
            </a>
            <?php else:?>
            <h1>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h1>
            <?php endif;?>

            <?php if(is_active_sidebar('greeky_social_footer')){ dynamic_sidebar("greeky_social_footer");  }?>


            <?php wp_nav_menu(array(
                                'theme_location'=>'footer-menu',
                                'menu_class'=>'menu-footer',
                                'container'=>'')
                                ); ?>

        </div>
    </div>
    <div class="allright">
        <?php if (!get_theme_mod('copyrights')):?>
        <p>
            <?php echo  html_entity_decode(esc_html('ALL RIGHTS RESERVED. Designed by <a href="https://themeforest.net/user/cizthemes" target="_blank"> CIZ THEMES </a>','greeky')); ?>
        </p>
        <?php else: ?>
        <p>
            <?php echo html_entity_decode(esc_html(get_theme_mod('copyrights'),'greeky'));?>
        </p>
        <?php endif; ?>
    </div>
</footer>
</div>


<?php wp_footer(); ?>
</body>

</html>
