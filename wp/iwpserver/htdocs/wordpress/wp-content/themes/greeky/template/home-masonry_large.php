<?php
/*
* Template Name: Home Masonry Large
*

*
* @package mazpage
*/

get_header(); ?>
<!--cols-->
<div class="big-page-caption"><p>
    <?php   the_title();?>
</p>
</div>
<div class="cols cols-full">
    <!--colleft-->
    <div class="colleft">
        <?php $mazpage_thumbsposts =  new WP_Query(array(
            'post_status' => 'publish',
            'ignore_sticky_posts' => '1',
            'paged' =>  is_front_page() ? get_query_var('page') : get_query_var('paged'),
            ));
            ?> 
            <?php   if ( have_posts() ) { ?>
            <div class="grids-outer">
                <div class="grids grids-large">
                    <div class="grid">
                        <?php
                        while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post(); 
                        get_template_part( 'loop/content', 'masonry');
                        endwhile; ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php
            echo  mazpage_pagination($mazpage_thumbsposts);
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
<?php
get_footer();

