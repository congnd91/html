<?php
/**
* The template for displaying archive pages
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package mazpage
*/$cat_id = get_query_var('cat');
$cat_data = get_option("category_$cat_id");
$mazpage_sidebar_position = get_theme_mod('sidebar_position');
get_header(); ?>
    <div class="categorypage">
        <div class="container">
            <div class="category-page-inner">

                <!--cols-->
                <!--colleft-->
                <div class="">
                    <?php
				if ( have_posts() ) { ?>
                        <div class="list-item-category">
                            <?php 
									while ( have_posts() ) : the_post();
									get_template_part( 'loop/content',get_post_format() );
									endwhile; ?>
                        </div>
                        <?php
								echo  mazpage_pagination();
						}
					else 
					{
						get_template_part( 'loop/content', 'none' );
					}
					?>
                </div>
                <!--colright-->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php
			get_footer();
