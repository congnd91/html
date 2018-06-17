<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package mazpage
 */

 get_header(); ?>




    <!--middle-->
    <div class="middle">
        <div class="container">

            <div class="search-caption">
                <p>
                    <?php echo sprintf('Search by  <span>" %s " </span>', esc_html(get_search_query()), "mazpage"); ?>
                </p>
            </div>

            <div class="row">
                <div class="col-lg-9 col-sm-12">
                    <?php
                            if ( have_posts() ) { ?>
                        <div class="list-post">
                            <div class="row">

                                <?php
                           
                              while ( have_posts() ) : the_post(); get_template_part( 'loop/content', get_post_format() ); endwhile; ?>
                            </div>
                        </div>
                        <?php
                echo  greeky_pagination();  
           
                    
                            }     else 
			{
				get_template_part( 'loop/content', 'none' );
			}
			?>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <?php get_sidebar(); ?>
                </div>
            </div>

        </div>
    </div>
    <?php
get_footer();
