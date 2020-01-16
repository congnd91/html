<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package greeky
*/
$greeky_sidebar_position = get_theme_mod('sidebar_position');
get_header(); ?>
    <!--sliderhome-->
    1
    <section class="home-slider" id="home">
        <div class="owl-carousel owl-home">
            <div class="item">
                <div class="home-slider-item" style="background-image: url(images/slider01.png);">
                    <div class="slider-caption">
                        <div class="container">
                            <div class="sc">
                                <div class="sc-inner">
                                    <div class="sc-text">
                                        <p>The Transport Network Community</p>
                                        <p>Consumer Electronics Express Specialist</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="home-slider-item" style="background-image: url(images/slider01.png);">
                    <div class="slider-caption">
                        <div class="container">
                            <div class="sc">
                                <div class="sc-inner">
                                    <div class="sc-text">
                                        <p>The Transport Network Community</p>
                                        <p>Consumer Electronics Express Specialist</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="home-slider-item" style="background-image: url(images/slider01.png);">
                    <div class="slider-caption">
                        <div class="container">
                            <div class="sc">
                                <div class="sc-inner">
                                    <div class="sc-text">
                                        <p>The Transport Network Community</p>
                                        <p>Consumer Electronics Express Specialist</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    if ( is_home() && is_active_sidebar( 'globargo_home_content'))
    dynamic_sidebar('globargo_home_content'); ?>




        <?php
get_footer();
