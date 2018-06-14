<?php get_header(); ?>




<!--middle-->
<div class="middle">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12">
                <div class="row">
                    <div class="col-lg-10 col-sm-12">
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
                echo  greeky_pagination();  
            ?>


                    </div>
                    <div class="col-lg-2 col-sm-12">1
                        <?php get_sidebar(); ?> 2

                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-12">
            </div>
        </div>





    </div>
</div>
<?php
get_footer();
