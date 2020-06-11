<?php
/**
* The template for displaying archive pages
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package belsip
*/

get_header(); ?>
<!--cols-->
<div class="cols cols-full">
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
            <div class="grid-outer">
                <div class="grid grid-small">
                    <?php while ( have_posts() ) : the_post();
				             	get_template_part( 'loop/content','grid-mode');
						endwhile; ?>
                </div>
                <?php echo  belsip_pagination();
					}
					else 
					{
						get_template_part( 'loop/content', 'none' );
					}
					?>
            </div>
        </div>
    </div>


    <div class="clearfix"></div>
</div>
<?php get_footer();
