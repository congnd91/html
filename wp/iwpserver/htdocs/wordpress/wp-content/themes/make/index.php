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
* @package mazpage
*/
$mazpage_sidebar_position = get_theme_mod('sidebar_position');
get_header(); ?>

    <!--home-hightlight-->
    <div class="home-hightlight">
        <div class="hh-left">
            <div class="hh-big" style="background-image: url(images/1.jpg);">
                <div class="post-meta">
                    <span class="post-category">
                        <a href="#">BUSINESSS</a>
                        </span>
                    <span class="post-format">
                        <a href="#">
                             <i class="fas fa-video"></i>
                             </a>
                        </span>
                </div>
                <a href="#" class="link">
                    <h2>These Students Made A Walking TARS Robot From Interstellar</h2>
                </a>
            </div>
        </div>
        <div class="hh-right">
            <div class="hh-big small" style="background-image: url(images/2.png);">
                <div class="post-meta">
                    <span class="post-category">
                        <a href="#">BUSINESSS</a>
                        </span>
                    <span class="post-format">
                        <a href="#">
                             <i class="fas fa-video"></i>
                             </a>
                        </span>
                </div>
                <a href="#" class="link">
                    <h2>These Students Made A Walking TARS Robot From Interstellar</h2>
                </a>
            </div>
            <div class="hh-big small" style="background-image: url(images/3.png);">
                <div class="post-meta">
                    <span class="post-category">
                        <a href="#">BUSINESSS</a>
                        </span>
                    <span class="post-format">
                        <a href="#">
                             <i class="fas fa-video"></i>
                             </a>
                        </span>
                </div>
                <a href="#" class="link">
                    <h2>These Students Made A Walking TARS Robot From Interstellar</h2>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!--middle-->
    <div class="middle">
        <div class="container">
            <?php if ( have_posts() ) { ?>

            <div class="list-post">
                <div class="row">

                    <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                get_template_part( 'loop/content', get_post_format() );
                endwhile; ?>




                </div>


            </div>
            <?php
                echo  greeky_pagination();  }
            ?>
                <div class="paging-loadmore">
                    <a href="#">MORE</a>
                </div>
        </div>
    </div>
    <?php
get_footer();
