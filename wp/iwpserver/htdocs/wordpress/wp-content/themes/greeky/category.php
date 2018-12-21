<?php
/**
* The template for displaying archive pages
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package greeky
*/

$greeky_sidebar_position = get_theme_mod('sidebar_position');
get_header(); ?>
<!--cols-->
<?php if($greeky_sidebar_position=="left"):?>
<div class="cols sidebar-left">
    <?php elseif($greeky_sidebar_position=="none"):?>
    <div class="cols cols-full">
        <?php else:?>
        <div class="cols">
            <?php endif;?>
            <!--colleft-->
            <div class="colleft">
                <div class="box">
                    <div class="box-caption box-caption-no-background">
                        <h2>
                            <span>
                                <?php single_term_title();?>
                            </span>
                        </h2>
                    </div>
                    <?php
				if ( have_posts() ) { ?>
                    <div class="list-item-category">
                        <?php while ( have_posts() ) : the_post();
				              get_template_part( 'loop/content',get_post_format() );
						endwhile; ?>
                    </div>
                    <?php echo  greeky_pagination();
					}
					else 
					{
						get_template_part( 'loop/content', 'none' );
					}
					?>
                </div>
            </div>
            <!--colright-->
            <div class="colright">
                <?php get_sidebar(); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php get_footer();
