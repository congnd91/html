<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package belsip
 */

$belsip_sidebar_position = get_theme_mod('sidebar_position');
get_header(); ?>




<!--cols-->
<?php if($belsip_sidebar_position=="left"):?>
<div class="cols sidebar-left">
    <?php elseif($belsip_sidebar_position=="none"):?>
    <div class="cols cols-full">
        <?php else:?>
        <div class="cols">
            <?php endif;?>
            <!--colleft-->
            <div class="colleft">
                <div class="box">
                    <div class="box-detail-caption">
                        <p>
                            <?php echo sprintf('Search by:   <em>" %s " </em>', esc_html(get_search_query()), "belsip"); ?>
                        </p>
                    </div>
                    <?php if ( have_posts() ) { ?>

                    <div class="list-item-category">
                        <?php
                while ( have_posts() ) : the_post();
                get_template_part( 'loop/content', get_post_format() );
                endwhile; ?>
                    </div>

                    <?php
                echo  belsip_pagination();
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

        <?php
get_footer();
