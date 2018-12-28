<?php
/*
* Template Name: Home Menu Visible
*
*
*

*
* @package mazpage
*/
$mazpage_sidebar_position = get_theme_mod('sidebar_position'); ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
     <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!--menu mobile-->
    <nav class="menu-res hidden-lg hidden-md ">
        <div class="menu-res-inner">
        <?php wp_nav_menu(array(
        'theme_location'=>'main-menu',
        'menu_class'=>'',
        'container'=>'')
        ); ?>
        </div>
    </nav>
    <!--page-->
    <div class="page">
        <div class="mobile-bar hidden-lg hidden-md">
            <div class="menu-icon-mobile hidden-lg hidden-md">
                <i class="fa fa-navicon"></i>
               <span><?php echo esc_html("MENU","mazpage") ?></span>
            </div>
            <div class="search-icon-mobile">
                <i class="fa fa-search"></i>
            </div>
            <div class="search-box-mobile">
                <?php get_template_part( 'template/searchform' ); ?>
            </div>
        </div>
        <!--header-->

        
        <header class="header menu-visible">
    
            <div class="container">
                <div class="logo-wrap">
                <?php $site_logo = mazpage_get_theme_option('site_logo'); ?>
                <?php if($site_logo):?>
                      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                    <img alt="Logo" src="<?php echo esc_url($site_logo);?>" title="<?php bloginfo('name'); ?>" />
                     </a>
                <?php else:?>
                    <h1> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                        <?php bloginfo( 'name' ); ?>
                         </a>
                    </h1>
                <?php endif;?>
                </div>
                <!--menu-main-->
                <nav class="menu-main">
                    <div class="menu-main-inner">
                             <?php wp_nav_menu(array(
                                'theme_location'=>'main-menu',
                                'menu_class'=>'hidden-sm hidden-xs',
                                'container'=>'')
                                ); ?>
                       
                        <div class="search-icon hidden-sm hidden-xs">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="search-box">
                            <?php get_template_part( 'template/searchform' ); ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--wrapper-->
        <div class="wrapper">
            <div class="wrap">

<?php
if (is_active_sidebar( 'mazpage_home_big'))?>
<?php dynamic_sidebar('mazpage_home_big'); ?>
<!--cols-->
<?php if($mazpage_sidebar_position=="left"):?>
    <div class="cols sidebar-left">
    <?php elseif($mazpage_sidebar_position=="none"):?>
        <div class="cols cols-full">
        <?php else:?>
            <div class="cols">
            <?php endif;?>
            <!--colleft-->
            <div class="colleft">
                <?php
                if (is_active_sidebar('mazpage_home')){ ?>
                <?php dynamic_sidebar('mazpage_home'); ?>
                <?php
            }
            else 
            {
                if ( have_posts() ) { ?>
              <div class="list-item-category">
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                get_template_part( 'loop/content', get_post_format() );
                endwhile; ?>
                 </div>
                <?php
                echo  mazpage_pagination();
            }
            else 
            {
                get_template_part( 'loop/content', 'none' );
            }
        }
        ?>
    </div>
    <!--colright-->
    <div class="colright">
    <?php get_sidebar(); ?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();
