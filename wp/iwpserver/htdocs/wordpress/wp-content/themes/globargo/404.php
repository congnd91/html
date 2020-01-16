<?php
/**
* The template for displaying 404 pages (not found)
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package greeky
*/

get_header(); ?>

<div class="cols cols-full">
    <!--colleft-->
    <div class="colleft">
        <!--detail -->
        <div class="page-404 box">
            <h1>
                <span>
                    <?php echo esc_html("4","greeky"); ?></span>
                <i class="fa fa-frown-o"></i>
                <span>
                    <?php echo esc_html("4","greeky"); ?></span>
            </h1>
            <p>
                <?php echo esc_html("Oops! Sorry this page doesn't exist. Back to home?","greeky");?>
            </p>

            <a href="<?php echo esc_url(home_url( '/' ) ); ?>" class="my-btn my-btn-dark btn-go-home">
                <?php  echo esc_html("TAKE ME HOME","greeky"); ?> </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();
